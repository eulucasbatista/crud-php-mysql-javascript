<?php  

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "crud_php_javascript";
$port = 3306;


    try {
         // conexão com a porta
        //$conn = new PDO("mysql)

        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
       
       // echo "Conexão com o banco de dados realizada com sucesso!";
    } catch (PDOException $err) {
      //  echo "Erro: Conexão com o banco de dados não realizada com sucesso. Erro gerado: " . $err->getMessage();
}



