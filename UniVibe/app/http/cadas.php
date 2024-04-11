<?php

    #Verificando campos da pagina cadastro

    if(isset( $_POST['usuario'] ) &&
       isset( $_POST['nome']    ) &&  
       isset( $_POST['senha']   ))
    {
        # Pegando dados que o cliente digitou no formulario
        $nome = $_POST['usuario'];
        $usuario = $_POST['nome'];    
        $senha = $_POST['senha'];
        
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

            #mensagem de erro
            $em = "Usuario é obrigatorio";

            #redirecionar para 'cadastro.php' e passar mensagem de erro
            header ("Location: ../../cadastro.php?error=$em");
            exit;
        }else if ( empty ( $senha ) ){

            #mensagem de erro
            $em = "Senha é obrigatorio";

            #redirecionar para 'cadastro.php' e passar mensagem de erro
            header ("Location: ../../cadastro.php?error=$em");
            exit;
        }else{

            echo "Parabens";
        }
        #Fecha Validação dos campos
    }else{

        header("Location: ../../cadastro.php");
        exit;

    }
        

?>