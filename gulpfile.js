/*
██   ██  █████  ██████  ██████  ██    ██ ███████ ███████ ████████ ██████
██   ██ ██   ██ ██   ██ ██   ██  ██  ██  ██      ██         ██         ██
███████ ███████ ██████  ██████    ████   ███████ █████      ██     █████
██   ██ ██   ██ ██      ██         ██         ██ ██         ██    ██
██   ██ ██   ██ ██      ██         ██    ███████ ███████    ██    ███████
*/

var gulp = require("gulp");

// [gulp-*]モジュールを一括ロード
var $ = require('gulp-load-plugins')();

// それ以外のモジュール
var bs = require("browser-sync").create();
var fs = require('fs');
var del = require('del');
var minimist = require('minimist');
var runSequence = require('run-sequence');
var imageminPngquant = require('imagemin-pngquant');
var imageminJpegRecompress = require('imagemin-jpeg-recompress');

/*
███████ ███████ ████████ ████████ ██ ███    ██  ██████  ███████
██      ██         ██       ██    ██ ████   ██ ██       ██
███████ █████      ██       ██    ██ ██ ██  ██ ██   ███ ███████
     ██ ██         ██       ██    ██ ██  ██ ██ ██    ██      ██
███████ ███████    ██       ██    ██ ██   ████  ██████  ███████
*/


//開発モード、本番環境モード切替
var options = minimist(process.argv.slice(2), envSettings);
var envSettings = {
  string: 'env',
  default: {
    env: process.env.NODE_ENV || 'development'　// NODE_ENVに指定が無い場合のデフォルト
  }
}
var isProduction = (options.env === 'production') ? true : false;
console.log('[build env]', options.env, '[is production]', isProduction);

// コンパイル設定
var useTwigTemplate = true;   //twigテンプレートエンジンを使うかどうか
var bsOpenBrowser = false;     //BS初期化時にブラウザを自動で開くかどうか
var useLocalPhp = false;       //ローカルプレビューでPHPを使うかどうか。ローカルPHPの機能を止める場合、ここをfalseに

// 共通パス設定
var paths = {
    srcDir: "src/",
    rootDir: "public_html/",
    cmnDir:  "public_html/inc/"
};

// 関連ファイルパス設定
var src = {
    twig:       paths.srcDir + "template/**/*.twig",
    scss:       paths.srcDir + "scss/**/*.scss",
    js:         paths.srcDir + "js/**/*.js",
    img:        paths.srcDir + "image/**/*.+(jpg|png|gif|svg|ico)",
    icon:       paths.srcDir + "icon/**/*.svg"
};

var dest = {
    html:       paths.rootDir,
    php:        paths.rootDir + "**/*.php",
    js:         paths.cmnDir + "js/",
    css:        paths.cmnDir + "css/",
    img:        paths.cmnDir + "image/",
    font:       paths.cmnDir + "font/"
};

// ベンダープレフィックス付与範囲
var prefixBrowsers = [
    'ie >= 9',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 9',
    'android >= 4.4',
    'bb >= 10'
];

//WPを使う場合のパス設定
var WordPressWatchConfig = [
    "!" + paths.rootDir + "wp-content/**/*",
    "!" + paths.rootDir + "wp-admin/**/*",
    "!" + paths.rootDir + "wp-includes/**/*",
    "!" + paths.rootDir + "wp-*.php",
    "!" + paths.rootDir + "readme.html",
    paths.rootDir + "wp-content/themes/**/*",
    paths.rootDir + "wp-config.php"
];

/*
████████  █████  ███████ ██   ██ ███████
   ██    ██   ██ ██      ██  ██  ██
   ██    ███████ ███████ █████   ███████
   ██    ██   ██      ██ ██  ██       ██
   ██    ██   ██ ███████ ██   ██ ███████
*/

