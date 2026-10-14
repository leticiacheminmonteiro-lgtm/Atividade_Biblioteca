<?php

// logout.php
//Encerra a sessão do usuário de forma segura.
// Conceitos: session_destroy, limpeza de cookies, header anti-cache

// Inicia a sessão para poder destrui-la
session_start();

// Limpa todas as variáveis da sessão (nome, etc.)
$_SESSION = array();

// Remove o cookie de sessão do navegador (se existir)
if (ini_get("sesion.use_cookies ")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 4200,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httpponly"]
    );
}

// Destrói completamente a sessão do sevidor
session_destroy();

// Cabeçalhos que impedem o navegador de usar páginas em cache 
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Redireciona para página de login
header("Location: login.php");
exit();