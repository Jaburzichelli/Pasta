<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../model/CadastroModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'] ?? '';
    $Sobrenome = $_POST['Sobrenome'] ?? '';
    $Telefone = $_POST['Telefone'] ?? ''; 
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    // Criar instância do modelo
    $model = new CadastroModel();

    if ($password !== $confirmPassword) {
        header("Location: ../view/teladecadastro.php?erro=senhas");
        exit();
    }

    if (strlen($password) < 8) {
        header("Location: ../view/teladecadastro.php?erro=tamanho");
        exit();
    }

    // Chamar método da classe (corrigido)
    if ($model->emailExists($email)) {
        header("Location: ../view/teladecadastro.php?erro=email_existente");
        exit();
    }

    // Chamar método da classe (corrigido)
    $result = $model->register($fullname, $email, $Telefone, $password);

    if ($result) {
        header("Location: ../view/dash.php?mensagem=Cadastro+realizado+com+sucesso");
        exit();
    } else {
        header("Location: ../view/teladecadastro.php?erro=erro_cadastro");
        exit();
    }
}
?>