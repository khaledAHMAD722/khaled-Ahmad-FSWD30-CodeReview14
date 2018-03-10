<?php
$id = $_GET['id'];

?>


<?php
  ob_start();
  session_start();
    include_once 'actions/db_coonect.php';

    if( isset($_SESSION['user']) ) {
   
  // select logged-in admin detail
  $query = "SELECT * FROM admin WHERE id=".$_SESSION['user'];
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userID = $userRow['id'];
  $userD =$userRow['delete'];

}else{
 $query = "SELECT * FROM admin WHERE id=1";
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userID = $userRow['id'];
  $userD =0;
};


  $filter = "all";

  $query1 = "SELECT * FROM event WHERE id=".$id;
  $res1 = mysqli_query($conn, $query1);
  $row1 = mysqli_fetch_assoc($res1);
  $userID1 = $row1['id'];


  ?>
  <html>
<title>Layout</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1,h2,h3,h4,h5,h6 {
    font-family: "Playfair Display";
    letter-spacing: 5px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="#home" class="w3-bar-item w3-button">CodeReview 14</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="index.php" class="w3-bar-item w3-button">Home</a>
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#menu" class="w3-bar-item w3-button">Details</a>
      <a href="#contact" class="w3-bar-item w3-button">Contact</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:700px" id="home">
  <img src='<?php echo $row1["header_img"]; ?>' alt="" width="1600" height="700">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge"><?php echo $row1["name"]; ?></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src='<?php echo $row1["image"]; ?>' class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About <?php echo $row1["name"]; ?></h1><br>
      <h5 class="w3-center"><?php echo $row1["type"]; ?></h5>
      <p class="w3-large"><?php echo $row1["description"]; ?></p>
    </div>
  </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Details</h1><br>
      <h4>Start Date</h4>
      <p class="w3-text-grey"><?php echo $row1["start_date"]; ?></p><br>
    
      <h4>End Date</h4>
      <p class="w3-text-grey"><?php echo $row1["end_date"]; ?></p><br>
    
      <h4>Address</h4>
      <p class="w3-text-grey"><?php echo $row1["address"]; ?></p><br>
      <p class="w3-text-grey"><?php echo $row1["city"]; ?></p><br>
    
      <h4>Email</h4>
      <p class="w3-text-grey"><?php echo $row1["contact_email"]; ?></p><br>
    
      <h4>Web Site Address</h4>
      <p><a href="<?php echo $row1["url"]; ?>"><?php echo $row1["url"]; ?></a></p>   
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="https://media.gettyimages.com/vectors/mediterranean-cartoon-map-vector-id484915506" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
    </div>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contact</h1><br>
    <p>We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste. Do not hesitate to contact us.</p>
    <p class="w3-text-blue-grey w3-large"><b><?php echo $row1["address"]; ?>, <?php echo $row1["city"]; ?></b></p>
    <p>You can also contact us by phone <?php echo $row1["contact_phone"]; ?> or email <?php echo $row1["contact_email"]; ?> or you can send us a message here:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="number" placeholder="How many people" required name="People"></p>
      <p><input class="w3-input w3-padding-16" type="datetime-local" placeholder="Date and time" required name="date" value="2017-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
 
</footer>
<?php
?>
</body>
</html>