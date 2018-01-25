<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'movie';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
 $con=mysqli_connect("localhost","root","","movie");
// Check connection
$ca = curl_init();
curl_setopt($ca, CURLOPT_URL, "http://api.themoviedb.org/3/configuration?api_key=f801b965af203c780135ad964ffd19ce");
curl_setopt($ca, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ca, CURLOPT_HEADER, FALSE);
curl_setopt($ca, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response = curl_exec($ca);
curl_close($ca);
//var_dump($response);
$config = json_decode($response, true);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries 

	?>
<a href=<?php 
$name= $tv["tvname"]  ;
$id= $tv["id"] ;
$posterpath=$tv["tvposterpath"] ;

    $sqlekle="INSERT INTO click( tvname, tvid, posterpath) 
VALUES ('$name','$id','$posterpath')"; ?>>
    <?php      
    $sqlekle="INSERT INTO click( tvname, tvid, posterpath) 
VALUES ('$name','$id','$posterpath')";                    




}
mysqli_close($con);
?>







