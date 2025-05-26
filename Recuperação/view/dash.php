<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php?erro=acesso_nao_autorizado');
    exit;
}

$nomeUsuario = $_SESSION['usuario']['nome'] ?? 'Usuário';

// Incluir arquivos de conexão e funções
require_once '../service/conexao.php';
require_once '../model/funcoes.php';

$conexao = instancia();

// Inicializar variáveis
$emailSelecionado = null;
$emails = buscarEmails($conexao);

// Verificar se um email foi selecionado
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $emailSelecionado = buscarEmailPorId($conexao, $id);
    
    // Marcar como lido se encontrado
    if ($emailSelecionado) {
        marcarComoLido($conexao, $id);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Email Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        html, body { height: 100%; overflow-x: hidden; }
        .email-container { height: calc(100vh - 56px); }
        .email-list { height: 100%; overflow-y: auto; background-color: #f8f9fa; border-right: 1px solid #dee2e6; }
        .email-detail { height: 100%; overflow-y: auto; }
        .email-item { cursor: pointer; padding: 15px; border-bottom: 1px solid #dee2e6; }
        .email-item:hover { background-color: #f1f3f5; }
        .email-item.active { background-color: #0d6efd; color: white; }
        .email-item.active .text-muted { color: rgba(255, 255, 255, 0.75) !important; }
        .email-item.unread { font-weight: bold; }
        .unread-indicator { display: inline-block; width: 10px; height: 10px; border-radius: 50%; background-color: #0d6efd; margin-right: 8px; }
        .empty-state { display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%; color: #6c757d; }
    </style>
</head>
<body>

<header class="bg-primary text-white p-3">
    <div class="d-flex justify-content-between">
        <h1 class="h4 m-0">Email Dashboard - Bem-vindo, <?php echo htmlspecialchars($nomeUsuario); ?>!</h1>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Sair</a>
    </div>
</header>

<div class="container-fluid p-0">
    <div class="row g-0 email-container">
        
        <!-- Email List -->
        <div class="col-md-4 col-lg-3 email-list">
            <?php if (empty($emails)): ?>
                <div class="text-center p-4 text-muted">
                    <p>Nenhum email encontrado</p>
                </div>
            <?php else: ?>
                <?php foreach ($emails as $email): ?>
                    <a href="?id=<?php echo $email['id']; ?>" class="text-decoration-none">
                        <div class="email-item 
                            <?php echo ($emailSelecionado && $emailSelecionado['id'] == $email['id']) ? 'active' : ''; ?> 
                            <?php echo $email['lido'] ? '' : 'unread'; ?>">
                            
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="d-flex align-items-center mb-1">
                                        <?php if (!$email['lido']): ?>
                                            <span class="unread-indicator"></span>
                                        <?php endif; ?>
                                        <span><?php echo htmlspecialchars($email['usuario']); ?></span>
                                    </div>
                                    <div class="text-muted small">
                                        <?php echo htmlspecialchars('Recuperação de senha!'); ?>
                                    </div>
                                </div>
                                <small class="text-muted">
                                    <?php echo formatarData($email['data'] ?? date('Y-m-d H:i:s')); ?>
                                </small>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Email Detail -->
        <div class="col-md-8 col-lg-9 email-detail">
            <?php if ($emailSelecionado): ?>
                <div class="p-4">
                    <h2 class="h4 mb-4">Detalhes do Email</h2>
                    <div class="card">
                        <div class="card-header">
                            <strong>De:</strong> <?php echo htmlspecialchars($emailSelecionado['usuario']); ?>  
                            <span class="badge bg-secondary float-end">Código: <?php echo htmlspecialchars($emailSelecionado['code']); ?></span>
                        </div>
                        <div class="card-body">
                            <p><?php echo nl2br(htmlspecialchars($emailSelecionado['mensagem'] ?? "Conteúdo do email indisponível.")); ?></p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <i class="bi bi-envelope fs-1"></i>
                    <p>Selecione um email para ver seu conteúdo</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
