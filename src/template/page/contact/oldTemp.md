#   for文を使わない場合のテンプレ（2021年7月13日Ver）

配列ではなく、htmlで書きたい場合はこちらのコードを参考にしてください。


```
{# お問い合わせ内容 #}
<tr data-pfwform-class-if-error="form_error" data-pfwform-target="お問い合わせ内容">
  <th class="c-formTbl__head">
    <div class="c-formTbl__title">
      お問い合わせ内容
      <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
    </div>
  </th>
  <td class="c-formTbl__input">
    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
      <select class="" name="お問い合わせ内容" data-pfwform-required>
        <option value="" selected="selected">選択してください</option>
        <option value="制作についてのお問い合わせ">制作についてのお問い合わせ</option>
        <option value="採用についてのお問い合わせ">採用についてのお問い合わせ</option>
        <option value="その他のお問い合わせ">その他のお問い合わせ</option>
      </select>
      <div class="form_error_wrap" data-pfwform-show-if-error="お問い合わせ内容">
        <div class="form_error_inner">
          <i class="fa fa-exclamation-triangle"></i>
          <ul><li>お問い合わせ内容を正しく入力してください。</li></ul>
        </div>
      </div>
    </div>
    <div class="form_group_wrap" data-pfwform-show-if-confirm>
      <p class="c-confirmTxt" data-pfwform-confirm-value="お問い合わせ内容"></p>
    </div>
  </td>
</tr>
{# お問い合わせ内容 #}


{# お名前 #}
<tr data-pfwform-class-if-error="form_error" data-pfwform-target="お名前">
  <th class="c-formTbl__head">
    <div class="c-formTbl__title">
      お名前
      <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
    </div>
  </th>
  <td class="c-formTbl__input">
    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
      <div class="form_group_inner">
        <div class="txt small">
          <input type="text" name="お名前" value="" data-pfwform-required>
        </div>
        <p class="c-example">例）山田 太郎</p>
      </div>
      <div class="form_error_wrap" data-pfwform-show-if-error="お名前">
        <div class="form_error_inner">
          <i class="fa fa-exclamation-triangle"></i>
          <ul>
            <li>お名前を正しく入力してください。</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="form_group_wrap" data-pfwform-show-if-confirm>
      <p class="c-confirmTxt" data-pfwform-confirm-value="お名前"></p>
    </div>
  </td>
</tr>
{# お名前 #}


{# フリガナ #}
<tr data-pfwform-class-if-error="form_error" data-pfwform-target="フリガナ">
  <th class="c-formTbl__head">
    <div class="c-formTbl__title">
      フリガナ
      <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
    </div>
  </th>
  <td class="c-formTbl__input">
    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
      <div class="form_group_inner">
        <div class="txt small">
          <input type="text" name="フリガナ" value="" data-pfwform-required>
        </div>
        <p class="c-example">例）ヤマダ タロウ</p>
      </div>
      <div class="form_error_wrap" data-pfwform-show-if-error="フリガナ">
        <div class="form_error_inner">
          <i class="fa fa-exclamation-triangle"></i>
          <ul>
            <li>フリガナを正しく入力してください。</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="form_group_wrap" data-pfwform-show-if-confirm>
      <p class="c-confirmTxt" data-pfwform-confirm-value="フリガナ"></p>
    </div>
  </td>
</tr>
{# フリガナ #}


{# 性別 #}
<tr data-pfwform-class-if-error="form_error" data-pfwform-target="性別">
  <th class="c-formTbl__head">
    <div class="c-formTbl__title">
      性別
      <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
    </div>
  </th>
  <td class="c-formTbl__input">
    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
      <div class="form_group_inner">
        <div class="txt">
          <ul class="c-inputList c-inputList--box">
            <li>
              <input type="radio" name="性別" value="男性" class="form-check-input" checked data-pfwform-required id="radio_gender_01">
              <label for="radio_gender_01" class="form-check-label form-check-inline" checked>男性</label>
            </li>
            <li>
              <input type="radio" name="性別" value="女性" class="form-check-input" data-pfwform-required id="radio_gender_02">
              <label for="radio_gender_02" class="form-check-label form-check-inline">女性</label>
            </li>
          </ul>
        </div>
      </div>
      <div class="form_error_wrap" data-pfwform-show-if-error="性別">
        <div class="form_error_inner">
          <i class="fa fa-exclamation-triangle"></i>
          <ul>
            <li>性別を正しく入力してください。</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="form_group_wrap" data-pfwform-show-if-confirm>
      <p class="c-confirmTxt" data-pfwform-confirm-value="性別"></p>
    </div>
  </td>
</tr>
{# 性別 #}


{# チェックボックス #}
<tr data-pfwform-class-if-error="form_error" data-pfwform-target="チェックボックス">
  <th class="c-formTbl__head">
    <div class="c-formTbl__title">
      チェックボックス
      <span class="ico optional" data-pfwform-hide-if-confirm>任意</span>
    </div>
  </th>
  <td class="c-formTbl__input">
    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
      <div class="form_group_inner">
        <div class="txt">
          <ul class="c-inputList c-inputList--box">
            <li>
              <input type="checkbox" name="チェックボックス[]" value="アイテム1" class="form-check-input" id="checkbox_item_01">
              <label for="checkbox_item_01" class="form-check-label form-check-inline">アイテム1</label>
            </li>
            <li>
              <input type="checkbox" name="チェックボックス[]" value="アイテム2" class="form-check-input" id="checkbox_item_02">
              <label for="checkbox_item_02" class="form-check-label form-check-inline">アイテム2</label>
            </li>
          </ul>
        </div>
      </div>
      <div class="form_error_wrap" data-pfwform-show-if-error="チェックボックス">
        <div class="form_error_inner">
          <i class="fa fa-exclamation-triangle"></i>
          <ul>
            <li>チェックボックスを正しく入力してください。</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="form_group_wrap" data-pfwform-show-if-confirm>
      <p class="c-confirmTxt" data-pfwform-confirm-value="チェックボックス"></p>
    </div>
  </td>
</tr>
{# チェックボックス #}


{# 電話番号 #}
<tr data-pfwform-class-if-error="form_error" data-pfwform-target="電話番号">
  <th class="c-formTbl__head">
    <div class="c-formTbl__title">
      電話番号
      <span class="ico optional" data-pfwform-hide-if-confirm>任意</span>
    </div>
  </th>
  <td class="c-formTbl__input">
    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
      <div class="form_group_inner">
        <div class="txt small">
          <input type="tel" name="電話番号" value="">
        </div>
        <p class="c-example">例）0123-456-789</p>
      </div>
      <div class="form_error_wrap" data-pfwform-show-if-error="電話番号">
        <div class="form_error_inner">
          <i class="fa fa-exclamation-triangle"></i>
          <ul>
            <li>電話番号を正しく入力してください。</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="form_group_wrap" data-pfwform-show-if-confirm>
      <p class="c-confirmTxt" data-pfwform-confirm-value="電話番号"></p>
    </div>
  </td>
</tr>
{# 電話番号 #}


{# 郵便番号 #}
<tr data-pfwform-class-if-error="form_error" data-pfwform-target="郵便番号">
  <th class="c-formTbl__head">
    <div class="c-formTbl__title">
      郵便番号
      <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
    </div>
  </th>
  <td class="c-formTbl__input c-formTbl__input--zip">
    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
      <div class="form_group_inner">
        <div class="c-formTbl__input-ico">&#12306;</div>
        <div class="txt small">
          <input type="text" class="form-control p-postal-code" name="郵便番号" size="8" maxlength="8" data-pfwform-required data-pfwform-class-if-success="has_success" data-pfwform-class-if-error="form-control-danger">
        </div>
      </div>
      <div class="form_error_wrap" data-pfwform-show-if-error="郵便番号">
        <div class="form_error_inner">
          <i class="fa fa-exclamation-triangle"></i>
          <ul>
            <li>郵便番号を正しく入力してください。</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="form_group_wrap" data-pfwform-show-if-confirm>
      <p class="c-confirmTxt">&#12306;<span data-pfwform-confirm-value="郵便番号"></span></p>
    </div>
  </td>
</tr>
{# 郵便番号 #}


{# 住所 #}
<tr data-pfwform-class-if-error="form_error" data-pfwform-target="住所">
  <th class="c-formTbl__head">
    <div class="c-formTbl__title">
      住所
      <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
    </div>
  </th>
  <td class="c-formTbl__input">
    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
      <div class="form_group_inner">
        <div class="c-inputName__block">
          <div class="txt medium">
            <input type="text" class="form-control p-region p-locality p-street-address p-extended-address" name="住所" data-pfwform-required data-pfwform-class-if-success="has_success" data-pfwform-class-if-error="form-control-danger">
          </div>
        </div>
      </div>
      <div class="form_error_wrap" data-pfwform-show-if-error="住所">
        <div class="form_error_inner">
          <i class="fa fa-exclamation-triangle"></i>
          <ul>
            <li>住所を正しく入力してください。</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="form_group_wrap" data-pfwform-show-if-confirm>
      <p class="c-confirmTxt" data-pfwform-confirm-value="住所"></p>
      <p class="c-confirmTxt" data-pfwform-confirm-value="建物名"></p>
    </div>
  </td>
</tr>
{# 住所 #}


{# メールアドレス #}
<tr class="form_wrap" data-pfwform-class-if-error="form_error" data-pfwform-target="メールアドレス">
  <th class="c-formTbl__head">
    <div class="c-formTbl__title">
      メールアドレス
      <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
    </div>
  </th>
  <td class="c-formTbl__input">
    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
      <div class="form_group_inner">
        <div class="txt medium">
          <input class="" type="email" name="メールアドレス" value="" data-pfwform-type="email" autocomplete="on" data-pfwform-required>
        </div>
        <p class="c-example">例）tarou@example.com</p>
        <p class="c-formComment">送信内容の控えメールを自動送信いたします。<br>携帯電話メールの方は迷惑メール設定をご確認ください。</p>
      </div>
      <div class="form_error_wrap" data-pfwform-show-if-error="メールアドレス">
        <div class="form_error_inner">
          <i class="fa fa-exclamation-triangle"></i>
          <ul>
            <li>メールアドレスを正しく入力してください。</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="form_group_wrap" data-pfwform-show-if-confirm>
      <p class="c-confirmTxt" data-pfwform-confirm-value="メールアドレス"></p>
    </div>
  </td>
</tr>
{# メールアドレス #}


{# ご質問・ご意見・ご要望等 #}
<tr class="form_wrap" data-pfwform-class-if-error="form_error" data-pfwform-target="ご質問・ご意見・ご要望等">
  <th class="c-formTbl__head">
    <div class="c-formTbl__title">
      ご質問・ご意見・ご要望等
      <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
    </div>
  </th>

  <td class="c-formTbl__input">
    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
      <div class="form_group_inner">
        <div class="txt">
          <textarea name="ご質問・ご意見・ご要望等" cols="40" rows="10" class="type_box" data-pfwform-required></textarea>
        </div>
      </div>
      <div class="form_error_wrap" data-pfwform-show-if-error="ご質問・ご意見・ご要望等">
        <div class="form_error_inner">
          <i class="fa fa-exclamation-triangle"></i>
          <ul>
            <li>ご質問・ご意見・ご要望等を正しく入力してください。</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="form_group_wrap" data-pfwform-show-if-confirm>
      <p class="c-confirmTxt" data-pfwform-confirm-value="ご質問・ご意見・ご要望等"></p>
    </div>
  </td>
</tr>
{# ご質問・ご意見・ご要望等 #}
```