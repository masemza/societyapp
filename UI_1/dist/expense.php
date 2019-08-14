<?php
require 'core/init.php';
$general->logged_out_protect();
$username = htmlentities($user['username']);

$expenses_id =$_GET['expenses_id'];
$view_expense = $expenses->expensedata($expenses_id);	

// foreach($view_receipt as $row)
// {
//     $society_id = $row['society_id'];
// }
// $last_balance = $payment->get_last_balance($society_id);

// $bal = substr($last_balance,1);

//global $num;

?>

<!doctype html>
<html lang="en" dir="ltr">
<?php include 'incl/head.php' ;?>
<?php include 'incl/header.php' ;?>

  <body class="">
    <div class="page">
      <div class="page-main">




        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">

              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">

                  <li class="nav-item">
                    <a href="./index.php" class="nav-link active"><i class="fe fe-home"></i> Home</a>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">

              <?php foreach ($view_expense as $row) ?>
                <a href="./view_expense.php" style="text-decoration: none;"> <i class="fe fe-arrow-left"></i>View Expenses</a> | Expense
              <?php ?>

              </h1>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> View Expense </h3>
                <div class="card-options">
                  <button type="button" class="btn btn-primary btn-sm" onclick="javascript:window.print();"><i class="fe fe-download"></i> Download Expense</button>
                </div>
              </div>
              <div class="card-body">
              <?php //foreach ($view_statement as $row) { 
                        //$society_name = $row['society_name'];
                        //$society_id = $row['society_id'];
                    //}
                        ?>
 
                <div class="row my-6">
                  <div class="col-6">
                    <!-- <p class="h3">Company</p> -->
                    <?php foreach ($view_expense as $row) ?>
                    <p class="h2">Seshego Funerals</p><?php //echo $row['society_name'] ?></p>
                    <address>
                    <?php //    foreach ($view_society as $row)?>
                        <!-- Location: <?php //echo $row['location'] ?> -->
                    </address>
                  </div>
                  <div class="col-6 text-right">
                    <!-- <p class="h3">Client</p> -->
                    <address>

                        <!-- <p class="h4"> Package no: #<?php //echo $row['package_id'] ?></p> -->
                     <p> Date: <?php echo date("d-m-Y"); ?> </p>
                    </address>
                  </div>
                </div>
                <div class="table-responsive push">
                  <table class="table table-bordered table-hover">
                    <tr>
                      <th class="text-left" >Expense made On</th>
                        <td class="text-center">
                        <?php
                            $date = date_create($row['expense_date']);
                            echo date_format($date, 'd-m-Y');
                        ?>
                        </td>
                    </tr>

                    <tr>
                      <th class="text-left" >Description</th>
                      <td class="text-center"><?php echo $row['description']; ?></td>
                    </tr>

                    <tr>
                        <th class="text-left" >Name</th>
                        <td class="text-center"><?php echo $row['name']; ?></td>
                    </tr>

                    <tr>
                        <th class="text-left" >Category</th>
                        <td class="text-center"><?php echo $row['categories']; ?></td>
                    </tr>

                    <tr>
                        <th class="text-left font-weight-bold text-uppercase text-left" >Amount</th>
                        <td class="text-center font-weight-bold text-uppercase text-right" >R<?php echo number_format($row['amount'],2); ?></td>
                    </tr>

                  </table>
                </div>
                <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include 'incl/footer.php' ;?>
    </div>
  </body>
</html>