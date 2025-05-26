<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código de Validação</title>
    
</head>
<body>
    <div class="reset-container">
        <div class="reset-header">
            <h1>Insira o Código</h1>
        </div>

        <form action="novasenha.php" method="POST">
            <div class="form-group">
                <label for="number">Código de Recuperação</label>
                <input type="number" id="number" name="number" placeholder="Insira o código enviado no seu E-mail" required>
            </div>

            <button type="submit" class="reset-button">Seguinte</button>
        </form>

        <div class="divider">ou</div>

        <div class="reset-footer">
            <p>Já lembra da sua senha? <a href="index.php">Faça login</a></p>
        </div>
    </div>
</body>
</html>