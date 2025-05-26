

<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_GET['erro'])) {
    if ($_GET['erro'] == 'senhas') {
        echo "<p style='color:red;'>As senhas não coincidem.</p>";
    } elseif ($_GET['erro'] == 'tamanho') {
        echo "<p style='color:red;'>A senha deve ter pelo menos 8 caracteres.</p>";
    } elseif ($_GET['erro'] == 'email_existente') {
        echo "<p style='color:red;'>Email já cadastrado.</p>";
    } elseif ($_GET['erro'] == 'erro_cadastro') {
        echo "<p style='color:red;'>Erro ao realizar o cadastro.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Conta</title>
    
</head>

    <style>
        /* Estilos Gerais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        /* Estilos para o Container de Login */
        .login-container, .register-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .login-header, .register-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header h1, .register-header h1 {
            color: #2c3e50;
            font-size: 24px;
        }
        
        /* Estilos para Formulários */
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        .form-group input:focus {
            border-color: #3498db;
            outline: none;
        }
        
        /* Estilos para Botões */
        .login-button, .register-button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .login-button:hover, .register-button:hover {
            background-color: #2980b9;
        }
        
        /* Estilos para Rodapé e Links */
        .login-footer, .register-footer {
            text-align: center;
            margin-top: 20px;
        }
        
        .login-footer a, .register-footer a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .login-footer a:hover, .register-footer a:hover {
            color: #2980b9;
            text-decoration: underline;
        }
        
        .divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
            color: #7f8c8d;
        }
        
        .divider::before, .divider::after {
            content: "";
            display: inline-block;
            width: 30%;
            height: 1px;
            background: #ddd;
            position: absolute;
            top: 50%;
        }
        
        .divider::before {
            left: 0;
        }
        
        .divider::after {
            right: 0;
        }
        
        /* Estilos para Mensagens de Erro */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-weight: 600;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        /* Responsividade */
        @media (max-width: 480px) {
            .login-container, .register-container {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>


<body>
    <div class="register-container">
        <div class="register-header">
            <h1>Criar Conta</h1>
        </div>

        <form action="../controller/CadastroController.php" method="POST">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" name="email" placeholder="Digite seu e-mail" required>
            </div>

            <div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="tel" name="Telefone" id="Telefone" placeholder="(XX) XXXXX-XXXX" required>
</div>

            

            <div class="form-group">
                <label for="Nome">Nome</label>
                <input type="Nome" name="fullname" id="Nome" name="Nome" placeholder="Digite seu Nome" required>
            </div>

            <div class="form-group">
                <label for="Sobrenome">Sobrenome</label>
                <input type="Sobrenome" name="Sobrenome" id="Sobrenome" name="Sobrenome" placeholder="Digite seu Sobrenome" required minlength="8" required>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" name="password" placeholder="Digite sua senha" required minlength="8" required>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirmar Senha</label>
                <input type="password" name="confirmPassword" id="confirm-password" name="confirm-password" placeholder="Confirme sua senha" required minlength="8" required>
            </div>

            <button type="submit" class="register-button">Cadastrar</button>
        </form>

        <div class="divider">ou</div>

        <div class="register-footer">
            <p>Já tem uma conta? <a href="index.php">Faça login</a></p>
        </div>
    </div>
</body>

</html>