<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<?php include 'css_back/css.html'; ?>
    <title>KeepCollection</title>
    <link rel="Shortcut Icon" href="img/logo.png" type="image/x-icon">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli&subset=latin,latin-ext" rel="stylesheet">

    <link href="css/new-age.min.css" rel="stylesheet">
  
  
 
</head>
<body> 

 <?php
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
//var_dump($response);
$config = json_decode($response, true);
//print_r($config);
//$base = $config['base_url'];
//echo($base);

$tv_name=$_POST['tv_name'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/search/tv?query=$tv_name&language=en-US&api_key=f801b965af203c780135ad964ffd19ce");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response, true);
//print_r($result);
//var_dump($response);

      ?>
      <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    
                </div>
                <div class="form">

<?php 
    if (count($result) > 10) {
        for($i = 0; $i < 10; $i++) {
            echo "<img src='" . $config['images']['base_url'] . $config['images']['poster_sizes'][2] . $result['results'][$i]['poster_path'] . "'/>";

            $average = $result['results'][$i]['vote_average'] ;
            $name = $result['results'][$i]['name'] ;
            $posterpath = $result['results'][$i]['poster_path'] ;
            $id = $result['results'][$i]['id'] ;

            $sqlekle = "INSERT INTO tvshow(tvid,tvname,tvposterpath, tvaverage) VALUES ('$id','$name','$posterpath','$average')";
            $sonuc = mysqli_query($baglan, $sqlekle);

?> <a href="tvcol.php?movie=<?=$result['results'][$i]['id']?>">ADD </a> <?php
        }
    } else {
        foreach ($result['results'] as $movie) {
            echo "<img src='" . $config['images']['base_url'] . $config['images']['poster_sizes'][2] .$movie['poster_path'] . "'/>";

            $average = $movie['vote_average'] ;
            $name = $movie['name'] ;
            $posterpath = $movie['poster_path'] ;
            $id = $movie['id'] ;
?> <a href="tvcol.php?movie=<?=$movie['id']?>">&nbsp&nbspADD &nbsp&nbsp&nbsp</a> <?php echo "<br>";

            $sqlekle = "INSERT INTO tvshow(tvid,tvname,tvposterpath, tvaverage) VALUES ('$id','$name','$posterpath','$average')";
            $sonuc = mysqli_query($baglan, $sqlekle);
        }
    }
?>
        <div class="tab-content">
            <div id="login"></div>  
        </div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</header>