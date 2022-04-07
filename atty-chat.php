<?php
session_start();
include('connection.php');
include("encript_decrypt.php");

$chat = $_POST['chat'];
$attachedFile = $_FILES['attachedFile'];
$sender = $_SESSION['attorney_ID'];
$sendTo = $_POST['clientId'];

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
            $sql = mysqli_query($connect, "INSERT chat(sender_id, send_to, content) VALUES('$sender', '$sendTo', '$encryptFile')");
        }
    }
    if ($chat != "") {
        $encryptChat = encrypt_decrypt($_POST['chat'], 'encrypt');
        $sql = mysqli_query($connect, "INSERT chat(sender_id, send_to, content) VALUES('$sender', '$sendTo', '$encryptChat')");
    }
}

if ($sql) {
    echo "<script>
        window.location.href = 'messages.php?changeSession&&val=$sendTo'
    </script>";
} else {
    echo "<script>
    window.location.href = 'appointment.php'
</script>";
}
