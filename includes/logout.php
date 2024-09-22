<?php
// Inicia a sessão (se ainda não estiver iniciada)
session_start();

// Passo 1: Limpa todas as variáveis da sessão
$_SESSION = array();

// Passo 2: Destrói o cookie de sessão (se houver)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Passo 3: Destrói a sessão
session_destroy();

// Passo 4: Redireciona para a página de login ou inicial
header("Location: login.php"); // Substitua pelo caminho desejado
exit;   
?>