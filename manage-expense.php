<?php
session_start();
error_reporting(0);
include('confs/config.php');
if (strlen($_SESSION['detsuid'] == 0)):
  header('location: logout.php');
else:
  if (isset($_GET['delid'])) {
    $rowid = intval($_GET['delid']);
    $query = mysqli_query($conn, "DELETE FROM tblexpenses WHERE id = '$rowid'");
    if ($query) {
      // echo "<script>alert('Record successfully deleted.');</script>";
      // echo "<script>window.location.href='manage-expense.php'</script>";
      // header('location:manage-expense.php');
      $msg = "A record deleted.";
    } else {
      $msg = "Something went wrong. Please try again!";
      // echo "<script>alert('Something went wrong. Please try again!');</script>";
    }
  }
  ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daily Expense Tracker || Manage Expense</title>
        <!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->
        <!--	  <link href="css/font-awesome.min.css" rel="stylesheet">-->
        <link href="css/datepicker3.css" rel="stylesheet">
        <!--    <link href="css/styles.css" rel="stylesheet">-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
              rel="stylesheet"/>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="css/dashboard.css"/>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
              rel="stylesheet">
    </head>
    <body>
    <div class="d-flex" id="wrapper">
      <?php include('confs/sidebar.php') ?>
        <div id="page-content-wrapper">
          <?php include('confs/header.php') ?>
            <div class="container-fluid px-4 mt-5">
                <h4 class="mb-4">All Expense</h4>
              <?php if ($msg): ?>
                  <div class="alert alert-dark" role="alert">
                    <?php echo $msg; ?>
                  </div>
              <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-dark table-hover">
                        <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Category Name</th>
                            <th>Expense Item</th>
                            <th>Expense Cost</th>
                            <th>Expense Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                      <?php
                      $userid=$_SESSION['detsuid'];
                      $ret=mysqli_query($conn,"SELECT * FROM tblexpenses WHERE user_id='$userid'");
                      $cnt=1;
                      while ($row=mysqli_fetch_array($ret)):
                      ?>
                        <tbody>
                        <tr>
                            <td><?php echo $cnt;?></td>
                            <td><?php  echo $row['category_name'];?></td>
                            <td><?php  echo $row['expense_item'];?></td>
                            <td><?php  echo $row['cost'];?></td>
                            <td><?php  echo $row['expense_date'];?></td>
                            <td><a href="manage-expense.php?delid=<?php echo $row['id'];?>">Delete</a>
                        </tr>
                        <?php
                        $cnt=$cnt+1;
                        endwhile;
                        ?>
                        </tbody>

                    </table>
                </div>
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
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    </body>
    </html>

<?php endif; ?>