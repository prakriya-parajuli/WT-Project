<?php 
  session_start();
  include 'php/db.php';
  $unique_id = $_SESSION['unique_id'];
  $email = $_SESSION['email'];
  if(empty($unique_id))
  {
      header ("Location: login.php");
  } 
  $qry = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$unique_id}'");
  if(mysqli_num_rows($qry) > 0){
    $row = mysqli_fetch_assoc($qry);
    if($row){
      $_SESSION['Role'] = $row['Role'];
      if($row['verification_status'] != 'Verified')
      {
        header ("Location: verify.php");
      } 
  }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/loader.css" />
    
</head>
<body>  

    <header id="header">
        <a href="#" class="Logo"><h1>Logo</h1></a>
        <nav>
            <ul class="navigation">
                <li><a href="php/logout.php?logout_id=<?php echo $unique_id?>"><button class="logout_btn">Log Out</button></a></li>
            </ul>
        </nav>
    </header>

<section>
    <h2>Welcome : <span><?php echo $email;?></span></h2>
</section>

<div id="loader">
  <div class="loader row-item">
	<span class="circle"></span>
	<span class="circle"></span>
	<span class="circle"></span>
	<span class="circle"></span>
	<span class="circle"></span>
</div>
<script>
    $(document).ready(function() {
    //Preloader
    preloaderFadeOutTime = 1200;
    function hidePreloader() {
    var preloader = $('#loader');
    preloader.fadeOut(preloaderFadeOutTime);
    }
    hidePreloader();
    });
    </script>
</body>
</html>