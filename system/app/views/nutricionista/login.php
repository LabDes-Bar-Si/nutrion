<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/nutrion/system/app/public/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <main class="main">
        <header class="main-header">
            <img src="/nutrion/system/app/public/images/logo.png" alt="" class="header-logo">
        </header>
        <div class="main-block">
            
            <div class="block-description">
                <img src="/nutrion/system/app/public/images/logo_mini.png" alt="" class="description-logo">
                <p class="description-project">NutriOn é um sistema que busca ajudar os nutricionistas a gerenciarem a alimentação dos seus pacientes</p>
                <button name="description-button" class="description-button">CADASTRAR</button>
            </div>

            <div class="block-form">
                <h1 class="logh1">Login</h1>
                <form method="POST" action="/nutrion/system/nutricionista/logar" class="form-login">
                    <label>Email</label>
                    <input type="text" name="email" id="email"required><br>
                    <label>Senha</label>
                    <input type="password" name="senha" id="senha"><br>
                    <input type="submit" value="LOGIN" class="login" name="login"required>
                </form>
                <a href="" class="esqueceu">Esqueceu a senha? </a>
                
            </div>

            <div class="block-cad">
                <h1 class="cadh1">Cadastro</h1>
                
                <form method="POST" action="/nutrion/system/nutricionista/logar" class="form-cad">
                    <label>Nome</label>
                    <input type="text" name="nome" id="nome"required><br>
                    <label>Email</label>
                    <input type="text" name="email" id="email"required><br>
                    <label>Senha:</label>
                    <input type="password" name="senha" id="senha"><br>
                    <input type="submit" value="CADASTRAR" class="cadastrar" name="cadastrar"required>
                </form>
            </div>

        </div>
    </main>
</body>
</html>