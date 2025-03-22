<?php
$input_text = $_POST['input_text'];
$api_key = 'AIzaSyAawdc4u_i6KUOyQ1aJCc5fteBaRpvUgtg';
$url = 'https://api.gemini.com/chatbot';
$data = array('message' => $input_text, 'api_key' => $api_key);

$options = array(
  'http' => array(
    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    'method'  => 'POST',
    'content' => http_build_query($data),
  ),
);

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

$bot_response = json_decode($response, true)['response'];
echo json_encode(array('bot_response' => $bot_response));
?>
