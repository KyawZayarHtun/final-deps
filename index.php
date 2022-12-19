<?php
session_start();
error_reporting(0);
include('confs/config.php');

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $sql = mysqli_query($conn, "SELECT id FROM tblusers WHERE email = '$email' && password = '$password'");
  $result = mysqli_fetch_array($sql);
  if ($result > 0) {
    $_SESSION['detsuid'] = $result['id'];
    header("location: dashboard.php");
  } else {
    $msg = "Invalid Details";
  }
}

if(isset($_POST['submit'])):
  $contactno = $_POST['contactno'];
  $email = $_POST['email'];
  $query = mysqli_query($conn, "SELECT id FROM tblusers WHERE email='$email' && mobile_number='$contactno'");
  $ret = mysqli_fetch_array($query);
  if($ret > 0) {
    $_SESSION['contactno'] = $contactno;
    $_SESSION['email'] = $email;
    header('location:reset-password.php');
  }else {
    $msg = "Invalid Details. Please try again.";
  }
endif;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Expense Tracker - Login</title>
    <!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->
<!--    <link href="css/datepicker3.css" rel="stylesheet">-->
    <!--	<link href="css/styles.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>

    <style>
        p {
            font-size: 16px !important;
        }
        .login {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(3.3px);
            -webkit-backdrop-filter: blur(3.3px);
            /*border: 1px solid rgba(255, 255, 255, 1);*/
            padding-inline: 30px;
            padding-block: 40px;
            width: 500px !important;
        }

        img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: top left;
        }

        .login-background {
            background-image: url("assets/mesh-527.png");
            /*background-repeat: no-repeat;*/
            background-size: cover;
        }

        .center-flex {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body {
            overflow-x: hidden;
        }
        
        @media screen and (max-width: 768px) {
            .login {
                width: 100% !important;
            }
        }

    </style>

</head>
<body class="login-background vh-100 vw-100 center-flex">
<!--<div class="row">
    <h2 align="center">Daily Expense Tracker</h2>
    <hr>
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <form role="form" method="post" name="login">
                    <p style="font-size: 16px; color: red;" align="center">
                      <?php /*if ($msg) echo $msg; */?>
                    </p>
                    <fieldset>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control"
                                   placeholder="E-mail" autofocus required>
                        </div>
                        <a href="forgot-password.php">Forgot Password?</a>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control"
                                   placeholder="Password" required>
                        </div>
                        <div class="form-group">
                             <input type="submit" class="btn btn-primary" name="login" value="Login">
                            <button type="submit" class="btn btn-primary" name="login">Login
                            </button>
                            <div class="pull-right">
    <span><a href="register.php"
             class="btn btn-primary">Register</a></span>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
--><br>

<div class="row justify-content-center">
    <div class="col-md-6 login">
        <h1 class="text-center mb-4">Welcome</h1>
        <div>
            <form role="form" method="post" name="login">
                <p style="font-size: 16px; color: red;" class="text-center">
                  <?php if ($msg) echo $msg; ?>
                </p>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                           placeholder="E-mail" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="Password" required>
                </div>
                <div class="center-flex">
                    <button type="submit" class="btn btn-dark w-md-25 w-100 mt-4 mb-3"
                            name="login">Login
                    </button>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="forgot-password.php" class="text-dark" data-bs-toggle="modal" data-bs-target="#myModal">Forgot Password?</a>
                    <a href="register.php" class="text-dark">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form role="form" method="post">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Forget Password</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p style="font-size:16px; color:red"> <?php /*if($msg)
                  {echo $msg;} */?> </p>
                <div class="mb-3">
                    <label for="f-email" class="form-label">Email</label>
                    <input type="email" id="f-email" name="email" class="form-control"
                           placeholder="Email" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="f-phone" class="form-label">Phone</label>
                    <input type="number" id="f-phone" name="contactno" class="form-control"
                           placeholder="Phone" required>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-danger">Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>



<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>