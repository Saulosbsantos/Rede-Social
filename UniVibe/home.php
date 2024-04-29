<?php
    session_start();

    if (isset($_SESSION['usuario'])){

        include 'banco.php';

        include 'usuario.php';
        $usuario_bd = getUsuario($_SESSION['usuario'], $conn);
        //print_r($usuario_bd);
        
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UniVibe - Home</title>
        
        <!-- BOOSTRAP -->
        <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- /BOOSTRAP -->
        <!-- CSS -->
        <link rel = "stylesheet" href = "style.css">
        <!-- /CSS -->
    </head>
    <body class = "d-flex justify-content-center align-items-center vh-100">
            <div class = "p-2 brLogin rounded shadow">

                    <div class = "d-flex mb-3 p-3 bg-light justify-content-between align-items-center">

                        <div class = "d-flex align-items-center">
                            <img src="uploads/<?=$usuario_bd['p_p']?>" class = "w-25 rounded-circle">
                            <h3 class = "fs-xs m-2"><?=$usuario_bd['nome']?></h3>
                        </div>
                        <a href="logout.php" class = "btn btn-dark">Sair</a>
                    </div>
                    <div class ="input-group mb-3">
                        <input type="text" placeholder="Procurar" class ="form-check">
                        <button class = "btn btn-primary">
                            <i class = "fa fa-search"></i>
                        </button>
                    </div>
            </div>
    </body>
</html>
<?php
    }else{
        header("Location index.php");
        exit;
    }
?>