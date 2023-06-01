<?php
$url = $_GET['url'];
$size = $_GET['size'];
$gapi = "https://s2.googleusercontent.com/s2/favicons?domain=";

if (filter_var($url, FILTER_VALIDATE_URL)) {
  $faviconUrl = $gapi . urlencode($url);
  if ($size != "default") {
    $faviconUrl .= "&sz=" . $size;
  }
  header('Content-Type: image/png');
  readfile($faviconUrl);
} else {
  header('HTTP/1.1 400 Bad Request');
  echo "Invalid URL";
}
?>