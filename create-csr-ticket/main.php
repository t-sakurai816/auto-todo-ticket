<?php
require_once('csr_ticket_info.php');
require_once('log_save.php');

//環境変数を読み込み
function load_env_file(){
  require dirname(__FILE__).'/../vendor/autoload.php'; //vendorディレクトリの階層を指定する
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/..'); //.envの階層を指定する
  $dotenv->load();
  return $dotenv;
}

//今日の日付を取得
function get_today(){
  $timestamp = time();
  $today = date('Y-m-d', $timestamp); //今日の日付を取得
  // echo $today;
  return $today;
}

// チケットを作成
function create_ticket($today, $matter_name, $target_domain, $deadline, $description){
  $host = 'towninc.backlog.jp';
  $apiKey = $_ENV["APIKEY"];
  $params = array(
    'projectId' => $_ENV["PROJECTID"], //HCN
    'summary' => $matter_name.'　＞　CSRの作成（'. $target_domain. '）', //課題の件名
    'description' => $description, //課題の詳細
    'startDate' => $today, //課題の開始日
    'dueDate' => $deadline, //課題の期限日
    // 'categoryId' => $_ENV["CATEGORYID"], //カテゴリーID
    'issueTypeId' => $_ENV["ISSUETYPEID"], //タスク
    'priorityId' => "3", //中
    'assigneeId' => $_ENV["ASSIGNEELD"] //担当者
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

  return $response;
}

//エラーチェック
function error_check($response, $matter_name, $purpose){
  $result = json_decode($response,true);
  $array_keys = array_keys($result);

  if($array_keys['0'] === 'errors'){//もし結果がエラーだったら
    // 管理者への確認を促すとともに、エラーコードを表示する
    $result = "エラーです。<br>管理者に確認してください<br>エラーコード : ". $result['errors']['0']['message'];
    echo $result;
  }else{//成功したら
    // チケット作成のメッセージと共に、チケットへのリンクを表示する
    $result = "チケットを作成しました ".'<a href="'. "https://towninc.backlog.jp/view/" .$result['issueKey'] .'">'. $matter_name .'　＞　'.$purpose.'</a>';
    // echo $result;

    return $result;
  }
}

function main($matter_name,$target_server,$target_domain,$purpose,$deadline,$report,$person_name,$other,$country,$state,$municipalities,$common_name,$organization,$organizational_unit_name){

  $dotenv = load_env_file();
  $today = get_today();
  $description = description($matter_name,$target_server,$target_domain,$purpose,$deadline,$report,$person_name,$other,$country,$state,$municipalities,$common_name,$organization,$organizational_unit_name);

  $response =  create_ticket($today, $matter_name, $target_domain, $deadline, $description);

  //logを保存
  log_save($response);

  $result = error_check($response, $matter_name, $purpose);

  return $result;
}

// main(
//   "test",
//   "test",
//   "test",
//   "test",
//   "test",
//   "test",
//   "test",
//   "test",
//   "test",
//   "test",
//   "test",
//   "test",
//   "test",
//   "test"
// );