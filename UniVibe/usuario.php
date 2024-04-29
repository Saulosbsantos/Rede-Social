<?php

    function  getUsuario($usuario, $conn)
    {

        $sql = "SELECT * 
                FROM usuarios
                WHERE usuario=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario]);

        if($stmt->rowCount() === 1)
        {
            $usuario_bd = $stmt->fetch();
            return $usuario_bd;
        }else{
            $usuario_bd = [];
            return $usuario_bd;
        }

    }
?>