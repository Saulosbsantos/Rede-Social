<?php 

# nome do servidor
$sName = "localhost";
# nome do usuário
$uName = "id22076095_root
";
# senha
$pass = "Sa123@$+";

# nome do banco de dados
$db_name = "id22076095_univibe";

# criando conexão com o banco de dados
try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Falha na conexão: ". $e->getMessage();
}
?>
