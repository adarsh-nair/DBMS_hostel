<?php
require_once('connect.php');
?>
<!DOCTYPE html>
<html>
<title>Home away from Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="auto_style.css">

<style>
.mySlides {display:none;}
</style>

<body>
<!Navigation Bar>
<ul class="nav-ul">
	<li><a href="#">HOME AWAY FROM HOME</a></li>  
	<li style="float:right"><a href="#contact">CONTACT</a></li>
	<li class="dropdown" style="float:right">
		<a href="javascript:void(0)" class="dropbtn">LOGIN</a>
		<div class="dropdown-content">
			<a href="login.php">STUDENT</a>
			<a href="staff_login.php">STAFF</a>
		</div>
  <li class="dropdown" style="float:right">
    <a href="javascript:void(0)" class="dropbtn">FACILITIES</a>
    <div class="dropdown-content">
      <a href="#canteen">CANTEEN</a>
      <a href="#laundry">LAUNDRY</a>
      <a href="#trans">TRANSPORTATION</a>
			<a href="#visitor">VISITOR STAY</a>
			<a href="#misc">MISCELLANEOUS</a>
    </div>
  </li>
	<li style="float:right"><a href="#about">ABOUT</a></li>
	<li style="float:right"><a href="#home">HOME</a></li>
</ul>

<!Slide Show>

<div class="slide" id="home">
  <img class="mySlides" src="./img/bldg.jpg" style="width:100%; height: 600px;">
  <img class="mySlides" src="./img/room.jpg" style="width:100%; height: 600px;">
  <img class="mySlides" src="./img/diner.jpg" style="width:100%; height: 600px;">
</div>
<div class="about" id="about">
	<div class="about_content">
		<h2>ABOUT US </h2>
		<p>
			Write the information here!
			<br>
			<button onclick="document.getElementById('enquiry').style.display='block'" class="btn-submit" style="color: white">ENQUIRE NOW!!</button>
		</p>
	</div>
</div>

