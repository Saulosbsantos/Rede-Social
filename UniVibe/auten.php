<?php
session_start();

    if (isset ($_POST['usuario']) && isset($_POST['senha']))
    {
        //Banco de dados
        include 'banco.php';

        $senha = $_POST['senha'];
        $usuario = $_POST['usuario'];

        if(empty($usuario))
        {


            $em = "Usuario obrigatorio";
            header("Location: index.php?error=$em");

        }else if(empty($senha)){
            
            $em = "Senha obrigatorio";
            header("Location: index.php?error=$em");
        
        }else{

            $sql = "SELECT * FROM
                    usuarios WHERE usuario=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$usuario]);

            if($stmt->rowCount() === 1)
            {

                $usuario_bd = $stmt->fetch();

                if($usuario_bd['usuario'] === $usuario)
                {
                    if(password_verify($senha, $usuario_bd['senha']))
                    {
                        
                        $_SESSION['usuario'] = $usuario_bd['usuario'];
                        $_SESSION['nome'] = $usuario_bd['nome'];
                        $_SESSION['id_usuario'] = $usuario_bd['id_usuario'];

                        header("Location: home.php");
                        

                    }else{

                        $em = "Usuario ou Senha está errada";
                        header("Location: index.php?error=$em");
                    }

                }else{

                    $em = "Usuario ou Senha está errada";

                    header("Location: index.php?error=$em");

                }
            }
        }
    }else{

        header("Location: index.php");
        exit;

    }


?>