<?php
session_start();
error_reporting(0);
include('confs/config.php');

if (strlen($_SESSION['detsuid'] == 0)):
  header('location:logout.php');
else:
  if (isset($_POST['submit'])) {
    $userid = $_SESSION['detsuid'];
    $name = $_POST['Name'];
    $mbno = $_POST['contactnumber'];
    $query = mysqli_query($conn, "UPDATE tblusers SET name = '$name', mobile_number = '$mbno' WHERE id = '$userid'");
    if ($query) {
      $msg = "User Profile has been updated.";
    } else {
      $msg = "Something Went Wrong. Please try again.";
    }
  }

  ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daily Expense Tracker || User Profile</title>
        <!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->
        <!--	<link href="css/font-awesome.min.css" rel="stylesheet">-->
        <link href="css/datepicker3.css" rel="stylesheet">
        <!--    <link href="css/styles.css" rel="stylesheet">-->
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

            .add-profile-width {
                width: 50%;
            }

            @media screen and (max-width: 768px) {
                .add-profile-width {
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
                <h4 class="mb-4">Add Expense</h4>
              <?php if ($msg): ?>
                  <div class="alert alert-dark" role="alert">
                    <?php echo $msg; ?>
                  </div>
              <?php endif; ?>
              <?php
              $userid = $_SESSION['detsuid'];
              $result = mysqli_query($conn, "SELECT * FROM tblusers WHERE id = '$userid'");
              while ($row = mysqli_fetch_array($result)):
                ?>
                  <form role="form" method="post" class="add-profile-width">

                      <div class="mb-3">
                          <label for="Name" class="form-label">Name</label>
                          <input type="text" id="Name" name="Name"
                                 value="<?php echo $row['name']; ?>"
                                 class="form-control"
                                 required>
                      </div>
                      <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" id="email" name="email"
                                 value="<?php echo $row['email']; ?>"
                                 class="form-control"
                                 readonly>
                      </div>
                      <div class="mb-3">
                          <label for="contactnumber" class="form-label">Phone Number</label>
                          <input type="number" id="contactnumber" name="contactnumber"
                                 value="<?php echo $row['mobile_number']; ?>"
                                 class="form-control"
                                 required>
                      </div>
                      <div class="mb-3">
                          <label for="regdate" class="form-label">Registration Date</label>
                          <input type="text" id="regdate" name="regdate"
                                 value="<?php echo $row['reg_date']; ?>"
                                 class="form-control"
                                 readonly>
                      </div>
                      <div class="">
                          <button type="submit" class="btn btn-outline-primary"
                                  name="submit">Update Profile
                          </button>
                      </div>


                  </form>
              <?php endwhile; ?>
            </div>
        </div>
    </div>


    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>

    </body>
    </html>

<?php endif; ?>