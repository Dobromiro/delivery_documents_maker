<?php

	session_start();
	// wyłączenie niepotrzebnych komunikatów NOTICE
	error_reporting(E_ALL ^ E_NOTICE);
	

	
	if (isset($_POST['MODEL']))
	{

		
		require_once "connect2.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{

						$MODEL = $_POST['MODEL'];
						$MODULES_QTY = $_POST['MODULES-QTY'];
						$BOX_SN = $_POST['BOX-SN'];
						$INCOMING_DATE = date("Y-m-d h:i:sa");
						$OUTCOMING_DATE = date("Y-m-d");


						
						
						
						
					if ($polaczenie->query("INSERT INTO collect VALUES ('$MODEL', '$MODULES_QTY', '$BOX_SN', '$INCOMING_DATE', 'NULL')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: dziekuje.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	

	
	
?>

<!DOCTYPE html>
<html>
<title>Heesung Electornics</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
body,h1 {font-family: "Montserrat", sans-serif}
img {margin-bottom: -7px}
.w3-row-padding img {margin-bottom: 12px}

* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}

/* Slideshow container */
.slideshow-container {
  position: relative;
  background: #f1f1f1f1;
}

/* Slides */
.mySlides {
  display: none;
  padding: 80px;
  text-align: center;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
q {font-style: italic;}

/* Add a blue color to the author */
.author {color: cornflowerblue;}

table {
	
	width: 50%; 	
	margin: 0 auto;
}

.worker-input {
	
	margin: 0 auto;
	text-align: center;
}

</style>

<body>

<nav class="w3-sidebar w3-black w3-animate-top w3-xxlarge" style="display:none;padding-top:150px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-black w3-xxlarge w3-padding w3-display-topright" style="padding:6px 24px">
    <i class="fa fa-remove"></i>
  </a>
  <div class="w3-bar-block w3-center">
    <a href="../MP-MANAGER" class="w3-bar-item w3-button w3-text-grey w3-hover-black">MICROPHONES</a>
    <a href="#" class="w3-bar-item w3-button w3-text-grey w3-hover-black">BMS CHECK SHEET</a>
    <a href="../CHS-CBMS" class="w3-bar-item w3-button w3-text-grey w3-hover-black">CBMS CHECK SHEET</a>
    <a href="../CHECK-SHEET-MNT" class="w3-bar-item w3-button w3-text-grey w3-hover-black">CHECK SHEET MNT</a>
    <a href="../HSIT" class="w3-bar-item w3-button w3-text-grey w3-hover-black">MAIN SITE</a>

  </div>
</nav>
<!-- !PAGE CONTENT! -->
<div class="w3-content" style="max-width:1500px">

<!-- Header -->
<div class="w3-opacity">
<span class="w3-button w3-xxlarge w3-white w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></span> 
<div class="w3-clear"></div>
<header class="w3-center w3-margin-bottom">
  <h1><b>HS System</b></h1>
  <p><b></b></p>
  <p><b></b></p>
  <h2>CHECK SHEET MANAGER</h2>
  <h3>BMS</h3>
  <p><b></b></p>
  
</header>

<div class="worker-input">
<form ENCTYPE="multipart/form-data" method="post">
	<table class="w3-table">
	<tr>
		<td>
			MODEL: <br /></br> <input style="display: inline;" type="text" name="MODEL" /> <br /><br>

		</td>		
	</tr>
		<tr>
		<td>
			MODULES_QTY: <br /></br> <input style="display: inline;" type="text" name="MODULES_QTY" /> <br /><br>

		</td>		
	</tr>
		<tr>
		<td>
			BOX_SN: <br /></br> <input style="display: inline;" type="text" name="BOX_SN" /> <br /><br>

		</td>		

	
	
</table>
	
		
		<p align="center"><input type="submit" value="SEND" style="padding: 5px;"/></a>
		
		</br>
		</br>
		</div>


<!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge" style="margin-top:128px"> 

  <p class="w3-medium">Powered by HSMA IT TEAM</p></a></p>
</footer>
 
<script>
// Toggle grid padding
function myFunction() {
    var x = document.getElementById("myGrid");
    if (x.className === "w3-row") {
        x.className = "w3-row-padding";
    } else { 
        x.className = x.className.replace("w3-row-padding", "w3-row");
    }
}

// Open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.width = "100%";
    document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>
