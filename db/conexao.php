<?php
//Como conectar o banco de dados Sql com php
   $modo = "local";

   if($modo =="local"){
      $servidor = "localhost";
      $usuario = "root";
      $senha = "";
      $banco = "loja";
   }
   try{
      $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
      $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Banco conectado com sucesso!";
   } catch(PDOException $erro){
      echo "Falha ao conectar no banco!";
   }