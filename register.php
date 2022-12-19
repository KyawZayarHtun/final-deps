<?php

session_start();
error_reporting(0);
include('confs/config.php');

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mbno = $_POST['phone'];
  $password = md5($_POST['password']);

  $ret = mysqli_query($conn, "SELECT email from tblusers WHERE email = '$email'");
  $result = mysqli_fetch_array($ret);
  if ($result > 0) {
    $msg = "This e-mail is associated with another account";
  } else {
    $sql = mysqli_query($conn, "INSERT INTO tblusers (name, email, mobile_number, password) VALUES ('$name', '$email', '$mbno', '$password')");
    if ($sql) {
      $msg = "You have successfully registered";
      header('Location: http://localhost/deps/index.php');
    } else {
      $msg = "Something went wrong. Please try again!";
    }

  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Expense Tracker - Registeration</title>
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">-->

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
            width: 700px !important;
        }

        img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: top left;
        }

        .login-background {
            background-image: url("assets/mesh-456.png");
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
<div class="row justify-content-center">
    <div class="col-md-10 login">
        <h1 class="text-center mb-4 mt-5 mt-md-0">Register</h1>
        <div>
            <form role="form" method="post" name="register" onsubmit="return checkpass();">
                <p style="font-size: 16px; color: red;">
                  <?php if($msg) echo $msg;  ?>
                </p>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control"
                           placeholder="Your Name" autofocus required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                           placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control"
                           placeholder="Your Phone" required>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" id="password" name="password" class="form-control"
                               placeholder="Enter Password" autofocus required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="r-password" class="form-label">Confirm Your New Password</label>
                        <input type="password" id="r-password" name="repeatpassword"
                               class="form-control"
                               placeholder="Repeat your password" required>
                    </div>
                </div>
                <div class="center-flex">
                    <button type="submit" class="btn btn-dark w-md-25 w-100 mt-4 mb-3"
                            name="submit">Register
                    </button>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="index.php" class="text-dark">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function checkpass() {
        if (document.register.password.value != document.register.repeatpassword.value) {
            alert('Repeat password field does not match to password!');
            document.register.repeatpassword.focus();
            return false;
        } else return true;
    }
</script>
</body>
</html>
