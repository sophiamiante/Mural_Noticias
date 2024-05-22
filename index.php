<?php
include_once "conexao.php";

if(isset($_POST['btn_enviar']))
{
    $de = $_POST['txt_de'];
    $para = $_POST['txt_para'];
    $mensagem = $_POST['txt_msg'];
 
    $sql = "INSERT INTO tb_mural (de, para, msg) VALUES ('$de','$para','$mensagem');";
    $sql1 = "SELECT * FROM tb_mural WHERE de = '$de' AND para = '$para' AND msg = '$mensagem';";
    $verifica = mysqli_query($conexao, $sql1);

    if (mysqli_num_rows($verifica) == 0) {
        if (mysqli_query($conexao, $sql))
        {
            echo "Inserido com sucesso";
        }      
    } 
}  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mural de Recados</title>
</head>
<body>
    <div id="container">
        <header class="neonText">
            Mural de Recados
        </header>
        <div id="enviar">
            <form action="#" method="post" enctype="multipart/form-data">
                De:
                <input type="text" name="txt_de" id="txt_de">
                <br>
                Para:
                <input type="text" name="txt_para" id="txt_para">
                <br>
                Mensagem:
                <input type="text" name="txt_msg" id="txt_msg">                
                <span class="botoes">
                    <input type="submit" value="Enviar" name="btn_enviar">
                    <input type="reset" value="Limpar" name="btn_enviar">
                </span>
            </form>
        </div>
        <div class="msg">
            <?php
                $sql = "SELECT * FROM tb_mural ORDER BY id_mural DESC LIMIT 10;";
                $resultado = mysqli_query($conexao, $sql);
                while($dados = mysqli_fetch_assoc($resultado))
                {
                    echo '
                    <div class="mensagem">
                        <span class="de">DE: '.$dados["de"].'</span><br>
                        <span class="para">PARA: '.$dados["para"].'</span><br>
                        <span class="mens">MENSAGEM: '.$dados["msg"].'</span><br>
                    </div>
                    ';
                }
            ?>            
        </div>
        <footer>
            <img src="img/robo.png" alt="Robo">
            <p>Todos os direitos reservado ao Alunos Etec</p>
            <p><a href="login.php">Area Restrita</a></p>
        </footer>
    </div>
    teste github
</body>
</html>