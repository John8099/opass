<?php
session_start();
include('connection.php');
include("encript_decrypt.php");

$chat = $_POST['chat'];
$attachedFile = $_FILES['attachedFile'];
$sender = $_SESSION['Client_ID'];
$sendTo = $_POST['sendTo'];

$sql = null;
if ($chat != "" || $attachedFile['name'] != "") {
  if ($attachedFile['name'] != "") {
    date_default_timezone_set("Asia/Manila");
    $uploadfile = date("mdY-his") . "_" . basename($attachedFile['name']);
    $encryptFile = encrypt_decrypt("media/$uploadfile", 'encrypt');
    if (!is_dir("media")) {
      mkdir("media", 0777, true);
    }
    if (move_uploaded_file($attachedFile['tmp_name'], "media/$uploadfile")) {
      $sql = mysqli_query($connect, "INSERT chat(sender_id, send_to, content, sender_type) VALUES('$sender', '$sendTo', '$encryptFile','user')");
    }
  }
  if ($chat != "") {
    $encryptChat = encrypt_decrypt($_POST['chat'], 'encrypt');
    $sql = mysqli_query($connect, "INSERT chat(sender_id, send_to, content, sender_type) VALUES('$sender', '$sendTo', '$encryptChat', 'user')");
  }
}

if ($sql) {
  echo "<script>
        window.location.href = 'user_inbox.php?user_id=$sendTo'
    </script>";
} else {
  echo "<script>
    window.location.href = 'user_index.php'
</script>";
}
