<?php

include("connection.php");
include("user_function.php");
include("user_process.php");
include("user_cancel.php");
$user_data = check_login($connect);
?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OPASS-HOME</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/msg.css" rel="stylesheet">
</head>

<body>

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
        <a href="user_search.php"><input type="sumbit" value="Search" class="btn btn-primary"></a>
      </div>
    </form>
    <ul class="nav menu">
      <li class="active"><a href="user_index.php"><em class="fa fa-home">&nbsp;</em> Home</a></li>
      <li><a href="user_inbox.php"><em class="fa fa-envelope">&nbsp;</em> Inbox</a></li>
      <li><a href="user_attorney.php"><em class="fa fa-black-tie">&nbsp;</em> Attorney</a></li>
      <li><a href="user_booking.php"><em class="fa fa-calendar">&nbsp;</em> Book Appointment</a></li>
      <li><a href="user_logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
  </div>
  <!--/.sidebar-->

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="user_index.php">
            <em class="fa fa-home"></em>
          </a></li>
        <li class="active">Home</li>
      </ol>
    </div>
    <!--/.row-->
    <br><br>
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-blue" style="box-shadow: 0 7px 15px 0 #a8a6a6">
        <div class="panel-heading dark-overlay">WELCOME CLIENT!</div>
        <div class="panel-body">
          <p>What's your plan for <strong> Today? </strong> </p>
          <a href="user_booking.php" style="color: white;"><em class="fa fa-calendar"></em> Book Appointment</a><br>
          <a href="user_inbox.php" style="color: white;"><em class="fa fa-envelope"></em> Check Inbox</a>
        </div>
      </div>
    </div>
    <!--/.col-->

    <?php
    if (mysqli_num_rows($query)) {
    ?>
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default" style="box-shadow: 0 7px 15px 0#a8a6a6">
          <div class="panel-heading dark-overlay" style="color:#14759e;">Our Attorneys!</div>
          <div class="panel-body">

            <?php while ($rows = mysqli_fetch_assoc($query)) {
            ?>
              <div class="panel-body col-md-4">
                <div class="panel panel-blue" style="box-shadow: 0 7px 15px 0 grey">
                  <div class="panel-heading dark-overlay">
                    <p style=" color:#14759e; font-size: 18px;"> Atty.<?php echo $rows['firstname']; ?>&nbsp;<?php echo $rows['lastname']; ?></p>
                  </div>
                  <div class="panel-body">
                    <strong style="color:#14759e; ">Specializes in: </strong>
                    <p style="color: white;"> <?php echo $rows['Specialization_name']; ?></p>
                    <p style="color: white;"><?php ?> Age: <?php echo $rows['age']; ?></p>
                    <a style="border: none; color: #14759e; box-shadow: 0 1px 4px 0 grey;" class='btn btn-primary' id='book' href="user_booking.php?bookatt=<?php echo $rows['attorney_ID']; ?>">Book Appointment</a>
                    <a style="border: none; color: #14759e; box-shadow: 0 1px 4px 0 grey;" class='btn btn-primary' id='book' href="user_attorney_details.php?details=<?php echo $rows['attorney_ID']; ?>">More</a>
                  </div>
                </div>
              </div>

            <?php }  ?>
            <div class="col-md-3 col-md-offset-5"><a href="user_attorney.php"><em class="fa fa-ellipsis-h fa-2x" id="seemoreicon"></em></a></div>
          </div>
        </div>
      </div>
      <!--/.col-->
    <?php } ?>


    <div class="col-md-10 col-md-offset-1">
      <h3 style="color:  #14759e;">Your Appointments</h3><br>
    </div>
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default" style="box-shadow: 0 7px 15px 0 grey">
        <div class="panel-body tabs">
          <ul class="nav nav-pills">
            <li class="active"><a href="#pilltab1" data-toggle="tab">Pending</a></li>
            <li><a href="#pilltab2" data-toggle="tab">Cancelled</a></li>
            <li><a href="#pilltab3" data-toggle="tab">Accepted</a></li>
          </ul>


          <div class="tab-content">
            <div class="tab-pane fade in active" id="pilltab1">
              <a href="#" style="text-decoration: none;">
                <h4 style="color: orange;">&nbsp;&nbsp;Pending</h4>
              </a>


              <?php

              if (mysqli_num_rows($query2)) {
              ?>
                <div class=" table-responsive">
                  <?php
                  while ($rows = mysqli_fetch_assoc($query2)) { ?>
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="color:#30a5ff; font-size: 14px;" class="col-md-3">Booked Appointment To</th>
                          <th style="color:#30a5ff;font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;Your Request</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tr>
                        <td>
                          <p style="font-size: 12px; color:  #14759e;" class="col-md-12 col-sm-4"><?php echo $rows['firstname']; ?>&nbsp;&nbsp; <?php echo $rows['lastname']; ?></p>
                        </td>
                        <td>
                          <p style="font-size: 11px; color:  #14759e;" class="col-md-11 col-sm-4"><?php echo $rows['request_name']; ?></p>
                        </td>
                        <td>
                          <p style="font-size: 12px;  color: #14759e;" class="col-md-12 col-sm-4"><?php echo date('M d, Y h:i A', strtotime($rows['date_created'])); ?></p>
                        </td>
                      </tr>
                    </table>

                  <?php
                  }
                  ?>
                </div>
              <?php } ?>

            </div>

            <div class="tab-pane fade" id="pilltab2">
              <a href="#" style="text-decoration: none;">
                <h4 style="color: red;">&nbsp;&nbsp;Cancelled</h4>
              </a>


              <?php

              if (mysqli_num_rows($query1)) {
              ?>
                <div class="table-responsive">
                  <?php
                  while ($rows = mysqli_fetch_assoc($query1)) { ?>
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="color:#30a5ff; font-size: 14px;" class="col-md-3">Booked Appointment To</th>
                          <th style="color:#30a5ff;font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;Reason for Cancelllation</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tr>
                        <td>
                          <p style="font-size: 12px; color:  #14759e;" class="col-md-12 col-sm-4"><?php echo $rows['firstname']; ?>&nbsp;&nbsp; <?php echo $rows['lastname']; ?></p>
                        </td>

                        <td>
                          <p style="font-size: 11px; color:  #14759e;" class="col-md-11 col-sm-4"><?php echo $rows['Cancellation_reason']; ?></p>
                        </td>
                        <td>
                          <p style="font-size: 12px;  color: #14759e;" class="col-md-12 col-sm-4"><?php echo $rows['date_created']; ?></p>
                        </td>
                      </tr>
                    </table>

                  <?php
                  }
                  ?>
                </div>
              <?php } ?>

            </div>


            <div class="tab-pane fade" id="pilltab3">
              <a href="#" style="text-decoration: none;">
                <h4 style="color: green;">Accepted</h4>
              </a>

              <?php
              if (mysqli_num_rows($query3)) {
              ?>
                <div class=" table-responsive">
                  <?php
                  while ($rows = mysqli_fetch_assoc($query3)) { ?>
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="color:#30a5ff; font-size: 14px;" class="col-md-3">Booked Appointment To</th>
                          <th></th>
                          <th style="color:#30a5ff; font-size: 14px;">Mark as Done to End Appointment</th>
                        </tr>
                      </thead>
                      <tr>
                        <td>
                          <p style="font-size: 12px; color:  #14759e;" class="col-md-12 col-sm-4">Atty.&nbsp;<?php echo $rows['firstname']; ?>&nbsp;&nbsp; <?php echo $rows['lastname']; ?></p>
                        </td>
                        <td>
                          <p p style="font-size: 12px; color:  #14759e;">Your Appointment with the attorney was Approved!</p>
                        </td>
                        <td>
                          <a class="btn btn-primary" href="user_track_appointment.php?track=<?php echo $rows['Request_ID']; ?>">
                            Done
                          </a>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#chat<?php echo $rows['attorney_ID'] ?>">
                            Chat
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="chat<?php echo $rows['attorney_ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body" style="height: 120px; position: relative">
                                  <div class="type_msg" style=" position: absolute; bottom: 0; width: 93%">
                                    <div class="input_msg_write">
                                      <form action="clientChat.php" method="POST" enctype="multipart/form-data">
                                        <input type="text" name="sendTo" value="<?php echo $rows['attorney_ID'] ?>" readonly hidden>
                                        <div class="attach_file" id="divAttach<?php echo $rows['attorney_ID'] ?>" style="display: none;">
                                          <input type="file" name="attachedFile" id="inputAttachedFile<?php echo $rows['attorney_ID'] ?>">
                                          <button type="button" id="closeAttach<?php echo $rows['attorney_ID'] ?>">
                                            <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                                          </button>
                                        </div>
                                        <textarea style="width: 100%;" class="write_msg" name="chat" placeholder="Type a message"></textarea>
                                        <button type="submit" class="msg_send_btn">
                                          <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                        </button>
                                        <button class="msg_attach_file" type="button" id="btnAttach<?php echo $rows['attorney_ID'] ?>">
                                          <i class="fa fa-paperclip" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <script>
                            $("#btnAttach<?php echo $rows['attorney_ID'] ?>").on("click", function() {
                              $(this).hide();
                              $("#divAttach<?php echo $rows['attorney_ID'] ?>").show()
                            })

                            $("#closeAttach<?php echo $rows['attorney_ID'] ?>").on("click", function() {
                              $("#divAttach<?php echo $rows['attorney_ID'] ?>").hide()
                              $("#btnAttach<?php echo $rows['attorney_ID'] ?>").show()
                              $("#inputAttachedFile<?php echo $rows['attorney_ID'] ?>").val("")
                            })
                          </script>
                        </td>
                      </tr>
                    </table>

                <?php
                  }
                }
                ?>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!--/.panel-->
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default" style="box-shadow: 0 7px 15px 0#a8a6a6">
          <div class="panel-heading dark-overlay" style="color:#14759e;">Done Appointments!</div>
          <?php

          if (mysqli_num_rows($query4)) {
          ?>
            <div class=" table-responsive">
              <?php
              while ($rows = mysqli_fetch_assoc($query4)) { ?>
                <table class="table">
                  <thead>
                    <tr>
                      <th style="color:#30a5ff; font-size: 14px;" class="col-md-3">Booked Appointment To</th>
                      <th></th>
                      <th style="color:#30a5ff; font-size: 14px;">Appointment Done</th>
                    </tr>
                  </thead>
                  <tr>
                    <td>
                      <p style="font-size: 12px; color:  #14759e;" class="col-md-12 col-sm-4">Atty.&nbsp;<?php echo $rows['firstname']; ?>&nbsp;&nbsp; <?php echo $rows['lastname']; ?></p>
                    </td>
                    <td>
                      <p p style="font-size: 12px; color:  #14759e;">Your Appointment with the attorney Ended!</p>
                    </td>
                    <td><a href="user_track_appointment.php?track=<?php echo $rows['Request_ID']; ?>""><p style=" font-size: 12px; color: #14759e;" class="col-md-12 col-sm-4"><input type="btn" name="btnbtn" value="Done" class="btn btn-primary" disabled=""></p></a></td>
                  </tr>
                </table>

              <?php
              }
              ?>
            </div>
          <?php } ?>
        </div>
      </div>
      <!--/.col-->
    </div><!-- /.col-->
  </div>
  <!--/.col-->
  </div>
  <!--/.main-->

</body>

</html>