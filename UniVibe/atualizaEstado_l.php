<?php

    session_start();
    
    //Verificando se usuario está logado
    if (isset($_SESSION['usuario']))
    {
        //Conexao com banco de dados
        include 'banco.php';

        $id = $_SESSION["id_usuario"];

        $sql = "UPDATE usuarios
                SET  t_logado = NOW()
                WHERE id_usuario = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

    }else{
        
        header("Location: index.php");
        exit;
    }

?>