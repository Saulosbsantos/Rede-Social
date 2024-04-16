<?php

    #Verificando campos da pagina cadastro

    if(isset( $_POST['usuario'] ) &&
       isset( $_POST['senha'] ) &&
       isset( $_POST['nome'] ) ){

        #Conexão de banco de dados
        include '../banco.php';

        #Pegando dados que o cliente digitou no formulario
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $usuario = $_POST['usuario'];
        
        #Formatação da URL
        $data = "nome =" . $nome . "&usuario=" . $usuario;
        
        #Validação dos campos
        if ( empty( $nome ) )
        {
            #mensagem de erro
            $em = "Nome é obrigatorio";

            #redirecionar para 'cadastro.php' e passar mensagem de erro
            header ("Location: ../../cadastro.php?error=$em");
            exit;

        }else if( empty ( $usuario ) ){

            $em = 'Nome de usuario é obrigatorio';

            header ("Location: ../../cadastro.php?error=$em&$data");
            exit;

        }else if ( empty ( $senha ) ){

            $em = "Senha é obrigatorio";

            header ("Location: ../../cadastro.php?error=$em&$data");
            exit;

        }else{

            echo "Parabens";
        }
        #Fecha Validação dos campos
    }else{

        header ("Location: ../../cadastro.php?error=$em");
        exit;

    }
        

?>