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
<body> 
<?php


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
$json_url = "https://api.themoviedb.org/3/movie/popular?page=1&language=en-US&api_key=f801b965af203c780135ad964ffd19ce"; 
$json_file = file_get_contents($json_url, true);
$movies = json_decode($json_file);


?>
<header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    
                </div>
                <div class="form">

                    

<?php
 for ($p=1;$p<7;$p++){
    

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/popular?page=$p&language=en-US&api_key=f801b965af203c780135ad964ffd19ce");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response, true);
//print_r($result);
//var_dump($response);

    for($i=0;$i<20;$i++){?>
        <a href="mycollection.php">
                    <img border="0" title= <?php echo ($result['results'][$i]['title']);?>
    
    <?php
echo("<img src='" . $config['images']['base_url'] . $config['images']['poster_sizes'][2] . $result['results'][$i]['poster_path'] . "'/>");
	//echo("<img src='" . $config['images']['base_url'] . $config['images']['poster_sizes'][2] . $result['results'][0]['poster_path'] . "'/>");
echo $movies -> results[$i]->title."<br />"."<br />"."<br />";
echo "Average  =  " , $movies -> results[$i]->vote_average."<br />"."<br />"."<br />";
}

}
?>