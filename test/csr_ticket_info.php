<?php
function description($matter_name,$target_server,$target_domain,$purpose,$deadline,$report,$person_name,$other,$country,$state,$municipalities,$common_name,$organization,$organizational_unit_name){
  $description = <<< EOM
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
  EOM;
  return $description;
}
