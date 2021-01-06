<?php
    require_once '../../BusinessLayer/controller/manageOrderController.php';
    require_once '../../BusinessLayer/controller/managePaymentController.php';
    require_once '../../ApplicationLayer/managePayment/paymentCheckout.php';

    $service = new manageOrderController();
    $data = $service->viewOrder();

    $service1 = new managePaymentController();
    if(isset($_POST['add'])){
        $service1->add();
    }
    $addressData = $service1->getAdd();
    
?>
    <div style="text-align: center; padding-top: 20px;">
                <p><b>Select Your Payment Method:</b></p>

                <?php foreach ($addressData as $address) { ?>
                    <div id="paypal-button-container">
                <?php } ?>
            </div>
        
        <br><br>
        </div>
        </div>
        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code: 'MYR',
                                value: '<?= $totalpricedelivery ?>',
                            },
                            shipping: {
                                name: {
                                    full_name: '<?= $address["custusername"]; ?>'
                                },
                                address: {
                                    address_line_1: '<?= $address["custaddress1"]; ?>',
                                    address_line_2: '<?= $address["custaddress2"]; ?>',
                                    admin_area_2: '<?= $address["custaddress3"]; ?>',
                                    admin_area_1: '<?= $address["custaddress4"]; ?>',
                                    postal_code: '',
                                    country_code: 'MY'
                                }
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                        // This function shows a transaction success message to your buyer.
                        alert('Transaction Successful!');
                        window.location.href = "./paymentSuccessful.php?custID=<?=$_SESSION['custID']?>";


                    });
                }
            }).render('#paypal-button-container');
            //This function displays Smart Payment Buttons on your web page.
        </script>
    </body>
</html>

