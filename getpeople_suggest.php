<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KeepCollection</title>
    <?php include 'css_back/css.html'; ?>
    <link rel="Shortcut Icon" href="img/logo.png" type="image/x-icon">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli&subset=latin,latin-ext" rel="stylesheet">

    <link href="css/new-age.min.css" rel="stylesheet">

</head>
<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menü <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img src="img/logo.png" class="img-responsive" alt="" width="50"></a>
                <h3 style="width:500px"><b>KeepCollection</b></h3>
            </div> 
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="mycollection.php" class="page-scroll" href="#features">MY COLLECTION</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#top">PEOPLE</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="getfollowing.php">FOLLOWING</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<?php
session_start();            
$con=mysqli_connect("localhost","root","","accounts");
// Check connection
$ca = curl_init();
curl_setopt($ca, CURLOPT_URL, "http://api.themoviedb.org/3/configuration?api_key=f801b965af203c780135ad964ffd19ce");
curl_setopt($ca, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ca, CURLOPT_HEADER, FALSE);
curl_setopt($ca, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response = curl_exec($ca);
curl_close($ca);
//var_dump($response);

?>
<header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    
                </div>
<div class="form">

<?php
    $likedMovies = [];
    $possiblePerson = [];
    $suggest = [];
    $email = $_SESSION['email'] ;    
    $userId = mysqli_fetch_array(mysqli_query($con, "SELECT id FROM users WHERE email ='$email'"))['id'];

    $getLikes = mysqli_query($con, "SELECT * FROM users_tv WHERE users_id ='$userId' AND likes = '1'");
    while ($getLikesResult = mysqli_fetch_array($getLikes)) {
         array_push($likedMovies, $getLikesResult['tv_id']); 
    }

   foreach ($likedMovies as $key => $value) {
        $getLikedUsers = mysqli_query($con, "SELECT users_id FROM users_tv WHERE tv_id = '$value' AND likes = '1'");
        while ($likedUsersResult = mysqli_fetch_array($getLikedUsers)) {
            array_push($possiblePerson, $likedUsersResult['users_id']); 
        }
   }

   foreach ($likedMovies as $key => $value) {
        $getLikedUsers = mysqli_query($con, "SELECT user_id FROM users_movie WHERE movie_id = '$value' AND like_movie = '1'");
        while ($likedUsersResult = mysqli_fetch_array($getLikedUsers)) {
            array_push($possiblePerson, $likedUsersResult['user_id']); 
        }
   }
   foreach ($likedMovies as $key => $value) {
        $getLikedUsers = mysqli_query($con, "SELECT user_id FROM book_user WHERE book_id = '$value' AND book_likes = '1'");
        while ($likedUsersResult = mysqli_fetch_array($getLikedUsers)) {
            array_push($possiblePerson, $likedUsersResult['user_id']);
            
        }
   }


   $countedPersons = array_count_values($possiblePerson);

   foreach ($countedPersons as $key => $value) {

        if ($value >= 3  && $key != $userId) {
            $user = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id ='$key'"));
            array_push($suggest, $user);
        }
    }

    foreach ($suggest as $key => $value) {
        ?>
<a href="followingcol.php?idk=<?=$tv['id']?>">Follow <?php echo "<br>";?></a>
 
<a href="people_mycollection.php?idm=<?=$likedUsersResult['users_id']?>"> <?php echo $value['first_name'].' '. $value['last_name'] ; echo "<br>";?> </a><?php  echo "<br>" ;

      
    }
?>
<?php mysqli_close($con);?>
