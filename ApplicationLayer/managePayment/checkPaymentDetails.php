<?php
    require_once '../../BusinessLayer/controller/manageOrderController.php';
    require_once '../../BusinessLayer/controller/managePaymentController.php';
    session_start();

    $service = new manageOrderController();
    $data = $service->viewOrder();

    $service1 = new managePaymentController();
    if(isset($_POST['add'])){
        $service1->add();
    }
    $addressData = $service1->getAdd();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Checkout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <script
            src="https://www.paypal.com/sdk/js?client-id=AZsNRTgEFaaoseMgYqd3BMUsEb9OTeFkkTX8ZmNYC5652wjkbSFfbUUwVN-KkLckK6GZMAuXoHImnfnR&currency=MYR">
            // Required. Replace SB_CLIENT_ID with your sandbox client ID.
        </script>
        <style>
            td {
                text-align: center;
            }

            .logout {
            position: fixed;
            right: 0;
            margin-right: 5px;
            margin-top: 5px;
            }

            input {
                text-align: center;
            }

            a:link, a:hover {
                text-decoration: none;
            }

            .main {
                background-color: white;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                text-align: center; 
                margin-left: 600px; 
                margin-top: 100px; 
                padding: 10px; 
                width: 500px;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="../../ApplicationLayer/manageOrder/customerHomePage.php?custID=<?=$_SESSION['custID']?>?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../manageUserProfile/customerProfile.php?custID=<?=$_SESSION['custID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>

        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Payment Checkout</h3>



        <div class="main">
            <h4><b>Delivery Address</b></h4>
            <br>
            <div style="padding-left: 120px">
            <?php foreach ($addressData as $address) { ?>
                
                <p>
                            <form>
                              <div class="form-group row">
                                <label for="custaddress1" class="col-sm-2 col-form-label" style="tex">State</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control-plaintext" id="custaddress1" value="<?= $address['custaddress1']?>" style="border: 0px;">
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="custaddress2" class="col-sm-2 col-form-label">Area</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="custaddress2" value="<?= $address['custaddress2']?>" style=" border: 0px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="custaddress3" class="col-sm-2 col-form-label">Postal Code</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="custaddress3" value="<?= $address['custaddress3']?>" style=" border: 0px;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="custaddress4" class="col-sm-2 col-form-label">Full Address</label>
                                <input type="text" readonly class="form-control-plaintext" id="custaddress4" value="<?= $address['custaddress4']?>" style="border: 0px;">
                        </div>

                    </form>
                </p>
                
               

                </div>
            <?php } ?><br>
            <div style="display: inline">

                <button type="button" class="btn btn-primary" style="position: center"><a href="../manageUserProfile/customerProfile.php?custID=<?=$_SESSION['custID']?>" style="color: white;">Change Address</a></button>


                <button type="button" class="btn btn-success" style="position: center"><a href="../managePayment/paymentCheckout.php?custID=<?=$_SESSION['custID']?>" style="color: white;"><span style="padding:20px;"> Next</a></button>
                </div>
                    <br><br>
</div>
