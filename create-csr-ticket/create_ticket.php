<?php
//CSR作成のチケットを作成する
function create_ticket_csr($matter_name,$target_server,$target_domain,$purpose,$deadline,$report,$person_name,$other,$country,$state,$municipalities,$common_name,$organization,$organizational_unit_name)
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
    'summary' => $matter_name.'　＞　CSRの作成', //課題の件名
    'description' => <<< EOM
  ```
  【案件名】
  $matter_name
  【対象サーバー(host名 or IP)】
  $target_server
  【対象ドメイン名】
  $target_domain
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
  
  ---------------------------------------------------------
  国(C)：$country
  都道府県(S)：$state
  市区町村(L)：$municipalities
  コモンネーム(CN)：$common_name
  組織名(O)：$organization
  部署名(OU)：$organizational_unit_name
  ---------------------------------------------------------
  
  ```
  
  ### 作業情報
  
  作業wiki : [運用 / SSL証明書 / csrファイルの発行 ](https://towninc.backlog.jp/alias/wiki/735407)
  テストwiki : [運用 / 汎用テスト / CSR作成](https://towninc.backlog.jp/alias/wiki/779637)
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
  echo $response;
}

create_ticket_csr(
  'テスト様',
  'xx.xx.xx.xx',
  'hoge.example.com',
  'CSRの作成',
  '2021/01/08',
  '設定完了報告、zipファイルの添付',
  'テスト太郎',
  'その他',
  'JP',
  'Tokyo',
  'Chuo-ku',
  'hoge.exaple.com',
  '-',
  '-'
);