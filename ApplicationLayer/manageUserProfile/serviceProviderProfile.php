<?php
    require_once '../../BusinessLayer/controller/manageUserProfileController.php';

    $spID = $_GET['spID'];

    $user = new manageUserProfileController();
    $data = $user->viewSP($spID); 

    if(isset($_POST['update'])){
        $user->updateSP();
    }

    if(isset($_POST['delete'])){
        $user->deleteSP($spID);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            td {
                padding-top: 10px;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="../manageService/serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 100%; padding-right: 5px;">Homepage</label></a>
            <div class="topnav-right">
                <a href="./serviceProviderProfile.php?spID=<?=$_SESSION['spID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
				<body style="background-color:powderblue;">
            </div>  
        </div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em;"><b>SERVICE PROVIDER PROFILE</b></h3>
        <div style="margin-top: 15px; margin-left: 1em;">
            <form action="" method="POST">
                <?php foreach($data as $row) { 
                    $_SESSION['spID']=$row['spID'];
                ?>
              <table>
                    <tr>
                        <td><b>Username&emsp;</b></td>
                        <td><b><input type="text" name="spusername" value="<?=$row['spusername']?>" readonly></b></td>
                    </tr>
                    <tr>
                        <td><b>Phone Number&emsp;&emsp;</b></td>
                        <td><b><input type="text" name="sphpnumber" value="<?=$row['sphpnumber']?>"required></b></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td><b><input type="text" name="spemail" value="<?=$row['spemail']?>"required></b></td>
                    </tr>
                    <tr>
                        <td><b>Company Name</b></td>
                        <td><b><input type="text" name="spcompanyname" value="<?=$row['spcompanyname']?>"required></b></td>
                    </tr>
                    <tr>
                        <td><b>State</b></td>
                        <td><b><input type="text" name="spaddress1" value="<?=$row['spaddress1']?>"required></b></td>
                    </tr>
                    <tr>
                        <td><b>Area</b></td>
                        <td><b><input type="text" name="spaddress2" value="<?=$row['spaddress2']?>"required></b></td>
                    </tr>
                    <tr>
                        <td><b>Postal Code</b></td>
                        <td><b><input type="text" name="spaddress3" value="<?=$row['spaddress3']?>"required></b></td>
                    </tr>
                    <tr>
                        <td><b>Full Address</b></td>
                        <td><b><input type="texarea" name="spaddress4" rows="4" cols="50" value="<?=$row['spaddress4']?>"required></b></td>
                    </tr>
                    <tr>
                        <td><b>Bank Type</b></td>
                        <td><b><input type="text" name="spbanktype" value="<?=$row['spbanktype']?>"required></b></td>
                    </tr>
                    <tr>
                        <td><b>Bank Number</b></td>
                        <td><b><input type="text" name="spbankaccountnumber" value="<?=$row['spbankaccountnumber']?>"required></b></td>
                    </tr>
					<tr>
					<img src="<?php echo '../manageLoginAndRegister/Image/'.$row["spimage"];?>"  height="150"  width="150">;
					</tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                        <br>
                            <button type="submit" class="btn btn-danger" name="delete">Delete Profile</button>&emsp;
                            <button type="submit" class="btn btn-primary" name="update">Update Profile</button>
                        </td>
                    </tr>
                </table>
                <?php } ?>             
            </form>
        </div>
        </center>
    </body>
</html>