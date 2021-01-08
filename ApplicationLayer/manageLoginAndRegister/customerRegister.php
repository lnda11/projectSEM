<?php
require_once '../../BusinessLayer/controller/manageLoginAndRegisterController.php';
$user = new manageLoginAndRegisterController();

if(isset($_POST['custregister'])){
    $user->custRegister();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CUSTOMER REGISTRATION</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/logo.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <style>
            p {
                font-size: 25px;
                text-align: center;
            } 

            .registerbtn {
                background-color: rgb(36, 160, 237);
                color: white;
                padding: 10px 10px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            .registerbtn:hover {
                opacity: 1;
            }

            .showPwd {
                font-size: medium;
                padding-top: 5px;
                text-align: right;
            }

            .login {
                color: blue;
            }

            .login:hover {
                color : rgb(0, 81, 255);
                text-decoration: none; 
                cursor: pointer;
                opacity: 0.9;
            }
        </style>
    </head>

    <script>
	
        function showPassword() {
            var x = document.getElementById("password");
    
            if(x.type === "password"){
                x.type = "text";
            } 
            else{
                x.type = "password";
            }
        }
    </script>

    <body>
        <div class="header">
            <a href="userRegister.php"><img src="Image/logobaru.png" alt="Logo" height="300px" width="350px"></a>
			<body style="background-color:powderblue;">
			<hr style="border: 2px solid #4682BF; width:70%;">
        </div>

        <br>
        <p><strong>CUSTOMER REGISTRATION</strong></p>
        <br>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="custusername" placeholder="Username" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="custhpnumber" placeholder="Phone Number" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="custemail" placeholder="Email Address" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="textarea" class="form-control form-control input-lg" name="custaddress1" placeholder="State" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="custaddress2" placeholder="Area" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="custaddress3" placeholder="Postal Code" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text"class="form-control form-control input-lg" name="custaddress4" placeholder="Full Address" required>
                    </div>
                    <br>
					
				  
					
					<div class="form-group"> 
					<div class="input-group-addon">
					<i class="fa fa-map-image" aria-hidden="true" style="font-size: large;"></i>
					<label for="pwd" align="center">UPLOAD YOUR PHOTO</label>
					<input type="file" class="form-control"  name="custimage"></input>
					</div>
					</div>
					
		
					
					
					
                    <div class="input-group">         
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="password" class="form-control form-control input-lg" name="custpassword" id="password" placeholder="Password" required>
                    </div>
                    <div class="showPwd"><input type="checkbox" onclick="showPassword()">&nbsp;Show Password</div>
                        <br>
                        <button type="submit" name="custregister" class="registerbtn"><label style="font-size: larger;">REGISTER</label></button>
                    </div>  
                </div>
            </div>
        </form>
        <br>
        <div style="text-align: center; font-size: large;">
            ALREADY HAVE AN ACCOUNT? <a class="login" href="./customerLogin.php"><u>LOGIN HERE</u></a>.
        </div>
    </body>
<?php
if(isset($_POST["custregister"]))
{	
	$tm=md5(time());
	$target_dir="Image/";
	$target_file=$target_dir . basename($_FILES["custimage"]["name"]);
	//$dst1="ApplicationLayer/manageLoginAndRegister/Image/".$tm.$fnm;
	//$dst="./custimage/".$tm.$fnm;
	//$dst1="/custimage/".$tm.$fnm;
	move_uploaded_file($_FILES["custimage"]["tmp_name"],$target_file);

	mysqli_query($link,"insert into customtable values (NULL,'$_POST[custusername]','$_POST[custhpnumber]','$_POST[custemail]','$_POST[custaddress1]','$_POST[custaddress2]','$_POST[custaddress3]','$_POST[custaddress4]','$dst1','$_POST[custpassword]')");
	
	?>
	<script type = "text/javascript">
	window.location.href='customerLogin.php';
	</script>
	<?php
	
}

?>
</html>
</html>