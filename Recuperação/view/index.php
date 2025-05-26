<!DOCTYPE html>

<?php 
if (isset($_GET['erro'])) {
    if($_GET['erro'] == 'senha_incorreta') {
        echo "<div class='alert alert-danger'>Senha incorreta.</div>";
    } elseif($_GET['erro'] == 'email_nao_encontrado') {
        echo "<div class='alert alert-danger'>Email não encontrado.</div>";
    }
}
?>



<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>    
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
    <div class="login-container">
        <div class="login-header">
            <h1>Faça seu Login</h1>
       <br>
        </div>

        
        
        <form action="./controller/AuthController.php" method="POST">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
            </div>
            
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
            </div>
            
            <button type="submit" class="login-button">Entrar</button>
        </form>
        
        <div class="login-footer">
            <a href="recuperaçaodesenha.php">Esqueci minha senha</a>
        </div>
        
        <div class="divider">ou</div>
        
        <div class="login-footer">
            <p>Não tem uma conta? <a href="teladecadastro.php">Cadastre-se</a></p>
        </div>
    </div>
</body>
</html>