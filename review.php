<?php
	require_once('connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$rating = $_POST["rating"];
		$name = test_input($_POST["name"]);
		$email = test_input($_POST["email"]);
		$comment = test_input($_POST["comment"]);
		$date = Date("Y-m-d");
		$insert = 'INSERT INTO `Review`(`Rating`, `Comment`, `Name`, `Date`, `Email`) VALUES('.$rating.',\''.$comment.'\',\''.$name.'\',\''.$date.'\',\''.$email.'\')';
		$connect->query($insert);
		echo '<script>window.alert(\'Review submitted\')</script>';
		echo '<script>window.document.location.href=\'auto.php\'</script>';
	}
?>

<div class="container col-lg-4"  style="margin-left:100px;"> 
		<form action="/Hostel/review.php" method="post">
		<header class="form-header" style="margin-left:0px; ">
			<h2>Rate Us</h2>
		</header>
		<br>
		<div class="form-group">
			<p style="margin-bottom:0px;margin-top:0px;">Rating:</p>
			<ul class="rate-area" style="background-color:#dddddd;margin-bottom:0px;margin-top:0px;"">
			<input type="radio" id="5-star" name="rating" value="5" /><label for="5-star" title="Amazing">5 stars</label>
			<input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" title="Good">4 stars</label>
			<input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" title="Average">3 stars</label>
			<input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" title="Not Good">2 stars</label>
			<input type="radio" id="1-star" name="rating" value="1" /><label for="1-star" title="Bad">1 star</label>
			</ul>
			<br>
		</div>
		<div class="form-group">
			<br>
			<p style="margin-bottom:0px;margin-top:0px;">Name:</p>
			<input type="text" name="name" placeholder="Full name please" class="form-control" required>
		</div>
		<div class="form-group">
			Email ID:
			<input type="text" name="email" class="form-control" placeholder="example@here.com" pattern="[A-Za-z0-9._]{5,15}@[a-z]{4,9}.[a-z]{2,4}" required>
		</div>
		<div class="form-group">
			Comment:
			<input type="text" name="comment" class="form-control" placeholder="Comment please!" required>
		</div>
		</form>
	</div>
