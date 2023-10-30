<?php
    require ('db/conexao.php');

    if(isset($_POST["submit"])){
        $text = $_POST["name"];
        if($_FILES["image"]["error"] === 4){
            echo
            "<script>alert('a Image nao existe');</script>";
        }else{
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExtension = ['jpg', 'png', 'jpeg'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension, $validImageExtension)){
                echo
            "<script>alert('Extensao de imagem invalida');</script>";
            }else if ($fileSize > 10000000){
                echo
            "<script>alert('Imagem muito grande minimo 3MB');</script>";
            }else{
                $novoNomeImg = uniqid();
                $novoNomeImg .= "." .$imageExtension;
                move_uploaded_file($tmpName, 'img/' .$novoNomeImg); 
                $query = "INSERT INTO comercio (name_product, img_infor, data_subm) VALUES ('$text','$novoNomeImg' ,'')";
                $modo = mysqli_connect("localhost", "root", "", "loja");
                $inserir  = mysqli_query($modo,$query);   
                echo           
                "<script>alert('Adicionado com sucesso!');
                document.location.href='dada.php';
                </script>";

            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload image</title>
</head>
<body>
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="name">Nome:</label>
        <input type="text" name="name" required>
        </textarea>
        <label for="name">Imagem:</label>
        <input type="file" name="image" id="image" accept=".jpg, .png, .jpeg" require value="">

        <button type="submit" name="submit">Validar dados</button>
    </form>
    <a href="dada.php">Mercado actualizado</a>
</body>
</html>