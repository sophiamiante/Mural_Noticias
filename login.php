<?php
include_once "conexao.php";

if(isset($_POST['btn_enviar']))
{   
   
    $usuarioP = $_POST['txt_usuario'];
    $senhaP = $_POST['txt_senha'];


    $sql = "SELECT * FROM tb_login WHERE usuario = '$usuarioP' AND senha = '$senhaP';";
    $consulta = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($consulta) > 0 )
    {
        echo "acesso liberado";
        session_start();
        $_SESSION['usuario']   = $usuarioP;
        $_SESSION['senha']   = $senhaP;
        header("Location: area.php");
    }else{
        echo "Usuário/Senha incorretos!!!";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">    
    <title>Login</title>
</head>
<body class="fundo_login">
    <div class="login">
        <form action="login.php" method="post" enctype="multipart/form-data">
            <h1>Area Restrita</h1>
            <label for="txt_usuario">Usuário:</label>
            <input type="text" name="txt_usuario" id="txt_usuario">
            <br>
            <label for="txt_senha">Senha:</label>
            <input type="text" name="txt_senha" id="txt_senha">
            <br>
            <input type="submit" value="Entrar" name="btn_enviar" class="butao_login">
            <input type="reset"  value="Limpar" class="butao_login">
        </form>
        <a href="index.php">
            <img src="img/voltar.png" alt="" class="voltar">
        </a>
    </div>
</body>
</html>