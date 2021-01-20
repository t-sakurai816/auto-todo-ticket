<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>自動チケット一覧</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="css/style.css">
</head>
<!-- document : https://getbootstrap.jp/docs/4.2/components/list-group/ -->

<body>
  <header>
    <h1>自動チケット一覧</h1>
  </header>
  <div class="main">
    <div class="container">
      <ul class="list-group align-items-center"><!--list-groupを作って各要素を中央寄せ-->
        <a href="./create-csr-ticket/index.php" class="list-group-item list-group-item-action text-primary text-center col-xs-12 col-sm-12 col-md-6">
          <!-- 枠がついたリストを作成して、それぞれをリンクにする。テキストを青(primary)にして中央寄せ。スマホ・タブレットサイズは横幅いっぱい、PCサイズは半分の横幅 -->
          CSRの作成
        </a>
        <a href="./ssl-verify-ticket/index.php" class="list-group-item list-group-item-action text-primary text-center col-xs-12 col-sm-12 col-md-6 ">
          証明書の検証
        </a>
        <a href="./ssl-apply-ticket/index.php" class="list-group-item list-group-item-action text-primary text-center col-xs-12 col-sm-12 col-md-6">
          証明書の適用
        </a>
      </ul>
    </div>
  </div>
  <footer>

  </footer>
</body>

</html>