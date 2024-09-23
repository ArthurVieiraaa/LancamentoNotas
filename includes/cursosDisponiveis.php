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

// Consulta os dados da tabela 'curso'
try {
    $stmt = $pdo->prepare("SELECT * FROM curso");
    $stmt->execute();
    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar os dados: " . $e->getMessage());
}
?>

<div class="cursos">
    <div class="cursos-disponiveis">
        <h1>Cursos Disponíveis:</h1>
        <div class="cursos-lista">
            <ul>
                <?php if (count($cursos) > 0): ?>
                    <?php foreach ($cursos as $curso): ?>
                        <li>
                            <h1>Categoria: <?= htmlspecialchars($curso['categoria']); ?></h1>
                            <h2>Nome do Curso: <?= htmlspecialchars($curso['nomeCurso']); ?></h2>
                            <p>Data de Início: <?= htmlspecialchars($curso['dtInicio']); ?></p>
                            <h3>Valor: R$<?= htmlspecialchars(number_format($curso['valor'], 2, ',', '.')); ?></h3>
                            <button id="button-limpeza"><i class="fa-solid fa-arrow-right"></i></button>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum curso disponível no momento.</p>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
        <!-- Limpeza -->
        <div id="limpeza" style="display: none;" class="toast">
            <div class="toast-container toast-centered">
                <div class="toast-content">
                    <div class="toast-h">
                        <h5>Descrição do Curso:</h5>
                        <i id="close-limpeza" class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="toast-b">
                        <ul>
                            <li>Atendimento ao cliente</li>
                            <li>Pele e estrutura de pele facial</li>
                            <li>Cosmetologia específica para a limpeza de pele facial</li>
                            <li>Anamnese</li>
                            <li>Técnicas de aplicação de produtos</li>
                            <li>Higienização, esfoliação e hidratação de pele</li>
                            <li>Emoliência/ Amolecimento e extração dps comedões</li>
                            <p>* Observações:</p>
                            <div class="obs-content">
                                <p>Necessário: CPF, Comprovante de Residência e Comprovante de Escolaridade e Certificação Profissional quando for solicitado!</p>
                                <p>Valor mensal: R$ 349,90</p>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="cursos-inscricao">
            <h1>Inscreva-se:</h1>
            <div class="formulario-curso">
            <form action="">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu Nome..." required>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Digite seu Email..." required>
                <label for="curso">Curso:</label>
                <select name="curso" id="curso">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="curso1">Limpeza de Pele</option>
                    <option value="curso2">Técnico em Enfermagem</option>
                    <option value="curso3">Análise e Desenvolvimento de Sistemas (ADS)</option>
                    <option value="curso4">Excel Básico</option>
                    <option value="curso5">Assistente de Secretaria Escolar</option>
                    <option value="curso6">Pilotagem de Drone</option>
                    <option value="curso7">Engenharia de Software</option>
                    <option value="curso8">Técnico em Informática</option>
                </select>
                <a href="#"><button>Inscrever-se</button></a>
            </form>
        </div>
    </div>
</div>