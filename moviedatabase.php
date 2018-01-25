<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'accounts';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$baglan=mysqli_connect("localhost","root","","accounts"); 

for($p=19;$p<40;$p++){
$json_url = "https://api.themoviedb.org/3/movie/popular?page=$p&language=en-US&api_key=f801b965af203c780135ad964ffd19ce"; 
$json_file = file_get_contents($json_url, true);
$movies = json_decode($json_file);


for($i=0;$i<10;$i++){

$name= $movies -> results[$i]->title;
$posterpath= $movies -> results[$i]->poster_path;
$average= $movies -> results[$i]->vote_average;
$id= $movies -> results[$i]->id;

$sqlekle="INSERT INTO movie(movieid,moviename, posterpath,movieaverage) 
VALUES ('$id','$name','$posterpath','$average')";
$sonuc=mysqli_query($baglan,$sqlekle);
}
}
if ($sonuc==0)
     echo "Eklenemedi, kontrol ediniz";
else
     echo "Başarıyla eklendi";

 ?>