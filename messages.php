<?php
include("connection.php");
include("process.php");
include("function.php");
include("encript_decrypt.php");
$user_data = check_login($connect);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OPASS-INBOX</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet">
  <link href="css/msg.css" rel="stylesheet">
  <link rel="stylesheet" href="chatStyle.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script> -->
</head>

<body>
  <!--navigation-->
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span></button>
        <img src="5.png" class="dashlogo">
      </div>
    </div><!-- /.container-fluid -->
  </nav>
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <br>
    <div class="profile-userpic">
      <a href="my-profile.php">
        <?php
        if ($user_data['profile'] == "") {
        ?>
          <em class="fa fa-user-circle-o fa-3x" id="iconprof"></em>
        <?php
        } else {
        ?>
          <img id="prev_img" src="<?php echo $user_data['profile'] ?>" style="border: 1px solid #808080;" />
        <?php
        }
        ?>
      </a>
      <div class="profile-usertitle">
        <div class="profile-usertitle-name"><a class="username"><?php echo $user_data['firstname']; ?></a>
        </div>
      </div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
      <li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
      <li><a href="appointment.php"><em class="fa fa-calendar">&nbsp;</em> Appointments</a></li>
      <li class="active"><a href="messages.php"><em class="fa fa-envelope-o">&nbsp;</em>Messages</a></li>
      <li><a href="notification.php"><em class="fa fa-check">&nbsp;</em>Done Appointments</a></li>
      <li><a href="attorney_logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
  </div>
  <!--/.sidebar-->

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header" style="color: #14759e;margin: 0">Messages</h1>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-lg-12" id="chatApp">
        <div class="card chat-app" id="inbox">

          <div id="plist" class="people-list">
            <ul class="list-unstyled chat-list mt-2 mb-0">
              <?php
              $peopleQuery = mysqli_query(
                $connect,
                "SELECT * FROM chat WHERE (send_to = {$_SESSION['attorney_ID']} or sender_id = {$_SESSION['attorney_ID']}) and sender_type='user' GROUP BY send_to, sender_id"
              );
              $userIdOnload = 0;
              $userFullNameOnLoad = "";
              $previewImg = "";
              if (mysqli_num_rows($peopleQuery) > 0) :
                $peoples = $peopleQuery->fetch_all(MYSQLI_ASSOC);
                for ($i = 0; $i < count($peoples); $i++) :
                  $user = mysqli_fetch_object(
                    mysqli_query(
                      $connect,
                      "SELECT * FROM user WHERE Client_ID={$peoples[$i]['sender_id']}"
                    )
                  );
                  if (isset($_GET["user_id"])) {
                    if ($_GET["user_id"] == $peoples[$i]['sender_id']) {
                      $userFullNameOnLoad = ucwords("$user->c_fname $user->c_lname");
                      $userIdOnload = $user->Client_ID;
                      if ($user->profile) {
                        $previewImg = $user->profile;
                      }
                    }
                  } else if ($i === 0 && !isset($_GET["user_id"])) {
                    $userFullNameOnLoad = ucwords("$user->c_fname $user->c_lname");
                    $userIdOnload = $user->Client_ID;
                    if ($user->profile) {
                      $previewImg = $user->profile;
                    }
                  }

              ?>
                  <!-- Active -->
                  <a href="?user_id=<?= $user->Client_ID ?>" style="color:#444444">
                    <li class="clearfix <?php
                                        if ($i == 0 && !isset($_GET['user_id'])) {
                                          echo "active";
                                        } else if (isset($_GET['user_id'])) {
                                          if ($_GET['user_id'] == $peoples[$i]['sender_id']) {
                                            echo "active";
                                          }
                                        }
                                        ?>">
                      <?php if ($user->profile) : ?>
                        <img id="prev_img" src="<?php echo $user->profile ?>" />
                      <?php else : ?>
                        <i class="fa fa-user-circle-o fa-3x" style="float: left;"></i>
                      <?php endif; ?>
                      <div class="about">
                        <div class="name">
                          <?php
                          echo ucwords("$user->c_fname $user->c_lname");
                          ?>
                        </div>
                      </div>
                    </li>
                  </a>
                <?php endfor; ?>
              <?php else : ?>
                <div style="margin: 15px;text-align:center">
                  <h4>No Conversation yet</h4>
                </div>
              <?php endif; ?>
            </ul>
          </div>

          <div class="chat">
            <div class="chat-header clearfix">
              <div class="row">
                <div class="col-lg-6">
                  <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                    <?php if ($previewImg !== "") : ?>
                      <img id="prev_img" src="<?php echo $previewImg ?>" />
                    <?php else : ?>
                      <i class="fa fa-user-circle-o fa-3x" style="float: left;color: #444444;"></i>
                    <?php endif; ?>
                  </a>
                  <div class="chat-about">
                    <h6 class="m-b-0"><?= $userFullNameOnLoad ?></h6>
                  </div>
                </div>
              </div>
            </div>

            <div class="chat-history" id="history">
              <ul class="m-b-0">
                <?php

                $chatQuery = mysqli_query(
                  $connect,
                  "SELECT * FROM chat WHERE (sender_id='$userIdOnload' and send_to = '{$_SESSION['attorney_ID']}') or (sender_id='{$_SESSION['attorney_ID']}' and send_to = '$userIdOnload')"
                );
                while ($chat = mysqli_fetch_object($chatQuery)) :

                  if ($chat->sender_id !== $userIdOnload) :
                    $user = mysqli_fetch_object(
                      mysqli_query(
                        $connect,
                        "SELECT * FROM attorney WHERE attorney_ID='{$_SESSION['attorney_ID']}'"
                      )
                    );
                ?>
                    <li class="clearfix">
                      <div class="message-data text-right">
                        <span class="message-data-time">
                          <?= date("h:i A | F d, Y", strtotime($chat->send_time)) ?>
                          <?php if ($user->profile) : ?>
                            <img id="prev_img" src="<?php echo $user->profile ?>" />
                          <?php else : ?>
                            <i class="fa fa-user-circle-o fa-3x"></i>
                          <?php endif; ?>
                        </span>
                        <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar"> -->
                      </div>
                      <div class="message other-message float-right">
                        <?php
                        $decrypt = encrypt_decrypt($chat->content, 'decrypt');
                        if (strpos($decrypt, "media") !== false) {
                        ?>
                          <p>
                            <a href="<?php echo $decrypt ?>" download="<?php echo explode("_", $decrypt)[1] ?>">
                              <?php echo explode("_", $decrypt)[1] ?>
                            </a>
                          </p>
                        <?php
                        } else {
                        ?>
                          <p>
                            <?php echo encrypt_decrypt($chat->content, 'decrypt') ?>
                          </p>
                        <?php
                        }
                        ?>
                      </div>
                    </li>

                  <?php else :
                    $attyInfo = mysqli_fetch_object(
                      mysqli_query(
                        $connect,
                        "SELECT * FROM user WHERE Client_ID='$chat->sender_id'"
                      )
                    );
                  ?>
                    <li class="clearfix">
                      <div class="message-data text-left">
                        <?php if ($attyInfo->profile) : ?>
                          <img id="prev_img" src="<?php echo $attyInfo->profile ?>" />
                        <?php else : ?>
                          <i class="fa fa-user-circle-o fa-3x" style="float: left;"></i>
                        <?php endif; ?>
                        <span class="message-data-time">
                          <?= date("h:i A | F d, Y", strtotime($chat->send_time)) ?>
                        </span>
                      </div>
                      <div class="message my-message">
                        <?php
                        $decrypt = encrypt_decrypt($chat->content, 'decrypt');
                        if (strpos($decrypt, "media") !== false) {
                        ?>
                          <p>
                            <a href="<?php echo $decrypt ?>" download="<?php echo explode("_", $decrypt)[1] ?>">
                              <?php echo explode("_", $decrypt)[1] ?>
                            </a>
                          </p>
                        <?php
                        } else {
                        ?>
                          <p>
                            <?php echo encrypt_decrypt($chat->content, 'decrypt') ?>
                          </p>
                        <?php
                        }
                        ?>
                      </div>
                    </li>

                <?php endif;
                endwhile; ?>
              </ul>
            </div>



          </div>

        </div>

        <div class="chat-message clearfix">
          <div class="type_msg">
            <?php
            if (isset($_GET['chat'])) {
              $chat = $_POST['chat'];
              $attachedFile = $_FILES['attachedFile'];
              $sender = $_SESSION['attorney_ID'];
              $sendTo = $_GET["send_to"];

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
                    mysqli_query($connect, "INSERT chat(sender_id, send_to, content, sender_type) VALUES('$sender', '$sendTo', '$encryptFile', 'atty')");
                  }
                }
                if ($chat != "") {
                  $encryptChat = encrypt_decrypt($_POST['chat'], 'encrypt');
                  mysqli_query($connect, "INSERT chat(sender_id, send_to, content, sender_type) VALUES('$sender', '$sendTo', '$encryptChat', 'atty')");
                }
              }
              echo "<script>
                        window.location.href = 'messages.php?user_id=$sendTo'
                      </script>";
            }
            ?>
            <div class="input_msg_write">
              <form action="?chat&&send_to=<?php echo isset($_GET["user_id"]) ? $_GET["user_id"] : $userIdOnload  ?>" method="POST" enctype="multipart/form-data">
                <div class="attach_file" id="divAttach" style="display: none;">
                  <input type="file" name="attachedFile" id="inputAttachedFile">

                  <button type="button" id="closeAttach">
                    <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                  </button>
                </div>
                <input type="text" class="write_msg" name="chat" placeholder="Type a message" style="padding-left: 15px" />
                <button class="msg_send_btn" type="submit">
                  <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                </button>
                <button class="msg_attach_file" type="button" id="btnAttach">
                  <i class="fa fa-paperclip" aria-hidden="true"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--/.main-->
  <script>
    $(document).ready(function() {
      const divAttach = $("#divAttach")
      const closeAttach = $("#closeAttach")
      const btnAttach = $("#btnAttach")
      const inputAttachedFile = $("#inputAttachedFile")

      $("#history")[0].scrollTop = $("#history")[0].scrollHeight - $("#history").height();
      var lastScrollPos = $("#history")[0].scrollHeight - $("#history").height();

      setInterval(function() {
        $('#history').on('scroll', function() {
          lastScrollPos = this.scrollTop
        });

      }, 1000)
      let count = 0;
      setInterval(function() {
        $("#inbox").load(`${location.href} #inbox`, function() {
          $('#history').scrollTop(lastScrollPos);
        });
        count++
        // console.log(`refreshed! count: ${count}`)
      }, 3000)


      btnAttach.on("click", function() {
        $(this).hide();
        divAttach.show()
      })

      closeAttach.on("click", function() {
        divAttach.hide()
        btnAttach.show()
        inputAttachedFile.val("")
      })
    });
  </script>
</body>

</html>