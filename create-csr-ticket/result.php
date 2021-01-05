<?php

// エスケープ処理
function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
  }

// POSTを受け取る
$matter_name              = h($_POST[matter_name]); //案件名
$target_server            = h($_POST[target_server]); //対象サーバー
$target_domain            = h($_POST[target_domain]); //対象サーバー
$purpose                  = h($_POST[purpose]); //作業目的
$deadline                 = h($_POST[deadline]); //期限
$report                   = h($_POST[report]); //報告内容
$person_name              = h($_POST[person_name]); //チケット作成者
$other                    = h($_POST[other]); //その他
$country                  = h($_POST[country]); //国
$state                    = h($_POST[state]); //都道府県
$municipalities           = h($_POST[municipalities]); //市区町村
$common_name              = h($_POST[common_name]); //コモンネーム
$organization             = h($_POST[organization]); //組織
$organizational_unit_name = h($_POST[organizational_unit_name]); //部署名

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSRの作成</title>
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
  <!-- favicon -->
  <link rel="shortcut icon" href="../../auto-todo-ticket/favicon.ico" type="image/x-icon">
  <!-- css -->
  <link rel="stylesheet" href="css/index.css">

</head>
<body>
  <header>
    <h1>チケットを作成しました</h1>
    <h2><a href=""><?php echo $matter_name; ?>　＞　CSRの作成</a></h2>
  </header>
  <div class="main">
    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <!-- 今回はなし -->
            </thead>
            <tbody>
              <tr>
                <th class="text-left" style="width: 20%;">案件名</th>
                <td><?php echo $matter_name; ?></td>
              </tr>
              <tr>
                <th class="text-left">対象サーバー</th>
                <td><?php echo $target_server; ?></td>
              </tr>
              <tr>
                <th class="text-left">対象ドメイン名</th>
                <td><?php echo $target_domain; ?></td>
              </tr>
              <tr>
                <th class="text-left">作業目的</th>
                <td><?php echo $purpose; ?></td>
              </tr>
              <tr>
                <th class="text-left">期限</th>
                <td><?php echo $deadline; ?></td>
              </tr>
              <tr>
                <th class="text-left">報告内容</th>
                <td><?php echo $report; ?></td>
              </tr>
              <tr>
                <th class="text-left">チケット作成者</th>
                <td><?php echo $person_name ?></td>
              </tr>
              <tr>
                <th class="text-left">その他</th>
                <td><?php echo $other; ?></td>
              </tr>
              <tr>
                <!-- 空行を追加 -->
                <td colspan="2"></td>
              </tr>
              <tr>
                <th colspan="2" class="text-center">CSR情報</th>
              </tr>
              <tr>
                <th class="text-left">国（C）</th>
                <td><?php echo $country; ?></td>
              </tr>
              <tr>
                <th class="text-left">都道府県（S）</th>
                <td><?php echo $state; ?></td>
              </tr>
              <tr>
                <th class="text-left">市区町村（L）</th>
                <td><?php echo $municipalities; ?></td>
              </tr>
              <tr>
                <th class="text-left">コモンネーム（CN）</th>
                <td><?php echo $common_name; ?></td>
              </tr>
              <tr>
                <th class="text-left">組織名（O）</th>
                <td><?php echo $organization; ?></td>
              </tr>
              <tr>
                <th class="text-left">部署名（OU）</th>
                <td><?php echo $organizational_unit_name; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</body>
</html>