//ローカルでPHPを動かす用
gulp.task('php', function() {
  $.connectPhp.server({
      port: 3306,
      base: paths.rootDir,
      router: "./router.php", //.htmlでphpを動かす場合使用
      bin: 'C:/xampp/php/php.exe',
      ini: 'C:/xampp/php/php.ini'
    });
});

// browserSync初期化
gulp.task("bs-init", function(){
  bs.init({
    server: {
        baseDir: paths.rootDir,
    },
    reloadDelay: 1000,
    open : bsOpenBrowser
  });
});

// browserSync php初期設定
gulp.task("bs-init-usephp", function(){
  bs.init({
    proxy: 'localhost:3306',//127.0.0.1:8000
    open : bsOpenBrowser
  });
});

// hjson -> json
gulp.task('hjson', function() {
  gulp.src([paths.srcDir + 'template/config.hjson'])
    .pipe($.hjson({ to: 'json', jsonSpace: '  ' }))
    .pipe(gulp.dest(paths.srcDir + 'template/'));
});

// browserSyncリロード
gulp.task('bs-reload', function() {
  bs.reload();
})

// TWIG -> HTML
var twigDestFillter = (isProduction)? ['**/page/**','!**/page/_*']:'**/page/**';

gulp.task('twig', function(){
  gulp.src(src.twig)
    // .pipe(cache('twig'))
    .pipe($.data(function(file){
      return JSON.parse(fs.readFileSync(paths.srcDir + 'template/config.json'));
    }))
    .pipe($.twig({
      data: {},
      errorLogToConsole: true
    }))
    .pipe($.filter('**/page/**'))
    .pipe($.filter(twigDestFillter))
    .pipe($.rename(function(path){
      path.dirname = path.dirname.replace(/page/g,'');
      path.extname = '';
    }))
    .pipe($.htmlBeautify({
      "indent_size": 2,
      "preserve_newlines": false,
      "eol": "\n"
    }))
    .pipe(gulp.dest(dest.html))
    .pipe($.notify({message: 'TWIG -> HTML 完了',onLast: true}))
    .pipe(bs.reload({stream: true, once: true}));
});

// SASS -> CSS
var sassOption = (isProduction)? {outputStyle: 'compressed'} : {};
gulp.task('sass', function() {
    return gulp.src(src.scss)
    .pipe($.cached('sass'))
    .pipe($.sassPartialsImported(paths.srcDir + "scss/"))
    .pipe($.if(!isProduction, $.sourcemaps.init()))
    .pipe($.sass(sassOption))
    .on("error", errNotify())
    .pipe($.autoprefixer({
        autoprefixer: { browsers: prefixBrowsers}
    }))
    .pipe($.if(!isProduction, $.sourcemaps.write('./_map')))
    .pipe(gulp.dest(dest.css))
    .pipe(bs.stream())
    .pipe($.notify({message: 'SASS -> CSS 完了',onLast: true}))
});


// JS結合＆圧縮
gulp.task('jsmin', function(){
    // IE9以下用JSファイル
    gulp.src(paths.srcDir + "js/old-ie/**/*.js")
    .pipe($.if(!isProduction, $.sourcemaps.init()))
    .pipe($.concat('old-ie.min.js'))
    .pipe($.if(isProduction, $.uglify()))
    .pipe($.if(!isProduction, $.sourcemaps.write('./_map')))
    .pipe(gulp.dest(dest.js));

    // 共通JSファイル (ベンダー系含む)
    gulp.src(paths.srcDir + "js/common/**/*.js")
    .pipe($.order(["jquery-*.js","*.js"])) //jqueryを先頭に
    .pipe($.if(!isProduction, $.sourcemaps.init()))
    .pipe($.concat('common.min.js'))
    .pipe($.if(isProduction, $.uglify()))
    .pipe($.if(!isProduction, $.sourcemaps.write('./_map')))
    .pipe(gulp.dest(dest.js));

    // 各ページ内で利用するJSファイル 圧縮
    gulp.src(paths.srcDir + "js/page/**/*.js")
    .pipe($.if(!isProduction, $.sourcemaps.init()))
    .pipe($.if(isProduction, $.uglify()))
    .pipe($.rename({
       extname: '.min.js'
     }))
    .pipe($.if(!isProduction, $.sourcemaps.write('./_map')))
    .pipe(gulp.dest(dest.js + "page/"))
    .pipe(bs.stream({once: true}));
});


