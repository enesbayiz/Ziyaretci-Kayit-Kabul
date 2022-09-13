<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cvmsaid=$_SESSION['cvmsaid'];
$fullname=$_POST['fullname'];
$mobnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$kart=$_POST['kart'];
$add=$_POST['address'];
$tcid=$_POST['tckimlik'];
$whomtomeet=$_POST['whomtomeet'];
$department=$_POST['department'];
$reasontomeet=$_POST['reasontomeet'];
$query2=mysqli_query($con,"insert into tblcards(kart) value('$kart')");
$query=mysqli_query($con,"insert into tblvisitor(FullName,Email,MobileNumber,TcKimlik,Address,WhomtoMeet,Deptartment,ReasontoMeet,Ban,kart) value('$fullname','$email','$mobnumber','$tcid','$add','$whomtomeet','$department','$reasontomeet','HAYIR',(SELECT kart FROM tblcards WHERE kart='$kart'))");

    if ($query) {
    $msg="Ziyaretçi eklendi.";
  }
  else
    {
      $msg="Bir sorun gerçekleşti.";
    }

  
}









if (isset($_POST['submit2'])) {
	$cvmsaid=$_SESSION['cvmsaid'];
	$tcid2=$_POST['tckimlik'];
   


	//$msg="$tcid2";
	$result = mysqli_query($con,"select Ban from tblvisitor where TcKimlik = '$tcid2' ORDER BY id DESC limit 1");
	$result2 = mysqli_fetch_assoc($result);
	$result3= $result2['Ban'];

	$resultAd = mysqli_query($con,"select fullname from tblvisitor where TcKimlik = '$tcid2' ORDER BY id DESC limit 1");
	$resultAd2 = mysqli_fetch_assoc($resultAd);
	$resultAd3= $resultAd2['fullname'];

    $resultMa = mysqli_query($con,"select email from tblvisitor where TcKimlik = '$tcid2' ORDER BY id DESC limit 1");
	$resultMa2 = mysqli_fetch_assoc($resultMa);
	$resultMa3= $resultMa2['email'];

    
    $resultDr = mysqli_query($con,"select Address from tblvisitor where TcKimlik = '$tcid2' ORDER BY id DESC limit 1");
	$resultDr2 = mysqli_fetch_assoc($resultDr);
	$resultDr3= $resultDr2['Address'];

    $resulttel = mysqli_query($con,"select MobileNumber from tblvisitor where TcKimlik = '$tcid2' ORDER BY id DESC limit 1");
	$resulttel2 = mysqli_fetch_assoc($resulttel);
	$resulttel3= $resulttel2['MobileNumber'];

	if ($result3 == "") {

		$msg= "Kayıtlı değil";
		
		
	}
	else {
		$msg= "Yasaklı mı? $result3";}
	
	
	}
/*	if ( mysql_num_rows($result) == 0 ) {
		$msg="Yasaklı değil";
	} else {
		$msg="Yasaklı!";*
	}} */










































?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title> Ziyaretçi</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include_once('includes/sidebar.php');?>
   
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once('includes/header.php');?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Yeni</strong> Ziyaretçi ekle
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Adı Soyadı</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="fullname" name="fullname" placeholder="Adı Soyadı" value="<?php echo @$resultAd3;?>" class="form-control" >
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Email Giriş</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email" name="email" placeholder="Email Giriş" value="<?php echo @$resultMa3;?>" class="form-control" >
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Telefon Numarası</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Telefon Numarası" value="<?php echo @$resulttel3;?>" class="form-control" maxlength="10" >
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">TC Kimlik No</label>
													&nbsp;&nbsp;&nbsp;&nbsp;
													<button type="submit" name="submit2" class="btn btn-primary btn-sm">Kontrol</button>
													
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="tckimlik" name="tckimlik" placeholder="TC Kimlik No" value="<?php echo @$tcid2;?>" class="form-control" maxlength="11" >
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Adres</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="address" id="address" rows="9" placeholder="Ziyaretçinin Adresini giriniz..." class="form-control" ><?php echo @$resultDr3;?></textarea>
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Kime geldi</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="whomtomeet" name="whomtomeet" placeholder="Kime geldi" class="form-control" >
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Departman</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="department" name="department" placeholder="Departman" class="form-control" >
                                                    
                                                </div>
                                                <br><br>
												<div class="col col-md-3">
													<label for="password-input" class=" form-control-label">Kart No</label>
												</div>
												<div class="col-12 col-md-9">
													<input type="text" id="kart" name="kart" placeholder="Kart no" class="form-control" maxlength="4">

												</div>
                                                
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Geliş/Görüşme sebebi</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="reasontomeet" name="reasontomeet" placeholder="Geliş/Görüşme sebebi" class="form-control" >
                                                    
                                                </div>
                                            </div>
                                            
                                          <div class="card-footer">
                                        <p style="text-align: center;"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Gönder
                                        </button></p>
                                        
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                       
                        </div>
                        
                    </div>
               
 
<?php include_once('includes/footer.php');?>
   </div> </div>
            </div>
        </div>
</div>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
<?php }  ?>