<?php
session_start();

include("connection.php");
include("user_function.php");
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
  <style>
    .card {
      background: #fff;
      transition: .5s;
      border: 0;
      border-radius: .55rem;
      position: relative;
      width: 100%;
      box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
      height: 75vh;
    }

    .chat-app .people-list {
      width: 280px;
      position: absolute;
      left: 0;
      top: 0;
      padding: 20px;
      z-index: 7
    }

    .chat-app .chat {
      margin-left: 280px;
      border-left: 1px solid #eaeaea
    }

    .people-list {
      -moz-transition: .5s;
      -o-transition: .5s;
      -webkit-transition: .5s;
      transition: .5s
    }

    .people-list .chat-list li {
      padding: 10px 15px;
      list-style: none;
      border-radius: 3px
    }

    .people-list .chat-list li:hover {
      background: #efefef;
      cursor: pointer
    }

    .people-list .chat-list li.active {
      background: #efefef
    }

    .people-list .chat-list li .name {
      font-size: 15px
    }

    .people-list .chat-list img {
      border-radius: 50%;
      width: 45px;
      height: 45px;
      border: 1px solid #cbcbcb;
    }

    .people-list img {
      float: left;
      border-radius: 50%
    }

    .people-list .about {
      float: left;
      padding-left: 8px
    }

    .people-list .status {
      color: #999;
      font-size: 13px
    }

    .chat .chat-header {
      padding: 15px 20px;
      border-bottom: 2px solid #f4f7f6
    }

    .chat .chat-header img {
      float: left;
      border-radius: 40px;
      width: 45px;
      height: 45px;
      border: 1px solid #cbcbcb;
    }

    .chat .chat-header .chat-about {
      float: left;
      padding-left: 10px
    }

    .chat .chat-history {
      padding: 20px;
      border-bottom: 2px solid #fff;
      height: 63vh;
      overflow: auto;
    }

    .chat .chat-history ul {
      padding: 0
    }

    .chat .chat-history ul li {
      list-style: none;
      margin-bottom: 30px
    }

    .chat .chat-history ul li:last-child {
      margin-bottom: 0px
    }

    .chat .chat-history .message-data {
      margin-bottom: 15px
    }

    .chat .chat-history .message-data img {
      border-radius: 40px;
      width: 40px;
      border: 1px solid #cbcbcb;
      height: 40px;
    }

    .chat .chat-history .message-data-time {
      color: #434651;
      padding-left: 6px
    }

    .chat .chat-history .message {
      color: #444;
      padding: 18px 20px;
      line-height: 26px;
      font-size: 16px;
      border-radius: 7px;
      display: inline-block;
      position: relative
    }

    .chat .chat-history .message:after {
      bottom: 100%;
      left: 7%;
      border: solid transparent;
      content: " ";
      height: 0;
      width: 0;
      position: absolute;
      pointer-events: none;
      border-bottom-color: #fff;
      border-width: 10px;
      margin-left: -10px
    }

    .chat .chat-history .my-message {
      background: #efefef
    }

    .chat .chat-history .my-message:after {
      bottom: 100%;
      left: 30px;
      border: solid transparent;
      content: " ";
      height: 0;
      width: 0;
      position: absolute;
      pointer-events: none;
      border-bottom-color: #efefef;
      border-width: 10px;
      margin-left: -10px
    }

    .chat .chat-history .other-message {
      background: #e8f1f3;
      text-align: right
    }

    .chat .chat-history .other-message:after {
      border-bottom-color: #e8f1f3;
      left: 75%;
    }

    .chat .chat-message {
      padding: 20px
    }

    .online,
    .offline,
    .me {
      margin-right: 2px;
      font-size: 8px;
      vertical-align: middle
    }

    .online {
      color: #86c541
    }

    .offline {
      color: #e47297
    }

    .me {
      color: #1d8ecd
    }

    .float-right {
      float: right
    }

    .clearfix:after {
      visibility: hidden;
      display: block;
      font-size: 0;
      content: " ";
      clear: both;
      height: 0
    }

    @media only screen and (max-width: 767px) {
      .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
      }

      .chat-app .people-list.open {
        left: 0
      }

      .chat-app .chat {
        margin: 0
      }

      .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
      }

      .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
      }
    }

    @media only screen and (min-width: 768px) and (max-width: 992px) {
      .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
      }

      .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
      }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
      .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
      }

      .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
      }
    }
  </style>

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
        <a class="navbar-brand" href="#"><strong><span style="color: #14759e;">O</span></strong>PASS&emsp;&emsp;&emsp;&emsp;</a>

      </div>
    </div><!-- /.container-fluid -->
  </nav>
  <!--navigation-->

  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
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
      </div>
      <div class="profile-usertitle">
        <div class="profile-usertitle-name"><?php echo $user_data['Username']; ?></div>
        <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form>
      <div class="form-group">
        <a href="user_search.php" style=""><input type="sumbit" value="Search" class="btn btn-primary"></a>
      </div>
    </form>
    <ul class="nav menu">
      <li><a href="user_index.php"><em class="fa fa-home">&nbsp;</em> Home</a></li>
      <li class="active"><a href="user_inbox.php"><em class="fa fa-envelope">&nbsp;</em> Inbox</a></li>
      <li><a href="user_attorney.php"><em class="fa fa-black-tie">&nbsp;</em> Attorney</a></li>
      <li><a href="user_booking.php"><em class="fa fa-calendar">&nbsp;</em> Book Appointment</a></li>
      <li><a href="user_logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
  </div>
  <!--/.sidebar-->

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header" style="color: #14759e;margin: 0">Inbox</h1>
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
                "SELECT * FROM chat WHERE (send_to = {$_SESSION['Client_ID']} or sender_id = {$_SESSION['Client_ID']}) and sender_type='atty' GROUP BY send_to, sender_id"
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
                      "SELECT * FROM attorney WHERE attorney_ID={$peoples[$i]['sender_id']}"
                    )
                  );
                  if (isset($_GET["user_id"])) {
                    if ($_GET["user_id"] == $peoples[$i]['sender_id']) {
                      $userFullNameOnLoad = ucwords("Atty. $user->firstname $user->lastname");
                      $userIdOnload = $user->attorney_ID;
                      if ($user->profile) {
                        $previewImg = $user->profile;
                      }
                    }
                  } else if ($i === 0 && !isset($_GET["user_id"])) {
                    $userFullNameOnLoad = ucwords("Atty. $user->firstname $user->lastname");
                    $userIdOnload = $user->attorney_ID;
                    if ($user->profile) {
                      $previewImg = $user->profile;
                    }
                  }

              ?>
                  <!-- Active -->
                  <a href="?user_id=<?= $user->attorney_ID ?>" style="color:#444444">
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
                          echo ucwords("Atty. $user->lastname");
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
                  "SELECT * FROM chat WHERE (sender_id='$userIdOnload' and send_to = '{$_SESSION['Client_ID']}') or (sender_id='{$_SESSION['Client_ID']}' and send_to = '$userIdOnload')"
                );
                while ($chat = mysqli_fetch_object($chatQuery)) :

                  if ($chat->sender_id !== $userIdOnload) :
                    $user = mysqli_fetch_object(
                      mysqli_query(
                        $connect,
                        "SELECT * FROM user WHERE Client_ID='{$_SESSION['Client_ID']}'"
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
                        "SELECT * FROM attorney WHERE attorney_ID='$chat->sender_id'"
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
              $sender = $_SESSION['Client_ID'];
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
                    mysqli_query($connect, "INSERT chat(sender_id, send_to, content, sender_type) VALUES('$sender', '$sendTo', '$encryptFile', 'user')");
                  }
                }
                if ($chat != "") {
                  $encryptChat = encrypt_decrypt($_POST['chat'], 'encrypt');
                  mysqli_query($connect, "INSERT chat(sender_id, send_to, content, sender_type) VALUES('$sender', '$sendTo', '$encryptChat', 'user')");
                }
              }
              echo "<script>
                        window.location.href = 'user_inbox.php?user_id=$sendTo'
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