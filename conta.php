<html>
    <head>
        <link rel="stylesheet" type="text/css" href="paginicial.css">
        <meta charset="UTF-8">
        <title>Login e Registro</title>
        <link rel="stylesheet" href="css/conta.css">
        <script src="https://kit.fontawesome.com/76ed8667ce.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="botoes-cima">
                <button id="entrar-tab" class="tab ativa">Entrar</button>
                <button id="registro-tab" class="tab">Criar Conta</button>
            </div>
            <form id="entrar-form" class="form ativa" action="login.php" method="POST">
                <div class="input-group">
                    <label for="email-login">Email</label>
                    <input type="email" name="email" id="email-login" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <label for="password-login">Password</label>
                    <input type="password" name="password" id="password-login" placeholder="Password" required>
                </div>
                <a href="#" class="forgot-password">Esqueceu-se da palavra-passe?</a>
                <button type="submit" class="btn" name="entrar">Entrar</button>
                <p class="texto-baixo">Ainda não tem uma conta? <a href="registro.php">Crie Aqui</a></p>
                <div class="social-login">
                    <hr>
                    <span>Ou entre com</span>
                    <hr>
                </div>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="js/conta.js"><i class="fa-brands fa-google"></i></a>
                </div>
            </form>
            <form method="post" action="registro.php" id="registro-form" class="form">
                <div class="input-group">
                    <label for="nome-registro">Nome</label>
                    <input type="text" id="nome-registro" name="nome" placeholder="Nome" required>
                </div>
                <div class="input-group">
                    <label for="telemovel">Telemóvel (Opcional)</label>
                    <input type="tel" id="telemovel" name="telemovel" placeholder="Telemóvel">
                </div>
                <div class="input-group">
                    <label for="morada">Morada (Opcional)</label>
                    <input type="text" id="morada" name="morada" placeholder="Morada">
                </div>
                <div class="input-group">
                    <label for="email-registro">Email</label>
                    <input type="email" id="email-registro" name="email-registro" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <label for="password-registro">Password</label>
                    <input type="password" id="password-registro" name="password-registro" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <label for="password-registro-conf">Confirmar Password</label>
                    <input type="password" id="password-registro-conf" name="password-registro-conf" placeholder="Confirmar Password" required>
                </div>
                <button type="submit" class="btn" name="criar-conta">Criar Conta</button>
            </form>
        </div>
        <script src="js/conta.js"></script>
    </body>
</html>