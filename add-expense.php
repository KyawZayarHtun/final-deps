<?php
session_start();
error_reporting(0);
include('confs/config.php');
if(isset($_POST['save']))
{    
     $category = $_POST['category_name'];
     $sql = "INSERT INTO category (category_name)
     VALUES ('$category')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
if (strlen($_SESSION['detsuid'] == 0)):
  header("location: logout.php");
else:
  if (isset($_POST['submit'])) {
    $userid = $_SESSION['detsuid'];
    $exdate = $_POST['expense_date'];
    $item = $_POST['expense_item'];
    $itemcost = $_POST['cost'];
    $category_name = $_POST['category'];
    $query = mysqli_query($conn, "INSERT INTO tblexpenses(user_id, expense_date, expense_item, cost, category_name) VALUES ('$userid', '$exdate', '$item', '$itemcost', '$category_name')");
    if ($query) {
      echo "<script>alert('Expense has been added');</script>";
      header("location: manage-expense.php");
    } else {
      echo "<script>alert('Something went wrong. Please try again!');</script>";
    }
  }
  ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daily Expense Tracker || Add Expense</title>
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
            .add-expense-width {
                width: 50%;
            }
            @media screen and (max-width: 768px) {
                .add-expense-width {
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
                <form role="form" method="post" class="add-expense-width">
                <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <div class="row">
                                <div class="col-8">
                                <select class="form-control" id="category" name="category">
                            <?php
                      $cat=mysqli_query($conn,"SELECT * FROM category");
                      while ($row=mysqli_fetch_array($cat)):
                      ?>
                                <option value="<?php  echo $row['category_name'];?>"><?php  echo $row['category_name'];?></option>
                                <?php
                        endwhile;
                        ?>
                            </select>
                                </div>
                                <div class="col-4">
                                <button class="btn btn-outline-success" onclick="showmodal()">
                                    Add Category
                                </button>
                                
                                </div>
                            </div>
                            
                    </div>
                    <div class="mb-3">
                        <label for="expense_date" class="form-label">Date of Expense</label>
                        <input type="date" id="expense_date" name="expense_date" class="form-control"
                        required>
                    </div>
                    <div class="mb-3">
                        <label for="expense_item" class="form-label">Item</label>
                        <input type="text" id="expense_item" name="expense_item"
                               class="form-control"
                               placeholder="Item Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Cost of Item</label>
                        <input type="number" id="cost" name="cost"
                               class="form-control"
                               placeholder="Item Cost" required>
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-outline-primary" name="submit">
                            Add Expense
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="showcategory">
                               
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form role="form" method="post">
            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name</label>
                <input type="text" id="category_name" name="category_name"
                    class="form-control"
                    placeholder="Enter Category Name">
            </div>
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="save" value="submit" class="btn btn-primary" onclick="savecategory()">Save</button>
            </div>
            </form>
            </div>
        </div>
        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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

        function showmodal(){
            $("#showcategory").modal('show');
        }

    </script>
    </body>
    </html>
<?php endif; ?>