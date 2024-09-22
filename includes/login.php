<?php
include('connection.php');

session_start(); // Inicie a sessão logo no início

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    
    // Validação dos campos
    if (strlen($_POST['usuario']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        
        // Sanitização dos inputs
        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        
        // Consultar o usuário no banco de dados
        $sql_code = "SELECT * FROM usuarios WHERE nome = '$usuario'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        
        // Verificar se encontrou algum usuário
        if ($sql_query->num_rows == 1) {
            $usuario = $sql_query->fetch_assoc();
            
            // Verificar se a senha fornecida corresponde à armazenada (usando password_verify)
            if ($senhaHash = password_hash($senha, PASSWORD_DEFAULT)) {
                
                // Salvar o nome do usuário na sessão
                $_SESSION['usuario'] = $usuario['nome'];

                // Verificação de permissão/tipo de usuário
                switch ($usuario['permissao']) {
                    case 'desenvolvedor':
                        header("Location: painelDev.php");
                        exit;
                    case 'aluno':
                        header("Location: painelAln.php");
                        exit;
                    case 'professor':
                        header("Location: painelDev.php");
                        exit;
                    default:
                        echo "Tipo de usuário não reconhecido.";
                        exit;
                }
            } else {
                echo "Falha ao logar! Senha incorreta.";
            }
        } else {
            echo "Falha ao logar! Usuário não encontrado.";
        }
    }
}
?>
 
<div class="login">
    <div class="formulario">
        <h1>Login:</h1>
        <form method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Digite seu Usuario..." required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="senha" placeholder="Digite sua Senha..." required>
            <button type="submit">Entrar</button>
            <div class="reset-senha">
                <a href="senha.php">Esqueceu a Senha?</a>
                <a href="senha.php">Redefinir Senha</a>
            </div>
        </form>
    </div>
</div>
 