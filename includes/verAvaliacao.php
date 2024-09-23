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

// Consulta os dados da tabela 'avaliacao'
try {
    $stmt = $pdo->prepare("SELECT * FROM avaliacao");
    $stmt->execute();
    $provas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar os dados: " . $e->getMessage());
}
?>

<div class="boletim">
        <h1>Boletim:</h1>
        <div class="boletim-content">
            <!-- Exibe o nome do aluno -->
            <h2>Aluno: <?php echo $_SESSION['usuario'] ?? 'Fulano'; ?></h2>

            <div class="boletim-content-notas">
                <?php if (count($provas) > 0): ?>
                    <?php foreach ($provas as $prova): ?>
                        <div>
                            <h3>Matéria:</h3> 
                            <span><?= htmlspecialchars($prova['materia']); ?></span>
                        </div>
                        <div>
                            <h4>Assunto:</h4> 
                            <span><?= htmlspecialchars($prova['assunto']); ?></span>
                        </div>
                        <div>
                            <h5>Prova (Link):</h5> 
                            <a href="<?= htmlspecialchars($prova['prova']); ?>" target="_blank">Ver Prova</a>
                        </div>
                        <div>
                            <h6>Data:</h6> 
                            <span><?= htmlspecialchars($prova['data']); ?></span>
                        </div>
                        <hr> <!-- Separador entre provas -->
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhuma prova cadastrada.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>