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
	//border: 1px solid black;
	//margin: auto;
	height: 80px; 
	//width: 2200px; 
	border-top-right-radius: 10px !important;
	border-top-left-radius: 10px !important;
	border-bottom-right-radius: 10px !important;
	border-bottom-left-radius: 10px !important;
	border-spacing: 2mm 2mm !important;
	text-align: center;
	//font-size: 28pt;
}

.worker-input {
	
	margin: 0 auto;
	text-align: center;
}


</style>

<body>

<!-- Sidebar -->
<nav class="w3-sidebar w3-black w3-animate-top w3-xxlarge" style="display:none;padding-top:150px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-black w3-xxlarge w3-padding w3-display-topright" style="padding:6px 24px">
    <i class="fa fa-remove"></i>
  </a>
  <div class="w3-bar-block w3-center">
    <a href="index.php" class="w3-bar-item w3-button w3-text-grey w3-hover-black">COLLECT BOX DATA</a>
    <a href="report.php" class="w3-bar-item w3-button w3-text-grey w3-hover-black">REPORT GENERATOR</a>
    <a href="/deliverki/fpdf/report-pdf.php" target="_blank" class="w3-bar-item w3-button w3-text-grey w3-hover-black">LAST DELIVERY SHEET</a>
	<br></br>
	<a href="HISTORY.php" class="w3-bar-item w3-button w3-text-grey w3-hover-black">DAILY HISTORY</a>
    <a href="HISTORY2.php" class="w3-bar-item w3-button w3-text-grey w3-hover-black">DAILY HISTORY SUMMARY</a>


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
  <h2>BOX SCANNING HISTORY - SENDING SUMMARY</h2>
  <h3> PSM </h3>
  <p><b></b></p>
  
</header>

<div class="worker-input">

	
<?php
	  
	  error_reporting(E_ALL ^ E_NOTICE);
      $metoda = $_POST['DATE'];
      $wyrazenie = $_POST['DATE'];
      $wyrazenie = trim($wyrazenie);

      if (!$metoda || !$wyrazenie)
      {
        echo 'Lack of searching parameters. Come back to previous page!';
        exit;
      }
      if (!get_magic_quotes_gpc())
      {
        $metoda = addslashes($metoda);
        $wyrazenie = addslashes($wyrazenie);
      }
      @ $db = new mysqli('localhost','root','','psm');
      
      if (mysqli_connect_errno())
      {
        echo 'Połączenie z bazą nie powiodło się. Spóbuj ponownie';
        exit;
      }
      $db->query('SET NAMES utf8');
      $db->query('SET CHARACTER_SET utf8_unicode_ci');
    /////
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "psm";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$i = 1;
$DATE = date("Y-m-d");
$sql = "SELECT MODEL, COUNT(*) AS 'BOXQTY' ,SUM(`MODULES-QTY`) AS 'MODULES' FROM main WHERE DATE = '$wyrazenie' GROUP BY MODEL";
$result = $conn->query($sql);


			echo $wyrazenie;
			echo "<TABLE BORDER=1 ALIGN='CENTER'>";
			echo "<tr style='background-color: red; color: #fff;'>";
			echo "<td>NO</td>";
			echo "<td>MODEL</td>";
			echo "<td>BOX-QTY</td>";
			echo "<td>MODULES-QTY</td>";			
			echo "</tr>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		


			echo "<tr>";
			echo "<td>".$i++."</td>";
			echo "<td>".$row["MODEL"]."</td>";
			echo "<td>".$row["BOXQTY"]."</td>";
			echo "<td>".$row["MODULES"]."</td>";
			echo "</tr>";

			
		

        //echo "<br> id: ". $row["MIC_NO"]. " - Name: ". $row["POSITION"]. "<br>";
		
    }
	echo "</TABLE>";
} else {
    echo "0 results";
}

$conn->close();

	
	/////
      $db->close();
   
 echo '</div>';


//<!-- End Page Content -->



 ?>
 






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
