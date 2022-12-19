<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['detsuid'] == 0)):
  header('location:logout.php');
else:
  ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daily Expense Tracker || Monthwise Expense Report Details</title>
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
    </head>
    <body>

    <div class="d-flex" id="wrapper">
      <?php include('confs/sidebar.php') ?>
        <div id="page-content-wrapper">
          <?php include('confs/header.php') ?>
            <div class="container-fluid px-4 mt-5">
                <h4 class="mb-4">Monthwise Expense Report Details</h4>
                <p>
                  <?php
                  $fdate = $_POST['fromdate'];
                  $tdate = $_POST['todate'];
                  ?>
                    Expense List From <span><?php echo $fdate; ?></span> To
                    <span><?php echo $tdate; ?></span>
                </p>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Date</th>
                            <th class="text-end">Expense Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $userid = $_SESSION['detsuid'];
                        $result = mysqli_query($conn, "SELECT month(expense_date) AS rptmonth, year(expense_date) AS rptyear, sum(cost) AS totalmonth 
                                    FROM `tblexpenses` WHERE (expense_date BETWEEN '$fdate' AND '$tdate') && (user_id = '$userid') 
                                    GROUP BY month(expense_date), year(expense_date)");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($result)):
                          ?>
                            <tr>
                                <td><?php echo $cnt; ?></td>
                                <td><?php echo $row['rptmonth'] . "-" . $row['rptyear']
                                  ?></td>
                                <td class="text-end"><?php echo $total_expense_list = $row['totalmonth']
                                  ?></td>
                            </tr>
                          <?php
                          $totalsexpense += $total_expense_list;
                          $cnt = $cnt + 1;
                        endwhile;
                        ?>

                        <tr class="table-primary">
                            <th colspan="2" class="text-end">Grand Total</th>
                            <td class="text-end"><?php echo $totalsexpense; ?></td>
                        </tr>


                        </tbody>
                    </table>
                </div>

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