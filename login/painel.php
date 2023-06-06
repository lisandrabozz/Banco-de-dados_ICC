<?php
include('protect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cliente.css">
    <title>Painel</title>
</head>
<body>

    <div class="pagina">
        <div class="nome">
        <?php echo $_SESSION['nome']; ?>
        </div> 
    <?php
        $host = "localhost";
        $db   = "dois_dados";
        $user = "root";
        $pass = "";
        
        $con = mysqli_connect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR);

        mysqli_select_db($con, $db);

        $query = sprintf("SELECT processo_um, nome, vara, procedimento FROM processo");
        $dados = mysqli_query($con, $query) or die(mysql_error());
        $linha = mysqli_fetch_assoc($dados);
        $total = mysqli_num_rows($dados);
    ?>

    <?php
        if($total > 0) {
        do {
    ?>
        <a class="link" href="processo.php">
        <div class="bloco">
            <p><?=$linha['processo_um']?> <p><?=$linha['nome']?> <p><?=$linha['vara']?> <p><?=$linha['procedimento']?>
        </div>
        </a>
    <?php
        }while($linha = mysqli_fetch_assoc($dados));
        }
    ?>
        <p>
        <a href="logout.php">Sair</a>
        </p>
    </div>
    </body>
</html>