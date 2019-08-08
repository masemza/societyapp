<?php
require 'core/init.php';
$general->logged_out_protect();
$username = htmlentities($user['username']);

$invoice_id =$_GET['invoice_id'];
$view_invoice = $invoices->invoicedata($invoice_id);	
global $num;

?>

<!doctype html>
<html lang="en" dir="ltr">
<?php include 'incl/head.php' ;?>
<?php include 'incl/header.php' ;?>

<style>
  .tab 
  { 
    position:absolute;left:150px; 
  }
</style>

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

                <a href="./view_invoice.php" style="text-decoration: none;"> <i class="fe fe-arrow-left"></i>View Invoices</a> | Invoice

              </h1>
            </div>


            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Invoice</h3>
                <div class="card-options">
                  <button type="button" class="btn btn-primary btn-sm" onclick="javascript:window.print();"><i class="fe fe-download"></i> Download Invoice</button>
              </div>
            </div>

              <div class="card-body">




                <div class="row my-6">
                  <div class="col-6">
                    <!-- <p class="h3">Company</p> -->
                    <?php foreach ($view_invoice as $row) ?>

                    <p class="h2">Logo </p>
                  </div>

                    <div class="col-6 text-right">
                      <p class="h3">Seshego Funerals</p>
                      <p class="h5">Street</p>
                      <p class="h5">Suburb * City</p>
                      <p class="h5">Province</p>

                      <br>
                      <p class="h5">Cell phone no 1 | Cell phone no 2</p>
                      <p class="h5">Email: </p>
                    </div>
                </div>




                <hr>

                    <div class="col-12 text-center">
                        <p class="h2"> INVOICE</p>
                    </div>
 
                <div class="row my-6">
                  <div class="col-6">
                    <!-- <p class="h3">Company</p> -->
                    <?php foreach ($view_invoice as $row) ?>

                    <p class="h3">To: <?php echo $row['name'] ?> </p>
                    <!-- <p class="h3">Company: </p> -->
                  </div>
                  <div class="col-6 text-right">
                     <p class="h4"><?php $date = date_create($row['invoice_date']);
                            echo date_format($date, 'd F Y'); ?> </p>
                  </div>
                </div>



                <!-- <div class="table-responsive push">
                  <table class="table table-bordered table-hover">
                    <tr>
                      <th class="text-center" >Invoice Date</th>
                        <td class="text-center">
                        <?php
                            //$date = date_create($row['invoice_date']);
                            //echo date_format($date, 'd F Y');
                        ?>
                        </td>
                    </tr>

                    <tr>
                      <th class="text-center" >Description</th>
                      <td class="text-center"><?php //echo $row['description']; ?></td>
                    </tr>

                    <tr>
                        <th class="text-center" >Name</th>
                        <td class="text-center"><?php //echo $row['name']; ?></td>
                    </tr>

                    <tr>
                        <th class="text-center" >Amount</th>
                        <td class="text-center">R<?php //echo number_format($row['amount'],2); ?></td>
                    </tr>

                  </table>
                </div> -->
                


                <h4> <p class="text-right"> INVOICE NO: <?php echo $row['invoice_id'] ?></p> </h4>

                <div class="table-responsive push">
                  <table class="table table-bordered table-hover">
                    <tr>
                      <th class="text-center" style="width: 0.5%">Item</th>
                      <th class="text-center" style="width: 5%">Description</th>
                      <th class="text-center" style="width: 2%">Amount</th>
                    </tr>

                    <tr>
                    
                      <td class="text-center">
                          <?php $num++; echo $num ?>
                      </td>
                      
                      <td class="text-center">
                          <?php echo $row['description']; ?>
                      </td>

                      <td class="text-center">
                          R<?php echo number_format($row['amount'],2); ?>    
                      </td>
                    
                    </tr>
                  </table>  
                </div>

                  <hr>
                  <div class="row my-6">
                  <div class="col-6">
                    <p class="h3">Bank Details</p>
                    <p class="h4">Account holder <span class="tab"> : </span></p>
                    <p class="h4">Bank <span class="tab"> : </span></p>
                    <p class="h4">Account number <span class="tab"> : </span></p>
                    <p class="h4">Reference <span class="tab"> : </span></p>
                  </div>
                  <div class="col-6 text-right">
                     <p class="h4">Total: R<?php echo number_format($row['amount'],2); ?></p>
                  </div>
                </div>

                <hr>
                <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>


            </div>
          </div>
        </div>
      </div>

      <?php include 'incl/footer.php' ;?>
    </div>
  </body>
</html>