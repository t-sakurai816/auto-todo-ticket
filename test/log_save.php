<?php

// // 今日の日付を取得する
// function get_today(){
//     $timestamp = time();
//     $today = date('Y-m-d', $timestamp); //今日の日付を取得
//     $today = str_replace("-","","$today"); //連続した数字で出力する
//     // echo $today;
//     return $today;
// }

//ファイルがなければ新規作成、あれば追記
function create_file($date, $log_data){
    $result  = file_put_contents("test_$date.log",$log_data."\n" , FILE_APPEND);

    //ファイル書き込み判定
    if($result === false){
        // echo "log書き込み失敗\n";
    }else{
        // echo "log書き込み成功：".$result."Byte\n";
    }
    return $result;
}

//ファイルを削除
function delete_file($date){
    $result = unlink("test_$date.log");
    
    //ファイル削除判定
    if($result === false){
        // echo "ファイル削除失敗\n";
    }else{
        // echo "ファイル削除成功\n";
    }
    
    return $result;
}

function log_save($log_data){
    $today = get_today();
    $today = str_replace("-","","$today"); //連続した数字で出力する
    $thirty_days_ago = date("Y-m-d",strtotime("-30 day")); //30日前の日付を取得
    $thirty_days_ago = str_replace("-","","$thirty_days_ago"); //連続した数字で出力する
    
    // 30日前のlogファイルがあれば削除
    if(file_exists("$thirty_days_ago.log")){
        delete_file($thirty_days_ago);
    }

    // logファイルを作成
    $result = create_file($today, $log_data);
    
    return $result;
}

// log_save("ログデータですよん");