<?php
//CSR作成のチケットを作成する
function create_ticket($matter_name,$target_server,$target_domain,$premise_ticket,$purpose,$deadline,$report,$person_name,$other,$crt,$ca)
{
  require dirname(__FILE__).'/../vendor/autoload.php'; //vendorディレクトリの階層を指定する
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/..'); //.envの階層を指定する
  $dotenv->load();
  
  $host = 'towninc.backlog.jp';
  $apiKey = $_ENV["APIKEY"];

  //今日の日付を取得
  $timestamp = time();
  $today = date('Y-m-d', $timestamp);

  $params = array(
    'projectId' => $_ENV["PROJECTID"], //HCN
    'summary' => $matter_name.'　＞　証明書の検証', //課題の件名
    'description' => <<< EOM
  ```
  【案件名】
  $matter_name
  【対象サーバー(host名 or IP)】
  $target_server
  【対象ドメイン名】
  $target_domain
  【前提チケット・関連チケット】
  $premise_ticket
  【作業目的】
  $purpose
  【期限】
  $deadline
  【報告内容】
  $report
  【チケット作成者】
  $person_name
  【その他】
  $other
  ``` 
  
  ## SSL証明書(CRT)

  ```
  $crt
  ```

  ## 中間証明書(CA)

  ```
  $ca
  ```
  ### 作業情報

  作業wiki : [ガイドライン / 運用 / SSL証明書関連 / SSL証明書の検証](https://towninc.backlog.jp/alias/wiki/247707)

  ### CSR, KEY

  以下のチケットを参考にしてください
  $premise_ticket
  EOM, //課題の詳細
    'startDate' => $today, //課題の開始日
    'dueDate' => $today, //課題の期限日
    // 'categoryId[]' => , //カテゴリーID
    'issueTypeId' => $_ENV["ISSUETYPEID"], //タスク
    'priorityId' => "3" //中
  );

  $headers = array('Content-Type:application/x-www-form-urlencoded');
  $context = array(
    'http' => array(
      'method' => 'POST',
      'header' => $headers,
      'ignore_errors' => true
    )
  );

  $url = 'https://' . $host . '/api/v2/issues?apiKey=' . $apiKey . '&' . http_build_query($params, '', '&');
  $response = file_get_contents($url, false, stream_context_create($context));
  // echo $response;

  $array_keys = array_keys($result);

  
  if($array_keys['0'] === 'errors'){//もし結果がエラーだったら
    // 管理者への確認を促すとともに、エラーコードを表示する
    $_SESSION['response'] ="エラーです。<br>管理者に確認してください<br>エラーコード : ". $result['errors']['0']['message'];
  }else{//成功したら
    // チケット作成のメッセージと共に、チケットへのリンクを表示する
    $_SESSION['response'] = "チケットを作成しました<br>".'<a href="'. "https://towninc.backlog.jp/view/" .$result['issueKey'].'">'. $summary .'　＞　CSRの作成</a>';
  }

  return $response;
}
