<?php
session_start();
require '../service/conexao.php';

$_SESSION['usuario'] = [
    'nome' => $user['nome'],
    'email' => $email
];

class AuthController {
    private $pdo;

    public function __construct() {
        $conn = new usePDO();
        $this->pdo = $conn->getInstance();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $sql = "SELECT u.senha, p.nome FROM pessoa p
                    INNER JOIN usuario u ON p.usuario_id = u.id
                    WHERE p.email = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$email]);

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch();

                if (password_verify($senha, $user['senha'])) {
                    $_SESSION['usuario'] = $user['nome'];
                    header("Location: ../view/dash.php?mensagem=login_sucesso&nome=" . urlencode($user['nome']));
                    exit();
                } else {
                    header("Location: ../view/index.php?erro=senha_incorreta");
                    exit();
                }
            } else {
                header("Location: ../view/index.php?erro=email_nao_encontrado");
                exit();
            }
        }
    }
}

// Executar login diretamente quando requisitado
$auth = new AuthController();
$auth->login();