<?php
session_start();
error_reporting(0);
include('config.php');
$uid = $_SESSION['detsuid'];
$sql = mysqli_query($conn, "SELECT name FROM tblusers WHERE id = '$uid'");
$result = mysqli_fetch_array($sql);
$name = $result['name'];
?>

<!--<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <?php
/*                $uid = $_SESSION['detsuid'];
                $sql = mysqli_query($conn, "SELECT name FROM tblusers WHERE id = '$uid'");
                $result = mysqli_fetch_array($sql);
                $name = $result['name'];
            */?>
            <div class="profile-usertitle-name"><?php /*echo $name; */?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="divider"></div>
    <ul class="nav menu">

        <li class="active"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em>Dashboard</a></li>

        <li class="parent">
            <a href="#sub-item-1" data-toggle="collapse">
                <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>

            <ul class="children collapse" id="sub-item-1">
                <li><a href="add-expense.php"><span class="fa fa-arrow-right">&nbsp;</span>Add Expenses</a></li>
                <li><a href="manage-expense.php"><span class="fa fa-arrow-right">&nbsp;</span>Manage Expenses</a></li>
            </ul>

        </li>

        <li class="parent">
            <a href="#sub-item-2" data-toggle="collapse">
                <em class="fa fa-navicon">&nbsp;</em>Expense Report <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>

            <ul class="children collapse" id="sub-item-2">
                <li><a href="expense-daywise-report.php"><span class="fa fa-arrow-right">&nbsp;</span>Daywise Expenses</a></li>
                <li><a href="expense-monthwise-report.php"><span class="fa fa-arrow-right">&nbsp;</span>Monthwise Expenses</a></li>
                <li><a href="expense-yearwise-report.php"><span class="fa fa-arrow-right">&nbsp;</span>Yearwise Expenses</a></li>
            </ul>

        </li>

        <li><a href="user-profile.php"><em class="fa fa-user">&nbsp;</em>Profile</a></li>

        <li><a href="change-password.php"><em class="fa fa-clone">&nbsp;</em>Change Password</a></li>

        <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em>Log out</a></li>

    </ul>

</div>-->

<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
        <div class="position-relative">
            <img src="assets/profile.png" alt="Profile Pic" width="80" height="80">
            <span class="position-absolute top-0 start-75 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
            </span>
        </div>
        <p class="mt-3">
          <?php echo $name; ?></p>
    </div>
    <div class="list-group list-group-flush my-3">
        <a href="dashboard.php"
           class="list-group-item list-group-item-action bg-transparent second-text active"><i
                    class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold
        d-flex justify-content-between"
           data-bs-toggle="collapse" href="#collapseExample" role="button"
           aria-expanded="false" aria-controls="collapseExample">
            <span>Expenses</span> <i class="fas fa-chevron-down"></i>
        </a>
        <div class="collapse" id="collapseExample" style="background-color: #d9cbcb">
            <a href="add-expense.php"
               class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                Add Expense</a>
            <a href="manage-expense.php"
               class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                All Expenses</a>
        </div>
        <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold
        d-flex justify-content-between"
           data-bs-toggle="collapse" href="#report" role="button"
           aria-expanded="false" aria-controls="report">
            <span>Expenses Report</span> <i class="fas fa-chevron-down"></i>
        </a>
        <div class="collapse" id="report" style="background-color: #d9cbcb">
            <a href="expense-daywise-report.php"
               class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                Daywise Expenses</a>
            <a href="expense-monthwise-report.php"
               class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                Monthwise Expenses</a>
            <a href="expense-yearwise-report.php"
               class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                Yearwise Expenses</a>
        </div>
        <a href="user-profile.php"
           class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-paperclip me-2"></i>Profile</a>
        <a href="change-password.php"
           class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-shopping-cart me-2"></i>Change Password</a>
        <a href="logout.php"
           class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                    class="fas fa-power-off me-2"></i>Logout</a>
    </div>
</div>
<!-- /#sidebar-wrapper -->
