<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="data.css">
    <title>Dados completo</title>
</head>
<body>
<div class="container">
    <h2 class='text'>Nossos Cursos</h2>
    <div class="content">
    <?php
            $db = mysqli_connect("localhost", "root", "", "loja");
            $sql = "SELECT * FROM comercio";
            $result = mysqli_query($db, $sql);
            
            while($row = mysqli_fetch_array($result)){
                echo "<div class='img-detail'>";
                    echo "<img src='img/".$row['img_infor']."'>";
                    echo "<h5>".$row['name_product']."</h5>";
                echo "</div>";
            }
        ?>
        
    </div>
       
    </div>    
    <a href="index.php">pagina inicial</a>
</body>
</html>