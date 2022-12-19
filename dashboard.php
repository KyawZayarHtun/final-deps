<?php

session_start();
error_reporting(0);
include('confs/config.php');
$user = $_SESSION['detsuid'];
$curYear = date('Y');
$december = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 12 && year(expense_date) = $curYear && user_id='$user'");
$res = mysqli_fetch_array($december);
$dec = $res['decexpense'];
$november = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 11 && year(expense_date) = $curYear && user_id='$user'");
$res1 = mysqli_fetch_array($november);
$nov = $res1['decexpense'];
$october = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 10 && year(expense_date) = $curYear && user_id='$user'");
$res4 = mysqli_fetch_array($october);
$oct = $res4['decexpense'];
$septmber = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 9 && year(expense_date) = $curYear && user_id='$user'");
$res3 = mysqli_fetch_array($septmber);
$sep = $res3['decexpense'];
$august = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 8 && year(expense_date) = $curYear && user_id='$user'");
$res2 = mysqli_fetch_array($august);
$aug = $res2['decexpense'];
$july = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 7 && year(expense_date) = $curYear && user_id='$user'");
$res5 = mysqli_fetch_array($july);
$jul = $res5['decexpense'];
$june = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 6 && year(expense_date) = $curYear && user_id='$user'");
$res6 = mysqli_fetch_array($june);
$jun = $res6['decexpense'];
$may = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 5 && year(expense_date) = $curYear && user_id='$user'");
$res7 = mysqli_fetch_array($may);
$m = $res7['decexpense'];
$april = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 4 && year(expense_date) = $curYear && user_id='$user'");
$res8 = mysqli_fetch_array($april);
$apr = $res8['decexpense'];
$march = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 3 && year(expense_date) = $curYear && user_id='$user'");
$res9 = mysqli_fetch_array($march);
$mar = $res9['decexpense'];
$febu = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 2 && year(expense_date) = $curYear && user_id='$user'");
$res10 = mysqli_fetch_array($febu);
$feb = $res10['decexpense'];
$janu = mysqli_query($conn, "SELECT sum(cost) AS decexpense FROM tblexpenses WHERE month(expense_date) = 1 && year(expense_date) = $curYear && user_id='$user'");
$res11 = mysqli_fetch_array($janu);
$jan = $res11['decexpense'];
$dataPoints = array(
  array("y" => $jan, "label" => "January"),
  array("y" => $feb, "label" => "February"),
  array("y" => $mar, "label" => "March"),
  array("y" => $apr, "label" => "April"),
  array("y" => $m, "label" => "May"),
  array("y" => $jun, "label" => "June"),
  array("y" => $jul, "label" => "July"),
  array("y" => $aug, "label" => "August"),
  array("y" => $sep, "label" => "September"),
  array("y" => $oct, "label" => "October"),
  array("y" => $nov, "label" => "November"),
  array("y" => $dec, "label" => "December"),
);
if (strlen($_SESSION['detsuid'] == 0)):
  header("location: logout.php");
