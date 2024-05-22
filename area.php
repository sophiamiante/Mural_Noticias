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
    <title>Area Restrita</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <header>
            Area Administrativa
        </header>        
        <div id="menu">
            Bom dia <?php echo $_SESSION['usuario'];?> !
            <a href="sair.php">Desconectar</a>    
        </div>
        <?php
            if (isset($_GET['excluir']))
            {        
                $excluir = $_GET['excluir'];
                $sql = "DELETE FROM tb_mural WHERE id_mural = '$excluir';";
                $consulta = mysqli_query($conexao, $sql);
                echo "Registro excluido com sucesso !";
            }
        ?>
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
                    <div class="submenu">
                        <a href="area.php?excluir='.$dados["id_mural"].'">
                            <img src="img/excluir.png" alt="" class="icone">
                            excluir
                        </a>
                        <a href="alterar.php?alterar='.$dados["id_mural"].'">
                            <img src="img/alterar.png" alt="" class="icone">
                            alterar
                        </a>
                    </div>
                </div>
                ';
            }
        ?>
        <footer>
            <img src="img/robo.png" alt="">
            Todos os direitos reservados.<br>
            Desenvolvido por: Paulo Cesar Felix Correia<br>            
            <a href="#container">
                <img src="img/subir.png" alt="" class="subir">
            </a>
        </footer> 
    </div>    
</body>
</html>