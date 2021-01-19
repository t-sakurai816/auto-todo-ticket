<?php
function description($matter_name,$target_server,$target_domain,$premise_ticket,$purpose,$deadline,$report,$person_name,$other,$crt,$ca){
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
  EOM;
  return $description;
}
