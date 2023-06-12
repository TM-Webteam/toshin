<?php get_header(); ?>

<main class="contact">

  <section class="hero03 core">
    <div class="containers">
      <div class="hero03__box">
        <h1 class="ttl-primary-lower">お問合せ・お見積り</h1>
        <div class="lead">医療機器・化粧品物流に関するお問合せ・<br class="sp-only">お見積りはお気軽にご連絡ください。</div>
      </div>
    </div>
  </section>

  <section class="form">
    <div class="containers">
      <div class="form__note">
        <p>● 以下フォームにご連絡先、お問合せ内容をご記入の上、送信してください。担当よりご連絡申し上げます。</p>
        <p>● 回答までにお時間をいただく場合や、回答ができない場合もございますので、ご了承ください。</p>
      </div>
      <form action="">
        <div class="form__ttl">お問合せ・お見積りフォーム</div>
        <div class="form__table">
          <table>
            <colgroup>
              <col>
              <col>
            </colgroup>
            <tr>
              <th class="flex aiC">
                <span class="item">会社名</span>
                <span class="required"></span>
              </th>
              <td><input type="text" placeholder="例）〇〇〇〇株式会社"></td>
            </tr>
            <tr>
              <th class="flex aiC">
                <span class="item">部署名</span>
                <span class="optional"></span>
              </th>
              <td><input type="text" placeholder="例）〇〇〇〇部署"></td>
            </tr>
            <tr>
              <th class="flex aiC">
                <span class="item">ご担当者名</span>
                <span class="required"></span>
              </th>
              <td>
                <div class="flex aiC">
                  <p class="flex fS aiC half"><span>氏：</span><input type="text" placeholder="例）佐藤"></p>
                  <p class="flex fS aiC half"><span>名：</span><input type="text" placeholder="例）太郎"></p>
                </div>
              </td>
            </tr>
            <tr>
              <th class="flex aiC">
                <span class="item">メールアドレス</span>
                <span class="required"></span>
              </th>
              <td><input type="email" placeholder="例）sample@gmail.com.jp"></td>
            </tr>
            <tr>
              <th class="flex aiC">
                <span class="item">電話番号</span>
                <span class="required"></span>
              </th>
              <td><input type="tel" placeholder="例）090-1234-5678"></td>
            </tr>
            <tr>
              <th class="flex aiC">
                <span class="item">お問合せ内容詳細</span>
                <span class="required"></span>
              </th>
              <td><textarea placeholder="例）テキストテキスト。"></textarea></td>
            </tr>
            <tr>
              <th class="flex aiC">
                <span class="item">個人情報の取扱いについて</span>
                <span class="required"></span>
              </th>
              <td><div class="flex fS aiC"><input type="checkbox">同意する</div><p>弊社Webサイトの<a href="/privacy/">プライバシーポリシー</a>をご確認の上、ご同意いただき送信をお願いいたします。</p></td>
            </tr>
          </table>
          <button type="submit" class="more">確認画面へ進む</button>
        </div>
      </form>
      
    </div>
  </section>

</main>

<?php get_footer(); ?>