<div class="fac" id = "facilities">
	<center><h1 style="background-color:#123454; color:white">FACILITIES</h1></center>	
	<div class="row">
	<div class="col-lg-2" id="canteen">
  <div class="card slide-center slide-top" style="width:250px; height: 450px">
    <img src="./img/canteen.jpg" alt="Person" style="width:230px; height: 150px; padding-left:10px">
    <div class="container format">
      <h4><b>CANTEEN</b></h4>
      <p>Canteen food is considered one of the biggest taboos for any student. An integrated hostel and mess system forces the child to cumpulsorily pay for the mess. Wouldn't it be better if they could decide whether they wanted to eat in the mess or not and pay for only the meals they have!!
		</p>
		<center>
				<button onclick="document.getElementById('id01').style.display='block'" class="btn-submit">Today's Menu</button>
			</center>
			<div id="id01" class="modal" style="padding-top:180px;">
				<div class="modal-content">
					<header class="container" style="background-color:#0099cc"> 
						<span onclick="document.getElementById('id01').style.display='none'" 
						class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
						<h2 style="padding-left:30px; color: #fff">Menu</h2>
					</header>
					<div class="container"style="padding-left:30px;"> 
						<p>
						<?php 
						$menu = 'SELECT * FROM `Menu` WHERE `m_date` = \''.date("Y-m-d").'\';';
						$out = $connect->query($menu);
						$row = $out->fetch_assoc();
						$i = 1;
						echo '<h3>Lunch:</h3>';
						echo '<h4 style="padding-left: 10px">'.$row["l_item1"]."</h4>";
						echo '<h4 style="padding-left: 10px">'.$row["l_item2"]."</h4>";
						if($row["l_item3"])
							echo '<h4 style="padding-left: 10px">'.$row["l_item3"]."</h4>";
						echo '<h3>Dinner:</h3>';
						echo '<h4 style="padding-left: 10px">'.$row["d_item1"]."</h4>";
						echo '<h4 style="padding-left: 10px">'.$row["d_item2"]."</h4>";
						if($row["d_item3"])
							echo '<h4 style="padding-left: 10px">'.$row["d_item3"]."</h4>";
						?>					
						</p>
					</div>
					<footer class="container" style="background-color:#0099cc; color:#fff">
						<p style="padding-left:30px;">Students can choose to have lunch or dinner or both by selecting the option form the canteen tab present in their profile before 10 o'clock in the morning.</p>
					</footer>
				</div>
			</div>
    </div>
  </div>
	</div>
	<div class="col-lg-2" id="laundry">
	<div class="card slide-center slide-bottom" style="width:250px; height: 450px;">
    <img src="./img/laundry.jpg" alt="Person" style="width:230px; height: 150px;padding-left:10px">
    <div class="container format">
      <h4><b>LAUNDRY</b></h4>
      <p>Crumpled and dirty clothes can convert a sunny day into a gloomy one. The in-house laundry pledges it's commitment to provide your clothes with the best possible care</p>
    </div>
  </div>
	</div>
	<div class="col-lg-2" id="trans">
  <div class="card slide-center slide-top" style="width:250px; height: 450px;">
    <img src="./img/two_whe.jpg" alt="Person" style="width:230px; height: 150px;padding-left:10px">
    <div class="container format">
      <h4><b>TRANSPORTATION</b></h4>
      <p>In a city like Pune, transportation facilities play an important role. Students require reliable means to commute but buy a two-wheeler isn't the best alternative. The hostel has it's own fleet of two-wheelers which the students can rent at reasonable rates.</p>
    </div>
  </div>
	</div>
	<div class="col-lg-2" id="visitor">
	<div class="card slide-center slide-bottom" style="width:250px; height: 450px;">
    <img src="./img/parents.png" alt="Person" style="width:230px; height: 150px;padding-left:10px">
    <div class="container format">
      <h4><b>VISTORS</b></h4>
      <p>Usually when parents come to stay with their children they have to use hotel rooms which prove to be quite expensive. The hostel has some buffer rooms that the hostel allocates to the parents so that they can stay in the same premises.</p>
    </div>
  </div>
	</div>
	<div class="col-lg-2" id="misc">
	<div class="card slide-center slide-top" style="width:250px; height: 450px;">
    <img src="./img/groceries.png" alt="Person" style="width:230px; height: 150px;padding-left:10px">
    <div class="container format">
      <h4><b>MISCELLANEOUS</b></h4>
      <p>Wish you had some bread, butter and cheese to fix your self a sandwich, just drop in a list of items in your cart. You'll have your items by noon.</p>
    </div>
  </div>
	</div>
</div>
	<div id="enquiry" class="modal" >
		<div class="modal-content">
			<header class="container" style="background-color:#0099cc"> 
				<span onclick="document.getElementById('enquiry').style.display='none'" 
				class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
				<h2 style="padding-left:30px; color: #fff">ENQUIRE NOW</h2>
			</header>
			<div class="container"> 
				<form style="padding-left:20px;" action="/Hostel/equiry.php" method="post">
				<div class="form-group">
					Name:
					<input type="text" name="name" class="form-control" required>
				</div>
				<div class="form-group">
					Contact:
					<input class="form-control" type="text" name="contact" pattern="[789]{1}[0-9]{0-9}" required>
				</div>
				<div class="form-group">
					Email ID:
					<input type="text" name="email" class="form-control" required pattern="[A-Za-z0-9._]{5,15}@[a-z]{4,9}.[a-z]{2,4}">
				</div>
				<div class="form-group">
					Enquiry:
					<input type="textbox" name="comment" class="form-control">
				</div>
				<center><button class="btn-submit" type ="submit" style="color:#fff;">SUBMIT</button></center>
				</form>
			</div>
		</div>
	</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2500); // Change image every 6 seconds
}
</script>
</body>
</html>

