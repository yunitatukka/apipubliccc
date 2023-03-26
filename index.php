<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Yunita </title>
</head>
<h2>Selamat datang di website saya </h2>


<body>
<div class="back">


    <h1>ANDA INGIN MENCARI FILM <p> SILAHKAN CARI DI BAWAH INI </p></h1>
    <form method="post" action="index.php">
        <input type="text" name="judul"></input>
        <input type="submit" value="cari" class="btn btn-light" name="cari"></input>
    </form>

    <?php
        if(isset($_POST['cari'])){
            $judul = $_POST['judul'];
            echo "<h3>Silahkan lihat film yang sesuai</h3>";

            $url = 'http://www.omdbapi.com/?apikey=202bed7d&s="'.$judul.'"';

           //Akses API dengan CURL
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);

            // var_dump($output);
            $data = json_decode($output, TRUE);
            // $data = $data['Search'];
?>
          
 <div class="container">
            <div class="row">
                
    <?php       foreach ($data['Search'] as $movie) {
  
                ?>
    <div class="shadow p-4 mb-4 ml-4 mr-4 bg-white rounded">  
       <div class="row cal-3 mt-3">
        <div class="card bg-light mr-3" style="width: 16rem;" >
  <img src="<?php echo $movie['Poster'].'';?>" >
  <div class="card-body">
    <h5 class="card-title"><?php echo "\n <p>Judul: ".$movie["Title"]."</p>";?></h5>
    <p class="card-text"><?php   echo "<p>Tahun: ".$movie["Year"]."</p>";?></p>
  
    </div>
</div>
</div>
</div> 
        
       
       
        <?php
    } 
    ?>
    <?php
    }
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>
