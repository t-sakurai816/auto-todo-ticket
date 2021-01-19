<?php
function description($matter_name,$target_server,$target_domain,$premise_ticket,$purpose,$deadline,$start_time,$end_time,$report,$person_name,$other){
$description = <<< EOM
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
  EOM;
  return $description;
}
