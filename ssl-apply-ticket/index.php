<?php
session_start();

$_SESSION['user']['reload'] = "taisaku";
$reload_off = $_SESSION['user']['reload'];

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>証明書の適用</title>
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
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <header>
    <h1>証明書の適用</h1>
  </header>
  <div class="main">
    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered">
            <form action="result.php" method="post" id="ssl-apply-form">
            <!-- リロード判定用 -->
            <input type="hidden" name="reload" value=<?php echo $reload_off; ?>>
              <thead>
                <!-- 今回はなし -->
              </thead>
              <tbody>
                <tr>
                  <!-- 上段でスタイルを適用 -->
                  <th class="text-left" style="width:20%">案件名</th>
                  <th class="text-center bg-danger text-white" style="width:10%">必須</th>
                  <td><input type="text" name="matter_name" class="form-control" placeholder="例）◯◯様" required></td>
                </tr>
                <tr>
                  <th class="text-left">対象サーバー</th>
                  <th class="text-center bg-danger text-white">必須</th>
                  <td><input type="text" name="target_server" class="form-control" placeholder="host名 or IP" required>
                  </td>
                </tr>
                <tr>
                  <th class="text-left">対象ドメイン名</th>
                  <th class="text-center bg-danger text-white">必須</th>
                  <td><input type="text" name="target_domain" class="form-control" placeholder="例）hoge.example.com"
                      required></td>
                </tr>
                <tr>
                  <th class="text-left">作業目的</th>
                  <th class="text-center bg-danger text-white">必須</th>
                  <td><input type="text" name="purpose" class="form-control" value="証明書の適用" required></td>
                </tr>
                <tr>
                  <th class="text-left">前提チケット</th>
                  <th class="text-center bg-danger text-white">必須</th>
                  <td><input type="text" name="premise_ticket" name="target_server" class="form-control"
                      placeholder="例）https://towninc.backlog.jp/view/CI-XXXX" required>
                  </td>
                </tr>
                <tr>
                  <th class="text-left">期限</th>
                  <th class="text-center bg-danger text-white">必須</th>
                  <td>
                    <div class="form-row">
                      <div class="col-xs12 col-sm-12 col-md-6">
                        <input type="date" name="deadline" class="form-control" placeholder="2020/MM/DD" required>
                      </div>
                      <div class="col-xs12 col-sm-12 col-md-3">
                        <input type="time" class="form-control" name="start_time" step="300" placeholder="15:00"
                          required>
                      </div>
                      <div class="col-xs12 col-sm-12 col-md-3">
                        <input type="time" class="form-control" name="end_time" step="300" placeholder="15:30" required>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th class="text-left">報告内容</th>
                  <th class="text-center bg-danger text-white">必須</th>
                  <td><textarea name="report" class="form-control">設定完了報告</textarea required></td>
                </tr>
                <tr>
                  <th class="text-left">チケット作成者</th>
                  <th class="text-center bg-danger text-white">必須</th>
                  <td><select name="person_name" class="selectpicker" id="targetSelect" size="1">
                      <option>foo</option>
                      <option>bar</option>
                      <option>hoge</option>
                      <option>その他</option>
                    </select></td>
                </tr>
                <tr>
                  <th class="text-left">その他</th>
                  <th class="text-center bg-warning text-white">任意</th>
                  <td><textarea class="form-control" name="other" placeholder="なにか伝えたいことがあれば入力"></textarea></td>
                </tr>
              </tbody>
            </form>
          </table>
        </div>
      </div>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary btn-lg" form="ssl-apply-form">送信</button>
    </div>
  </div>
  <footer>
    <hr>
    <div class="to-list-page">
      <h3><a href="../index.php">チケット自動作成一覧へ</a></h3>
    </div>
  </footer>
</body>

</html>