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
    <h1>チケットを作成しました</h1>
    <!-- <h2></h2> -->
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
                <td>
                  <?php echo $matter_name; ?>
                </td>
              </tr>
              <tr>
                <th class="text-left">対象サーバー</th>
                <td>
                  <?php echo $target_server; ?>
                </td>
              </tr>
              <tr>
                <th class="text-left">対象ドメイン名</th>
                <td>
                  <?php echo $target_domain; ?>
                </td>
              </tr>
              <tr>
                <th class="text-left">前提チケット</th>
                <td>
                  <?php echo $premise_ticket; ?>
                </td>
              </tr>
              <tr>
                <th class="text-left">作業目的</th>
                <td>
                  <?php echo $purpose; ?>
                </td>
              </tr>
              <tr>
                <th class="text-left">期限</th>
                <td>
                  <?php echo $deadline ." ". $start_time ."-". $end_time; ?>
                </td>
              </tr>
              <tr>
                <th class="text-left">報告内容</th>
                <td>
                  <?php echo $report; ?>
                </td>
              </tr>
              <tr>
                <th class="text-left">チケット作成者</th>
                <td>
                  <?php echo $person_name ?>
                </td>
              </tr>
              <tr>
                <th class="text-left">その他</th>
                <td>
                  <?php echo $other; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
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