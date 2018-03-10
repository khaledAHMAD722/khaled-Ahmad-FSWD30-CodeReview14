<?php
  ob_start();
  session_start();
require_once 'actions/db_coonect.php';

  // if session is not set this will redirect to login page
  if( isset($_SESSION['user']) ) {
   
  // select logged-in admin detail
  $query = "SELECT * FROM admin WHERE id=".$_SESSION['user'];
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userID = $userRow['id'];
    
}else{

    $userD = 0;
}

?>


<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Code Review 14</title>
		<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
		<meta name="description" content="Fullscreen Pageflip Layout with BookBlock" />
		<meta name="keywords" content="fullscreen pageflip, booklet, layout, bookblock, jquery plugin, flipboard layout, sidebar menu" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.custom.css" />
		<link rel="stylesheet" type="text/css" href="css/bookblock.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		 
		 <link rel="stylesheet" href="css/cardstyle.css">
		<script src="js/modernizr.custom.79639.js"></script>
		
	</head>
	<body>
		<div id="container" class="container">	

			<div class="menu-panel">
				<h3>Table of Events</h3>
				<ul id="menu-toc" class="menu-toc">
					<li class="menu-toc-current"><a href="#item1">All evants</a></li>
					<li><a href="#item2">Concert</a></li>
					<li><a href="#item3">Art</a></li>
					<li><a href="#item4">Sport</a></li>
					<li><a href="#item5">Festival</a></li>
				</ul>
				
			</div>

			<div class="bb-custom-wrapper">
				<div id="bb-bookblock" class="bb-bookblock">
					<div class="bb-item" id="item1">
						<div class="content">
							<div class="scroller">
								<h2>Code Reveiw 14</h2>

								<body>

								<div class="header">
								 <p>ALL Events</p>
								</div>

								<div class="row">								  
			<?php

            $sql = "SELECT * FROM event ";

            $result = $conn->query($sql);

            if($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                   
               echo '
               <div class="column">
					<div class="card">
									
									  <div class="products">
									    <div class="product active" product-id="1" product-color="#D18B49">
									      <div class="thumbnail"><img src="'.$row["image"].'"/></div>
									      <h1 class="title">'.$row["name"].'</h1>
									      <p>Start date '.$row["start_date"].'</p>
									      <p>End date '.$row["end_date"].'</p>
									      <p>Type '.$row["type"].'</p>
									    </div>
									  </div>
									  <div class="footer"><a class="btn" id="edit" href="edit.php?id='.$row["id"].'" ripple="" ripple-color="#666666">Edit</a>
									  <a class="btn" id="next" href="delete.php?id='.$row["id"].'" ripple="" ripple-color="#666666">Delete</a></div>
									</div>
								  </div>              
               ';


 
                 }
             }else {

                    echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

                }

                ?>

								  									</div>

								<div class="footer">
								  <p>Footer</p>
								</div>

								</body>
								
							</div>
						</div>
					</div>
					<div class="bb-item" id="item2">
						<div class="content">
							<div class="scroller">
								<h2>Code Reveiw 14</h2>

								<body>

								<div class="header">
								 <p>Concert</p>
								 
								</div>



								<div class="row">
								 <?php

            $sql1 = "SELECT * FROM event WHERE type='Concert' ";

            $result1 = $conn->query($sql1);

            if($result1->num_rows > 0) {

                while($row1 = $result1->fetch_assoc()) {

                 
                   
               echo '
               <div class="column">
					<div class="card">
									
									  <div class="products">
									    <div class="product active" product-id="1" product-color="#D18B49">
									      <div class="thumbnail"><img src="'.$row1["image"].'"/></div>
									      <h1 class="title">'.$row1["name"].'</h1>
									      <p>Start date '.$row1["start_date"].'</p>
									      <p>End date '.$row1["end_date"].'</p>
									      <p>Type '.$row1["type"].'</p>
									    </div>
									  </div>
									   <div class="footer"><a class="btn" id="edit" href="edit.php?id='.$row["id"].'" ripple="" ripple-color="#666666">Edit</a>
									  <a class="btn" id="next" href="delete.php?id='.$row["id"].'" ripple="" ripple-color="#666666">Delete</a></div>
									</div>
								  </div>              
               ';

          
 
                 }
             }else {

                    echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

                }

                ?>

								</div>

								<div class="footer">
								  <p>Footer</p>
								</div>

								</body>
								
							</div>
						</div>
					</div>
					<div class="bb-item" id="item3">
						<div class="content">
							<div class="scroller">
								<h2>Code Reveiw 14</h2>

								<body>

								<div class="header">
								<p>Art</p>
								</div>



								<div class="row">
									 <?php

            $sql2 = "SELECT * FROM event WHERE type='Art' ";

            $result2 = $conn->query($sql2);

            if($result2->num_rows > 0) {

                while($row2 = $result2->fetch_assoc()) {

                   
               echo '
               <div class="column">
					<div class="card">
									
									  <div class="products">
									    <div class="product active" product-id="1" product-color="#D18B49">
									      <div class="thumbnail"><img src="'.$row2["image"].'"/></div>
									      <h1 class="title">'.$row2["name"].'</h1>
									      <p>Start date '.$row2["start_date"].'</p>
									      <p>End date '.$row2["end_date"].'</p>
									      <p>Type '.$row2["type"].'</p>
									    </div>
									  </div>
									   <div class="footer"><a class="btn" id="edit" href="edit.php?id='.$row["id"].'" ripple="" ripple-color="#666666">Edit</a>
									  <a class="btn" id="next" href="delete.php?id='.$row["id"].'" ripple="" ripple-color="#666666">Delete</a></div>
									</div>
								  </div>              
               ';

 
                 }
             }else {

                    echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

                }

                ?>
								</div>

								<div class="footer">
								  <p>Footer</p>
								</div>

								</body>
								
							</div>
						</div>
					</div>
					<div class="bb-item" id="item4">
						<div class="content">
							<div class="scroller">
								<h2>Code Reveiw 14</h2>

								<body>

								<div class="header">
								 <p>Sport</p>
								</div>



								<div class="row">
									<?php

            $sql3 = "SELECT * FROM event WHERE type='Sport' ";

            $result3 = $conn->query($sql3);

            if($result3->num_rows > 0) {

                while($row3 = $result3->fetch_assoc()) {

                    
                   
               echo '
               <div class="column">
					<div class="card">
									
									  <div class="products">
									    <div class="product active" product-id="1" product-color="#D18B49">
									      <div class="thumbnail"><img src="'.$row3["image"].'"/></div>
									      <h1 class="title">'.$row3["name"].'</h1>
									      <p>Start date '.$row3["start_date"].'</p>
									      <p>End date '.$row3["end_date"].'</p>
									      <p>Type '.$row3["type"].'</p>
									    </div>
									  </div>
									   <div class="footer"><a class="btn" id="edit" href="edit.php?id='.$row["id"].'" ripple="" ripple-color="#666666">Edit</a>
									  <a class="btn" id="next" href="delete.php?id='.$row["id"].'" ripple="" ripple-color="#666666">Delete</a></div>
									</div>
								  </div>              
               ';
 
                 }
             }else {

                    echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

                }

                ?>
								</div>

								<div class="footer">
								  <p>Footer</p>
								</div>

								</body>
								
							</div>
						</div>
					</div>
					<div class="bb-item" id="item5">
						<div class="content">
							<div class="scroller">
								<h2>Code Reveiw 14</h2>

								<body>

								<div class="header">
								 <p>Festival</p>
								</div>



								<div class="row">
									<?php

            $sql4 = "SELECT * FROM event WHERE type='Festival' ";

            $result4 = $conn->query($sql4);

            if($result4->num_rows > 0) {

                while($row4 = $result4->fetch_assoc()) {

                    
                   
               echo '
               <div class="column">
					<div class="card">
									
									  <div class="products">
									    <div class="product active" product-id="1" product-color="#D18B49">
									      <div class="thumbnail"><img src="'.$row4["image"].'"/></div>
									      <h1 class="title">'.$row4["name"].'</h1>
									      <p>Start date '.$row4["start_date"].'</p>
									      <p>End date '.$row4["end_date"].'</p>
									      <p>Type '.$row4["type"].'</p>
									    </div>
									  </div>
									   <div class="footer"><a class="btn" id="edit" href="edit.php?id='.$row["id"].'" ripple="" ripple-color="#666666">Edit</a>
									  <a class="btn" id="next" href="delete.php?id='.$row["id"].'" ripple="" ripple-color="#666666">Delete</a></div>
									</div>
								  </div>              
               ';

               
 
                 }
             }else {

                    echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

                }

                ?>
								</div>

								<div class="footer">
								  <p>Footer</p>
								</div>

								</body>
								
							</div>
						</div>
					</div>
				</div>
				
				<nav>
					<span id="bb-nav-prev">&larr;</span>
					<span id="bb-nav-next">&rarr;</span>
					<a href="add.php"><span><i class="fal fa-plus-octagon">add</i></span></a>
				</nav>

				<span id="tblcontents" class="menu-button">Table of Contents</span>

			</div>
				
		</div><!-- /container -->
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/jquery.mousewheel.js"></script>
		<script src="js/jquery.jscrollpane.min.js"></script>
		<script src="js/jquerypp.custom.js"></script>
		<script src="js/jquery.bookblock.js"></script>
		<script src="js/page.js"></script>
		<script>
			$(function() {

				Page.init();

			});
		</script>
	</body>
</html>
