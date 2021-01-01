<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Register Page</title>
        <link rel="stylesheet" type="text/css" href="ExternalCSS/logo.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <style> 
            p {
                font-size: 40px;
                text-align: center;
            } 

            a {
                color: inherit; 
            }

            a:hover {
                color : lightskyblue;
                text-decoration: none; 
                cursor: pointer;  
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
    <body>
        <div class="header">
            <img src="Image/logobaru.png" alt="Logo" height="300px" width="350px">
            <body style="background-color:powderblue;">
			<hr style="border: 2px solid #4682BF; width:70%;">
        </div>

        <br><br>
        <p><strong>REGISTER AS</strong></p>
        <br><br><br>

        <div class="row">
            <div class="col-sm-4"><center><a href="./customerRegister.php"><button class="noBtn"><i class='fas fa-user-plus' style="font-size:xxx-large;"></i><br><label style="font-size: large;">Customer</label></button></a></center></div>
            <div class="col-sm-4"><center><a href="./serviceproviderRegister.php"><button class="noBtn"><i class='fas fa-house-user' style="font-size:xxx-large;"></i><br><label style="font-size: large;">Service Provider</label></button></a></center></div>
            <div class="col-sm-4"><center><a href="./runnerRegister.php" ><button class="noBtn"><i class='fas fa-motorcycle' style="font-size:xxx-large;"></i><br><label style="font-size: large;">Runner</label></button></a></center></div>
        </div>

        <br><br>
        <div style="text-align: center; font-size: large;">
            ALREADY HAVE AN ACCOUNT? <a class="login" href="./userLogin.php"><u>LOGIN HERE</u></a>.
        </div>
    </body>
</html>