<html>
<head>
<meta charset='UTF-8'>
       <?php
session_start();     
if(!isset($_SESSION['user'])){
    header ("location:../../index.html");
}

 ?>
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
		color:#fff;
	font-size:20;
    padding: 14px 16px;
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
<script>
 function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
	//var q = document.getElementById("defaultOpen");
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
<title>Admin</title></head>
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
  <button class="tablinks" onclick="openCity(event, 'Search')" id="defaultOpen" >किताब सर्च </button>
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen" >रिकॉर्ड देखे </button>
  <button class="tablinks" onclick="openCity(event, 'Paris')" > इशू निवेदन  </button>
  <button class="tablinks" onclick="openCity(event, 'Insert')">नई किताब हेतू  </button>
    <button class="tablinks" onclick="openCity(event, 'Approved')">अनुमोदन की स्थिति </button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">प्रयोगी रजिस्ट्रेशन </button>
   <button class="tablinks" onclick="openCity(event, 'BookData')">अनुमोदित किताबें  </button>
      <button class="tablinks" onclick="window.location.href ='./logout.php'">लॉग आउट </button>
  <p align="right"><font size="4" color="#fff">व्यवस्थापक पैनल</font></p>
</div>

<!-- Tab content -->
<div id="London" class="tabcontent">
		<?php include('view.php') ?>
	</div>

<div id="Paris" class="tabcontent">
 <?php include('adminViewRequests.php') ?>
</div>

<div id="Tokyo" class="tabcontent">
  <?php include('register.php') ?>
</div>
    
	
<div id="Search" class="tabcontent">
  <?php include('adminSearch.php') ?>
</div>
	
	<div id="Approved" class="tabcontent">
  <?php include('adminApprovedView.php') ?>
</div>
<div id="BookData" class="tabcontent">
  <?php include('bookData.php') ?>
</div>
    <!--Insert records-->
<div id="Insert" class="tabcontent">
   <form action="insert.php" method="post">
    <table border="1">
<tr>
<td colspan="2"><b><font color='#3984DB'>किताब डालें  </font></b></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>किताब क्रम संख्या  <em>*</em></font></b></td>
<td><label>
<input type="text" name="bNo" id="bNo" value="<?php echo $bNo; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>नाम <em>*</em></font></b></td>
<td><label>
<input type="text" name="bName" id="bName" value="<?php echo $name; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>लेखक / लेखिका <em>*</em></font></b></td>
<td><label>
<input type="text" name="bAuthor" id="bAuthor" value="<?php echo $author; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>श्रेणी <em>*</em></font></b></td>
<td><label>
<input type="text" name="category" id="category" value="<?php echo $category; ?>" />
</label></td>
</tr>
    
<tr>
<td width="179"><b><font color='#663300'>मात्रा<em>*</em></font></b></td>
<td><label>
<input type="text" name="bQty" id="bQty" />
</label></td>
</tr>  
  
<tr>
<td width="179"><b><font color='#663300'>शेल्फ संख्या <em>*</em></font></b></td>
<td><label>
<input type="text" name="bShelf" id="bShelf"  />
</label></td>
</tr>
    
<tr>
<td width="179"><b><font color='#663300'>स्थिति <em>*</em></font></b></td>
<td><label>
<!--<input type="text" name="status" id="status" value="Available" />  -->
<select name="status" required>
<option>Available</option>
<option>Not Available</option>
</select>
</label></td>
</tr>


<tr align="Right">
<td colspan="2"><label>
<input type="submit" name="submit" value="Insert Records">
</label></td>
</tr>
</table>
    </form>
</div>

<script>

	document.getElementById("defaultOpen").click();

 function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
	//var q = document.getElementById("defaultOpen");
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

</body>
</html>
