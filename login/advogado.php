<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
    if(strlen($_POST['email']) == 0){
        echo '<script> alert("Preencha seu e-mail") </script>';
    }

    else if(strlen($_POST['senha']) == 0){
        echo '<script> alert("Preencha sua senha") </script>';
    }

    else{

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code="SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execucao do codigo SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            
            $usuario = $sql_query->fetch_assoc();
            

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['user'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            

            header("Location: painel_advogado.php");
        }

        else{
            echo '<script>alert("Falha ao logar! Email ou senha incorretos")</script>';
        }

    }
}

?>
<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Grupo Novo">
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <div class="container">
            <div class="bloco">
                <h1>Login</h1>
                    <form action="" method="POST">
                        <div class="caixa">
                        <input type="email" name="email" placeholder="Login" class="login">
                        </div>
                        <div class="caixa_um">
                        <input type="password" placeholder="Senha" name="senha" class="senha">
                        </div>
                        <br>
                        <button type="submit">Entrar</button>
                        <br />
                    </form>
            </div>
        </div>
    </body>
</hmtl> 