<?php
$host = 'localhost';  // ou '127.0.0.1'
$dbname = 'projetoads';  // Substitua pelo nome do seu banco de dados
$usuario = 'root';  // Substitua pelo seu usuário do banco de dados
$password = '';  // Substitua pela sua senha do banco de dados

// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se todos os campos esperados foram recebidos
    if (isset($_POST['nome'], $_POST['senha'], $_POST['permissao'])) {
        // Recebe e sanitiza os dados do formulário
        $nome = htmlspecialchars($_POST['nome']); // Evita inserção de tags HTML ou JS
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);  // Criptografa a senha
        $permissao = $_POST['permissao'];

        try {
            // Verifica se o nome de usuário já existe no banco de dados
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE nome = :nome");
            $stmt->execute(['nome' => $nome]);

            if ($stmt->fetchColumn() > 0) {
                echo "Este nome de usuário já está cadastrado!";
            } else {
                // Insere os dados no banco de dados (o campo 'id' será gerado automaticamente)
                $stmt = $pdo->prepare("INSERT INTO usuarios (nome, senha, permissao) VALUES (:nome, :senha, :permissao)");
                $stmt->execute(['nome' => $nome, 'senha' => $senha, 'permissao' => $permissao]);

                echo "Usuário cadastrado com sucesso!";
            }
        } catch (PDOException $e) {
            echo "Erro ao cadastrar o usuário: " . $e->getMessage();
        }
    } else {
        echo "Todos os campos são obrigatórios!";
    }
}
?>


<div class="cadusuario">
    <h1>Cadastro de Usuário:</h1>
    <div class="cadusuario-content">
        <form method="POST">
            <label for="nome">Nome do Usuário:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o Nome..." required>
            <label for="senha">Senha do Usuário:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite a Senha..." required>
            <label for="permissao">Qual a permissão:</label>
            <select name="permissao" id="permissao">
                <option value="professor">Professor</option>
                <option value="desenvolvedor">Desenvolvedor</option>
                <option value="aluno">Aluno</option>
            </select>
            <a href="#"><button>Cadastrar</button></a>
        </form>
    </div>
</div>