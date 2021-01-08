<?php
    require_once '../../BusinessLayer/controller/manageTrackingController.php';
    require '../manageTracking/fpdf182/fpdf.php';

    session_start();

    $notification = new manageTrackingController();
    $data = $notification->viewRunnerP();

    

    class printPDF extends FPDF{

        function header(){
            $this->Image('Image/logo64.jpg', 10,6);
            $this->SetFont('Arial','I',12);
            $this->Cell(70,10,'Beep Beep Delivery',0,0,'C');
            $this->SetFont('Arial','B',16);
            $this->Cell(150,7,'Commission Report',0,0,'C');
            $this->Ln();
        }
        function body(){
            $this->SetXY(120,30);
            $this->SetFont('Arial','B',12, 'C');
            $this->Cell(40,10,'Runner:',0,0,);
            $this->SetFont('Arial','',12, 'C');
            $this->Cell(150,10,$_SESSION['runnerusername'],0,0,);
            $this->Ln();
            $this->SetX(120);
            $this->SetFont('Arial','B',12, 'C');
            $this->Cell(40,10,'Runner ID:',0,0,);
            $this->SetFont('Arial','',12, 'C');
            $this->Cell(150,10,$_SESSION['runnerID'],0,0,);
            $this->Ln();
        }
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            $this->SetTextColor(194,8,8);
        }
        function headerTable(){
            $this->SetXY(35,60);
            $this->SetFont('Times','B',12);
            $this->Cell(30,10,'No',1,0,'C');
            $this->Cell(50,10,'Item Name',1,0,'C');
            $this->Cell(50,10,'Quantity',1,0,'C');
            $this->Cell(50,10,'Delivery Fee (RM)',1,0,'C');
            $this->Cell(50,10,'Time',1,0,'C');
            $this->Ln();
        }
        function viewTable($db){
            $no = 1;
            $deliveryfee = 3;
            $totaldeliveryfee = 0;
            $this->SetFont('Times', '', 12);
            $this->SetXY(50,70);
            foreach($db as $row){
                $this->SetX(35);
                $this->Cell(30,10,"$no",1,0,'C');
                $this->Cell(50,10,$row['itemname'],1,0,'C');
                $this->Cell(50,10,$row['itemquantity'],1,0,'C');
                $this->Cell(50,10,"$deliveryfee",1,0,'C');
                $this->Cell(50,10,$row['time'],1,0,'C');
                $this->Ln();
                $no++;
                $totaldeliveryfee+=$deliveryfee;
            }
            $this->SetFont('Times', 'B', 12);
            $this->SetX(35);
            $this->Cell(30,20,'',0,0,'C');
            $this->Cell(50,20,'',0,0,'C');
            $this->Cell(50,20,'Total Commission',0,0,'C');
            $this->Cell(50,20,"RM $totaldeliveryfee",0,0,'C');
        }
    }

    if(isset($_POST['print'])){
        $pdf = new printPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage('L','A4',0);
        $pdf->headerTable();
        $pdf->body();
        $pdf->viewTable($data);
        $pdf->Output();
    }
        
    

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Runner HomePage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            td {
                text-align: center;
                padding-top: 15px;
            }

            .logout {
            position: fixed;
            right: 0;
            margin-right: 5px;
            margin-top: 5px;
            }

            .gotoreport {
                position: fixed;
                right: 25px;
                bottom: 15px;
                border-radius: 50%;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="../../ApplicationLayer/manageTracking/runnerHomePage.php?runnerID=<?=$_SESSION['runnerID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../../ApplicationLayer/manageUserProfile/runnerProfile.php?runnerID=<?=$_SESSION['runnerID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div>

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Runner Commission View</h3>
        <br><br>

            <div style="margin-left: 1.5em;">

                <table>
                    <tr>
                        <td width="130"><center><b>No</b></center></td>
                        <td width="250"><center><b>Item Name</b></center></td>
                        <td width="230"><center><b>Quantity</b></center></td>
                        <td width="200"><center><b>Delivery Fee (RM)</b></center></td>
                        <td width="250"><center><b>Time</b></center></td>
                    </tr>
                    <?php 
                        $totaldeliveryfee=0;
                        $deliveryfee=3;
                        $no=0;
                        foreach($data as $row){ 
                            $totaldeliveryfee = $totaldeliveryfee + $deliveryfee;;
                            $no++;
                    ?>
                    <tr>
                        <td><?php echo "$no"; ?></td>
                        <td><?=$row['itemname']?></td>
                        <td><?=$row['itemquantity']?></td>
                        <td><?php echo "$deliveryfee"; ?></td>
                        <td><?=$row['time']?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>TOTAL DELIVERY FEE</b></td>
                        <td><?php echo "$totaldeliveryfee"; ?></td>
                    </tr>

                </table>
            </div>

            <div style="margin-left: 1em; margin-top: 3em; text-decoration: underline;" >
            <form action="" method="POST">
                <button name="print" type="submit"><img src="Image/printer.png" alt="" width="40px" height="40px"></button>
            </form>
                
            </div>
            
        </center>
    </body>
</html>