<html>
<head>
<meta charset="UTF-8">
<style>
.tabcontent {
    animation: fadeEffect 0.5s; /* Fading effect takes 1 second */
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #3498DB;
}

/* Style the buttons that are used to open the tab content */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
	color:#fff;
	font-size:22;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #2E86C1;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #3984DB;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
<title>स्वागत </title></head>
<body>
  <span class="header" >
		<img src="../../assets/bel_logo.png" style="width:256px" align="left">
 <h5 id="abc"><h5 align="right"><font size="5" color="#3984DB">  टेक्निकल इन्फॉर्मेशन सेंटर   </font> <br/>
     A Simple Library Management System <br/>
         Made as a Project<br/>
         SDSK Apps <br/>
        
<font color="#f00" size=4> BETA - बीटा</font>
</p></h5>
	</span>
<!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen" >रेकॉर्ड्स देखें </button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">निवेदन देखें </button>
   <button class="tablinks" onclick="openCity(event, 'Approved')">अनुमोदित किताबें </button>
   <button class="tablinks" onclick="openCity(event, 'Tokyo')">पासवर्ड बदलने हेतू </button>
    <button class="tablinks" onclick="window.location.href ='./logout.php'">लौग आउट </button>

  
  <p align="right"><font size="5" color="#fff" >Welcome <?php 
  session_start();
  if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];}
  else{
	  header("location:../../index.html");
  }
  echo $user ?> </font></p>
</div>

<!-- Tab content -->
<div id="London" class="tabcontent">
		<?php include('../../search.html') ?>
	</div>

<div id="Paris" class="tabcontent">
 <?php include('requests.php') ?>
</div>

<div id="Tokyo" class="tabcontent">
  <?php include('changePassword.php') ?>
</div>

<div id="Approved" class="tabcontent">
  <?php include('userApprovedView.php') ?>
</div>
<script>
document.getElementById("defaultOpen").click();
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
//	document.getElementById("defaultOpen").click();
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

<?php error_reporting(0);

	if(!isset($_SESSION['user']) && $_SESSION['user'] != ''){
		header("location:../../index.html");
	}

 ?>

</body>
</html>
