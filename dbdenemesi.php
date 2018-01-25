
<?php
            
          $con=mysqli_connect("localhost","root","","accounts");
// Check connection
$ca = curl_init();
curl_setopt($ca, CURLOPT_URL, "http://api.themoviedb.org/3/configuration?api_key=f801b965af203c780135ad964ffd19ce");
curl_setopt($ca, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ca, CURLOPT_HEADER, FALSE);
curl_setopt($ca, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response = curl_exec($ca);
curl_close($ca);

$config = json_decode($response, true);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries 
$sonuc=mysqli_query($con,"SELECT * FROM tvshow");
while($tv = mysqli_fetch_array($sonuc))
{
                   
     
                         


echo("<img src='" . $config['images']['base_url'] . $config['images']['poster_sizes'][2] . $tv['tvposterpath'] ."'/>");
echo  $tv["tvname"]."<br>"."<br />"."<br />";
echo  $tv["tvaverage"]."<br />"."<br />"."<br />";

}
mysqli_close($con);
?>