else:

  ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daily Expense Tracker - Dashboard</title>
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
            .card-height-cus {
                height: 160px;
            }
        </style>

    </head>
    <body>

    <div class="d-flex" id="wrapper">
      <?php include('confs/sidebar.php') ?>
        <div id="page-content-wrapper position-relative">
          <?php include('confs/header.php')
          ?>
            <div class="container-fluid px-4">
                <div class="row g-3 mt-2 mb-5">
                    <div class="col-md-3">
                        <div class="card-height-cus p-3 bg-white shadow-sm d-flex
                        justify-content-around
                        align-items-center rounded">
                            <div>
                              <?php
                              #Today's Expense
                              $userid = $_SESSION['detsuid'];
                              $tdate = date('Y-m-d');
                              $query = mysqli_query($conn, "SELECT sum(cost) AS todayexpense FROM tblexpenses WHERE expense_date='$tdate' && user_id='$userid'");
                              $result = mysqli_fetch_array($query);
                              $sum_today_expense = $result['todayexpense'];
                              ?>
                                <h3 class="fs-2">
                                  <?php if ($sum_today_expense == "") {
                                    echo "0";
                                  } else {
                                    echo $sum_today_expense;
                                  }
                                  ?>
                                </h3>
                                <p class="fs-5">Today's Expense</p>
                            </div>
                            <i class="fas fa-dollar-sign fs-1 primary-text p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-height-cus p-3 bg-white shadow-sm d-flex
                        justify-content-around
                        align-items-center rounded">
                            <div>
                              <?php
                              #Yesterday's Expense
                              $userid = $_SESSION['detsuid'];
                              $ydate = date('Y-m-d', strtotime("-1 days"));
                              $query1 = mysqli_query($conn, "SELECT sum(cost)  AS yesterdayexpense FROM tblexpenses WHERE expense_date='$ydate' && user_id='$userid'");
                              $result1 = mysqli_fetch_array($query1);
                              $sum_yesterday_expense = $result1['yesterdayexpense'];
                              ?>

                                <h3 class="fs-2">
                                  <?php if ($sum_yesterday_expense == "") {
                                    echo "0";
                                  } else {
                                    echo $sum_yesterday_expense;
                                  }
                                  ?>
                                </h3>
                                <p class="fs-5">Yesterday's Expense</p>
                            </div>
                            <i class="fas fa-hand-holding-usd fs-1 primary-text p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-height-cus p-3 bg-white shadow-sm d-flex
                        justify-content-around
                        align-items-center rounded">
                            <div>
                              <?php
                              #Weekly Expense
                              $userid = $_SESSION['detsuid'];
                              $pastdate = date("Y-m-d", strtotime("-1 week"));
                              $crrntdte = date("Y-m-d");
                              $query2 = mysqli_query($conn, "SELECT sum(cost) AS weeklyexpense FROM tblexpenses WHERE (expense_date BETWEEN '$pastdate' AND '$crrntdte') && user_id='$userid'");
                              $result2 = mysqli_fetch_array($query2);
                              $sum_weekly_expense = $result2['weeklyexpense'];
                              ?>

                                <h3 class="fs-2">
                                  <?php if ($sum_weekly_expense == "") {
                                    echo "0";
                                  } else {
                                    echo $sum_weekly_expense;
                                  }
                                  ?>

                                </h3>
                                <p class="fs-5">Last 7day's Expense</p>
                            </div>
                            <i class="fas fa-dollar-sign fs-1 primary-text p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-height-cus p-3 bg-white shadow-sm d-flex
                        justify-content-around
                        align-items-center rounded">
                            <div>
                              <?php
                              #Monthly Expense
                              $userid = $_SESSION['detsuid'];
                              $monthdate = date("Y-m-d", strtotime("-1 month"));
                              $crrntdte = date("Y-m-d");
                              $query3 = mysqli_query($conn, "SELECT sum(cost) AS monthlyexpense FROM tblexpenses WHERE (expense_date BETWEEN '$monthdate' AND '$crrntdte') && user_id='$userid'");
                              $result3 = mysqli_fetch_array($query3);
                              $sum_monthly_expense = $result3['monthlyexpense'];
                              ?>

                                <h3 class="fs-2">
                                  <?php if ($sum_monthly_expense == "") {
                                    echo "0";
                                  } else {
                                    echo $sum_monthly_expense;
                                  }
                                  ?>

                                </h3>
                                <p class="fs-5">Monthly Expenses</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text p-3"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-height-cus p-3 bg-white shadow-sm d-flex
                        justify-content-around
                        align-items-center rounded">
                            <div>
                              <?php
                              #Yearly Expense
                              $userid = $_SESSION['detsuid'];
                              $cyear = date("Y");
                              $query4 = mysqli_query($conn, "SELECT sum(cost) AS yearlyexpense FROM tblexpenses WHERE year(expense_date)='$cyear' && user_id='$userid'");
                              $result4 = mysqli_fetch_array($query4);
                              $sum_yearly_expense = $result4['yearlyexpense'];
                              ?>

                                <h3 class="fs-2">
                                  <?php if ($sum_yearly_expense == "") {
                                    echo "0";
                                  } else {
                                    echo $sum_yearly_expense;
                                  }
                                  ?>

                                </h3>
                                <p class="fs-5">Current Year Expenses</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text p-3"></i>
                        </div>
                    </div>
                    <div class="col-md-3 mb-5">
                        <div class="card-height-cus p-3 bg-white shadow-sm d-flex
                        justify-content-around
                        align-items-center rounded">
                            <div>
                              <?php
                              #Total Expense
                              $userid = $_SESSION['detsuid'];
                              $query5 = mysqli_query($conn, "SELECT sum(cost) AS totalexpense FROM tblexpenses WHERE user_id='$userid'");
                              $result5 = mysqli_fetch_array($query5);
                              $sum_total_expense = $result5['totalexpense'];
                              ?>

                                <h3 class="fs-2">
                                  <?php if ($sum_total_expense == "") {
                                    echo "0";
                                  } else {
                                    echo $sum_total_expense;
                                  }
                                  ?>

                                </h3>
                                <p class="fs-5">Total Expenses</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text p-3"></i>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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

        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "dark2",
                title: {
                    text: "Expenses In This Year"
                },
                axisY: {
                    title: "Expense (MMK)"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## MMK",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
    </body>
    </html>

<?php endif; ?>