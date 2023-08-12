<?php 
function telegramMessage() {
  $title = stripslashes_deep($_POST['title']);
  $city = stripslashes_deep($_POST['city']);
  $email = stripslashes_deep($_POST['email']);

  $chatID = carbon_get_theme_option("crb_telegram_chat_id");
  $apiToken = carbon_get_theme_option("crb_telegram_api");
  $content = "";
  $content .= "<b>Заклад</b>: $title\n";
  $content .= "<b>Місто</b>: $city\n";
  $content .= "<b>Контакт</b>: $email\n";
  $data = [
    'chat_id' => $chatID, 
    'text' => $content,
    'parse_mode' => 'HTML'
  ];
  $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );  
}

add_action('wp_ajax_telegram_add_action', 'telegramMessage');
add_action('wp_ajax_nopriv_telegram_add_action', 'telegramMessage');
?>