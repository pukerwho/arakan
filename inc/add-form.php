<?php 
$chatID = carbon_get_theme_option("crb_telegram_chat_id");
$apiToken = carbon_get_theme_option("crb_telegram_api");
$content = "";
foreach ($_POST as $key => $value) {
  if ($value) {
    $content .= "<b>$key</b>: <i>$value</i>\n";
  }
  if (trim($content)) {
    $data = [
      'chat_id' => $chatID, 
      'text' => $content,
      'parse_mode' => 'HTML'
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );       
  }
}
?>