// ファイルの監視
gulp.task('watch', function () {
  gulp.watch(paths.srcDir + 'template/config.hjson', ["hjson"]);
  if(useTwigTemplate)gulp.watch([src.twig, paths.srcDir+'/**/config.json'],['twig']);
  gulp.watch(src.scss, ["sass"]);
  gulp.watch(src.img, ["imgmin"]);
  gulp.watch(src.js, ["jsmin"]);
  gulp.watch([dest.php, WordPressWatchConfig],['bs-reload']);
});

// ファイル削除
gulp.task('clean', del.bind(null,[
  dest.css,
  dest.js,
  dest.img,
  dest.html + "**/*.html",
]));

// エラー通知
function errNotify(){
    return $.notify.onError({
        message: 'Error: <%= error.message %>',
        title:   'Error running something',
        sound:   'Glass'
    });
}


// SVG -> アイコンフォント
var fn = 'original'; // シンボルフォント名

gulp.task('iconfont', function(){
gulp.src([src.icon])
.pipe($.iconfont({
  fontName: fn,
  formats: ['ttf', 'eot', 'woff', 'woff2'],
  prependUnicode: true,
  centerHorizontally: true,
  normalize: true,
  fontHeight: 1001,
  fixedWidth: true
}))
.on('glyphs', function(glyphs, options) {

    var opt = {
      glyphs: glyphs,
      fontName: fn,
      fontPath: '/inc/font/icn_' + fn + '/',
      className: fn
    };

    gulp.src(paths.srcDir + 'icon/template/*.css')
        .pipe($.consolidate('lodash', opt))
        .pipe($.rename({ basename:fn }))
        .pipe(gulp.dest(dest.css + 'util'));

    gulp.src(paths.srcDir + 'icon/template/*.html')
        .pipe($.consolidate('lodash', opt))
        .pipe($.rename({ basename:'_sample' }))
        .pipe(gulp.dest(dest.font + 'icn_' + fn + '/'));
})
.pipe(gulp.dest(dest.font + 'icn_' + fn));
});


//画像圧縮
gulp.task('imgmin', function(){
  return gulp.src(src.img)
    .pipe($.cached('image'))
    .pipe($.imagemin([
    $.imagemin.gifsicle({interlaced: true}),
    imageminPngquant(),
    imageminJpegRecompress(),
    $.imagemin.svgo({
      plugins: [
        {removeViewBox: true}
      ]
    })
  ]))
    .pipe(gulp.dest(dest.img))
    .pipe(bs.stream({once: true}))
    .pipe($.notify({message: '画像圧縮 完了',onLast: true}))
});


/*
██████  ███████ ███████  █████  ██    ██ ██   ████████
██   ██ ██      ██      ██   ██ ██    ██ ██      ██
██   ██ █████   █████   ███████ ██    ██ ██      ██
██   ██ ██      ██      ██   ██ ██    ██ ██      ██
██████  ███████ ██      ██   ██  ██████  ███████ ██
*/

gulp.task('default', function(callback) {

  var zeroTask = ['clean','hjson'];
  var firstTasks = ['sass', 'jsmin', 'imgmin', 'iconfont'];
  var secondTask = ['watch'];

  if(useTwigTemplate)firstTasks.push('twig');
  if(useLocalPhp){
    secondTask.push('php');
    secondTask.push('bs-init-usephp');
  }else secondTask.push('bs-init');

  return runSequence(
    zeroTask,
    firstTasks,
    secondTask,
    callback
  );
});