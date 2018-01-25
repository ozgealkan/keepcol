<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KeepCollection</title>
    <link rel="Shortcut Icon" href="img/logo.png" type="image/x-icon">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli&subset=latin,latin-ext" rel="stylesheet">

    <link href="css/new-age.min.css" rel="stylesheet">
  
  <?php include 'css_back/css.html'; 
 ; ?>
</head>
<body> 

 <?php
 session_start();
 $host = 'localhost';
$user = 'root';
$pass = '';
$db = 'accounts';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$baglan=mysqli_connect("localhost","root","","accounts");  

$ca = curl_init();
curl_setopt($ca, CURLOPT_URL, "http://api.themoviedb.org/3/configuration?api_key=f801b965af203c780135ad964ffd19ce");
curl_setopt($ca, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ca, CURLOPT_HEADER, FALSE);
curl_setopt($ca, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response = curl_exec($ca);
curl_close($ca);
 ?>
      <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    
                </div>
                <div class="form">
                <?php


     
    $config = json_decode($response, true);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$email=$_SESSION['email'] ;
    $idt=$_GET['idk'] ;
    $sonuc=mysqli_query($baglan,"SELECT * FROM books,users WHERE books.id='$idt' AND users.email='$email'");
    

    while($tv = mysqli_fetch_array($sonuc)){
                 
       $id=$tv["id"] ;            

$sqlekle="INSERT INTO book_user(book_id,user_id) 
VALUES ('$idt','$id')";
                  

$sonuc=mysqli_query($baglan,$sqlekle);
}

 /*if (isset($_GET['movie'])) {
        $movieId = $_GET['movie'];

        $sonuc = mysqli_query($con,"SELECT id FROM users WHERE email='$email'");
        $id = mysqli_fetch_array($sonuc)['id'];

        $tv_query = mysqli_query($con,"SELECT id FROM tvshow WHERE tvid='$movieId'");
        $tv_id = mysqli_fetch_array($tv_query)['id'];

        $sqlekle = "INSERT INTO users_tv(users_id, tv_id) VALUES ('$id', '$tv_id')";
        $isAdded = mysqli_query($con, $sqlekle);

    }*/

    if (isset($_GET['idk'])) {
        $idt = $_GET['idk'];
        $sonuc = mysqli_query($con,"SELECT * FROM tvshow,users WHERE tvshow.id='$idt' AND users.email='$email'");
        
        while($tv = mysqli_fetch_array($sonuc)){
            $id = $tv["id"];
            $sqlekle = "INSERT INTO users_tv(tv_id,users_id) VALUES ('$idt','$id')";
            $sonuc = mysqli_query($con,$sqlekle);
        }
    }
header("location: getbook.php");
                   ?>
      
      
      <div class="tab-content">

         <div id="login">   
          
          
          

        </div>  
        
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
    </header>