<?php
session_start();
error_reporting(0);
include('confs/config.php');
if (strlen($_SESSION['detsuid'] == 0)):
  header('location: logout.php');
else:
  if (isset($_POST['submit'])):
    $userid = $_SESSION['detsuid'];
    $cpassword = md5($_POST['currentpassword']);
    $newpassword = md5($_POST['newpassword']);
    $query = mysqli_query($conn, "SELECT id FROM tblusers WHERE id='$userid' and  password='$cpassword'");
    $row = mysqli_fetch_array($query);
    if ($row > 0) {
      mysqli_query($conn, "UPDATE tblusers SET password='$newpassword' WHERE id='$userid'");
      $msg = "Your password successully changed.";
    } else {
      $msg = "Your current password is wrong.";
    }
  endif;
  ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daily Expense Tracker || Change Password</title>
        <!--        <link href="css/bootstrap.min.css" rel="stylesheet">-->
        <!--        <link href="css/font-awesome.min.css" rel="stylesheet">-->
        <link href="css/datepicker3.css" rel="stylesheet">
        <!--        <link href="css/styles.css" rel="stylesheet">-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
              rel="stylesheet"/>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="css/dashboard.css"/>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
              rel="stylesheet">

        <style>
            .center-flex {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .add-changepass-width {
                width: 50%;
            }
            @media screen and (max-width: 768px) {
                .add-changepass-width {
                    width: 90%;
                }
            }
        </style>
    </head>
    <body>
    <div class="d-flex" id="wrapper">
      <?php include('confs/sidebar.php') ?>
        <div id="page-content-wrapper">
          <?php include('confs/header.php') ?>
            <div class="container-fluid px-4 mt-5 center-flex">
                <h4 class="mb-4">Change Password</h4>
              <?php if ($msg): ?>
                  <div class="alert alert-dark" role="alert">
                    <?php echo $msg; ?>
                  </div>
              <?php endif; ?>
                <form role="form" method="post" name="changepassword" onsubmit="return checkpass
                ();" class="add-changepass-width">
                    <div class="mb-3">
                        <label for="currentpassword" class="form-label">Current Password</label>
                        <input type="password" id="currentpassword" name="currentpassword"
                               class="form-control"
                               autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="newpassword" class="form-label">New Password</label>
                        <input type="password" id="newpassword" name="newpassword"
                               class="form-control"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                        <input type="password" id="confirmpassword" name="confirmpassword"
                               class="form-control"
                               required>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-outline-primary" name="submit">Change
                            Password</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
        function checkpass() {
            if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                alert('Confirm Password field does not match to New Password!');
                document.changepassword.confirmpassword.focus();
                return false;
            } else {
                return true;
            }
        }

        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

    </script>
    </body>
    </html>

<?php endif; ?>