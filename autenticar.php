<?php
// autenticar.php verifica se o e-mail e senha informados estão corretos!
 
include("conexao.php"); //recebe o email e a senha digitados no formulário de login
$email = $_POST['email'];
$senha = $_POST['senha'];
 
// ==============================================
// CONSULTA NO BANCO ( READ do CRUD )
// Busca o usúario pelo email informado
// ==============================================
 
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);
 
// ==============================================
// VERIFICAÇÃO DA SENHA
// ==============================================
 
if ($usuarios && password_verify($senha, $usuario['senha'])) {
    $_SESSION['nome'] = $usuario['nome'];
    header("Location: painel.php");
    exit();
} else {
    header("Location: login.php?erro=login");
    exit();
}