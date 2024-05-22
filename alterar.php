<?php
include_once "conexao.php";
session_start();
if(!isset($_SESSION['usuario']))
{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
    <header>Area Administrativa</header>        
        <div id="menu">
            Bom dia <?php echo $_SESSION['usuario'];?> !
            <a href="sair.php">Desconectar</a>    
        </div>
        <?php
            if(@$_POST['btn_voltar'])
            {
                header("Location: area.php"); 
            }
            
            if(@$_POST['btn_alterar'])
            {
                $de = $_POST['txt_de'];
                $para = $_POST['txt_para'];
                $msg = $_POST['txt_msg'];
                $id = $_GET['alterar'];
                $sql = "UPDATE tb_mural SET de = '$de' , para = '$para', msg = '$msg' WHERE id_mural = $id;";
                try
                {
                    mysqli_query($conexao, $sql);
                    echo 'Dados ALTERADO com sucesso !!!';
                }catch(Exception){
                    echo 'Erro ao ALTERAR os dados';
                }                
            }

            if (isset($_GET['alterar']))
            {        
                $alterar = $_GET['alterar'];
                $sql = "SELECT * FROM tb_mural WHERE id_mural = '$alterar';";
                $consulta = mysqli_query($conexao, $sql);
                $dados = mysqli_fetch_array($consulta);
                echo '
                <div id="enviar">
                    <form action="#" method="post" enctype="multipart/form-data">
                        De:
                        <input type="text" name="txt_de" id="txt_de" value="'.$dados["de"].'">
                        <br>
                        Para:
                        <input type="text" name="txt_para" id="txt_para" value="'.$dados["para"].'">
                        <br>
                        Mensagem:
                        <input type="text" name="txt_msg" id="txt_msg" value="'.$dados["msg"].'">                
                        <span class="botoes">
                            <input type="submit" value="Alterar" name="btn_alterar">
                            <input type="submit" value="Voltar" name="btn_voltar">
                        </span>
                    </form>
                </div>
                ';
            }
        ?>
    </div>
</body>
</html>