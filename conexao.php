<?php 
$usuario  = "root";
$senha    = "";
$url      = "localhost";
$database = "mural";

$conexao = mysqli_connect($url,$usuario,$senha,$database);

if (!$conexao)
{ 
    echo ("Não conectou");
}
?>