<?php
session_start();

if (isset($_SESSION['usuario'])) {
    include 'banco.php';
    include 'usuario.php';
    include 'conversacao.php';
    include 'tempo_l.php';

    //Obtendo dados do usuário 
    $usuario_bd = getUsuario($_SESSION['usuario'], $conn);
    //obtendo dados das conversas
    $conversas = getConversas($usuario_bd['id_usuario'], $conn);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UniVibe - Home</title>
        
        <!-- BOOSTRAP -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- /BOOSTRAP -->
        <!-- CSS -->
        <link rel="stylesheet" href="/UNIVIBE/css/style.css">
        <!-- /CSS -->
    </head>
    <body class="d-flex justify-content-center align-items-center vh-100">
        <div class="p-2 brLogin rounded shadow">
            <div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="uploads/<?=$usuario_bd['p_p']?>" class="profile-image rounded-circle me-2">
                    <h3 class="fs-xs m-0"><?=$usuario_bd['nome']?></h3>
                </div>
                <a href="logout.php" class="btn btn-dark">Sair</a>
            </div>
            <div class="input-group mb-3">
                <input type="text" placeholder="Procurar" class="form-control">
                <button class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </button>   
            </div>
            <ul class="list-group mvh-50 overflow-auto">
                <?php if(!empty($conversas)){ ?>
                    <?php foreach ($conversas as $conversa){ ?>
                        <li class="list-group-item">
                            <a href="chat.php?user=<?=$conversa['usuario']?>" class="d-flex justify-content-between align-items-center p-2">
                                <div class="d-flex align-items-center">
                                    <img src="uploads/<?=$conversa['p_p']?>" class="profile-image rounded-circle me-2" >
                                    <h3 class="fs-xs m-0"><?=$conversa['nome']?></h3>
                                </div>
                                <?php if(last_seen($conversa['t_logado']) == "Active") { ?>
                                    <div title="Online">
                                        <div class="online"></div>
                                    </div>
                                <?php } ?>
                            </a>
                        </li>
                    <?php } ?>
                <?php }else{ ?>
                    <div class="alert alert-info text-center px-5">
                        <i class="fa fa-comments d-block fs-big"></i>
                        Nenhuma mensagem ainda, inicie a conversa
                    </div>
                <?php } ?>
            </ul>
        </div>
        <!--JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!--/JQUERY-->
        <script>
            $(document).ready(function()
            {
                //Verificando a última vez que usuário estava logado
                let laUpdate = function(){

                    $.get("atualizaEstado_l.php");

                }
                
                laUpdate();

                //atualização automática vista pela última vez a cada 10 segundos

                setInterval(laUpdate, 10000);
            });
        </script>
    </body>
</html>
<?php
}else{
    header("Location index.php");
    exit;
}
?>
