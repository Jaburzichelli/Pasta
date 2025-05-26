<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinição de Senha</title>
    
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Redefina sua Senha</h1>
            <br>
        </div>
        
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="new-password">Digite sua nova senha</label>
                <input type="password" id="new-password" name="new_password" placeholder="Insira sua nova senha" required>
            </div>
            
            <div class="form-group">
                <label for="confirm-password">Confirme sua nova senha</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Insira novamente" required>
            </div>

            <button type="submit" class="login-button">Entrar</button>
        </form>
        
        <div class="login-footer">

        </div>
    </div>
</body>
</html>