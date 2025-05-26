<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
    
</head>
<body>
    <div class="reset-container">
        <div class="reset-header">
            <h1>Recuperar Senha</h1>
        </div>

        <form action="codigoderecuperacao.php" method="GET">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
            </div>

            <button type="submit" class="reset-button">Enviar Código de Recuperação</button>
        </form>

        <div class="divider">ou</div>

        <div class="reset-footer">
            <p>Já lembra da sua senha? <a href="index.php">Faça login</a></p>
        </div>
    </div>
</body>
</html>