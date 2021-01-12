<?php
//CSR作成のチケットを作成する
function create_ticket($matter_name,$target_server,$target_domain,$premise_ticket,$purpose,$deadline,$start_time,$end_time,$report,$person_name,$other)
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
    'summary' => $matter_name.'　＞　証明書の適用（'. $target_domain. '）（'.$deadline + $start_time .'-'. $end_time.'）', //課題の件名
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
  
  ### 作業情報

  作業wiki : [運用 / SSL証明書 / サーバ反映の自動実行手順](https://towninc.backlog.jp/alias/wiki/783757)

  ### 検証チケット

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

  $result = json_decode($response,true);
}
create_function(
  "テスト様",
  "54.168.42.128",
  "hoge.example.com",
  "https://towninc.backlog.jp/view/CI-10017",
  "証明書の適用",
  "2021/01/15",
  "16:00",
  "16:30",
  "設定完了報告",
  "foo",
  "なし"
);