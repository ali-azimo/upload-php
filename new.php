<?php
    $msg = "";
    //Caso sej precionada o botao seja processada
    if(isset($_POST['upload'])){
        //O Caminho para armazenar a imagem
        $target = 'images/'.basename($_FILES['image']['name']);

        //Conectar ao banco de dados
        $db = mysqli_connect("localhost", "root", "", "photos");
            echo "Conectado com sucesso";

        //obter todos dados submetido no formulario
        $image = $_FILES['image']['name'];
        $text = $_POST['text'];

        //Armazenas os dados submetidos no banco de dados
        $sql = "INSERT INTO images (images, text) VALUES ('$image', '$text')";
        mysqli_query($db, $sql);

        //Armazenar os daods processados uma pasta de images
        if(move_uploaded_file($_FILES["image"]['tmp_name'], $target)){
            $msg = "Imagem processada com sucesso";
        }else{
            $msg = "Falha ao processar o armazenamento";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Upload images</title>
</head>
<body>
    <div class="content">
        <?php
            $db = mysqli_connect("localhost", "root", "", "photos");
            $sql = "SELECT * FROM images";
            $result = mysqli_query($db, $sql);
            
            while($row = mysqli_fetch_array($result)){
               echo "<div class='img_div'>";
                    echo "<img src='images/".$row['images']."'>";
                    echo "<p>".$row['text']."</p>";
                echo "</div>";
            }
        ?>

        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <textarea name="text" id="" cols="40" rows="4" placeholder="Diga...">

                </textarea>
            </div>
            <div>
                <input type="submit" name="upload" value="Upload Image">
            </div>
        </form>
    </div>
</body>
</html>