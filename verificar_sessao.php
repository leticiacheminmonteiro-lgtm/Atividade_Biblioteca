<?php

// verificar_sessao.php
// Arquivo incluído nas páginas restritas do sistema.
// Garante que apenas usuários logados possam acessar o conteúdo.

// Inicia a sessão do usuário  (ou retoma uma sessão já existente)
session_start();

// Cabeçalhos HTTP que impedem o navegador de guardar a página
// em cache.

// Isso evita que usuário volte ao painel 

header("Cache-Contol: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Verifica se a variavel de sessão 'nome' existe.
// Se não existir, o usuário não está logado.

if(isset($_SESSION['nome'])) {
    //header() rediricionaro navegador para outra página.
    header("Location: login.php");
    // exit() encerra o script para garantit que nada mais
    // seja executado.
    exit();
}