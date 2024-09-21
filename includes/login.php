<?php
include('connection.php');
 
if(isset($_POST['usuario']) || isset($_POST['senha'])) {
 
    if(strlen($_POST['usuario']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
 
        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
 
        $sql_code = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
 
        $quantidade = $sql_query->num_rows;
 
        if($quantidade == 1) {
           
            $usuario = $sql_query->fetch_assoc();
 
            session_start();
 
            $_SESSION['usuario'] = $_POST['usuario'];
 

            if($usuario['tipo'] == 'desenvolvedor') {
                header("Location: painelDev.php");
                exit;
            } else if($usuario['tipo'] == 'aluno') {
                header("Location: painelAln.php");
                exit;
            } else if($usuario ['tipo'] == 'professor'){
                header("Location: painelDev.php");
                exit;
            }
 
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
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
 