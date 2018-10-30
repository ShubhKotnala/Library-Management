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
    transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #2E86C1;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #fff;
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
<title>Tab Test</title></head>
<body>
  <span class="header" >
		<img ./src="bel_logo.png" style="width:256px" align="left">
    <h5 id="abc"><h5 align="right"><font size="6">  Technical Information Center  </font> <br/>
      Bharat Electronics Limited <br/>
Government of India, Ministry of Defence <br/>
A Navratna Company
</p></h5>
	</span>
<!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen" >View Records</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Requests</button>
  <button class="tablinks" onclick="openCity(event, 'Insert')">Insert</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Register</button>
  <p align="right"><font size="5">Admin Panel</font></p>
</div>

<!-- Tab content -->
<div id="London" class="tabcontent">
	<p>Hello world</p>
		<?php include('view.php') ?>
	</div>

<div id="Paris" class="tabcontent">
 <?php include('adminViewRequests.php') ?>
</div>

<div id="Tokyo" class="tabcontent">
  <?php include('register.php') ?>
</div>
<div id="Insert" class="tabcontent">
	<?php include('insert.php') ?>
</div>

</body>
</html>
