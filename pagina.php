<?php 
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}

include("conectar.php");

if(!isset($_SESSION['Email'])){
    header("Location: conta.php");
    exit();
}

$email=$_SESSION['Email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/pagina.css">
    <script src="js/menu.js"></script>
    <title>A minha conta</title>
</head>
<body>
    <div>
        <p>
            <?php
            if(isset($_SESSION['Email'])){
                $email=$_SESSION['Email'];
                $query=mysqli_query($con, "SELECT utilizadores.* FROM `utilizadores` WHERE utilizadores.Email='$email'");
                while($row=mysqli_fetch_array($query)){
                }
            }
            ?>
<header class="header">
        <div class="logo">
            <h1>A minha conta</h1>
        </div>
            <button class="terminar-sessao">Terminar Sessão</button>
</header>
        <div class="perfil">
            <?php
        $sql="SELECT * FROM utilizadores WHERE Email='$email'";
        $result=mysqli_query($con, $sql);

        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){ ?>
            <div class="foto-perfil">
                <img src="imagens/<?php echo $row['Foto']; ?>" alt="Foto de Perfil" />
            </div>
                <h1><?php echo $row['Nome']; ?></h1>
                <h2><?php echo $row['Email']; ?></h2>
            </div>
            <?php
                } 
            }
            ?>
    <div class="container">
        <nav class="menu">
            <ul>
                <li><button onclick="showContent('info', this)"><br>Informações Pessoais</br></button></li>
                <li><button onclick="showContent('historico', this)"><br>Histórico de Compras</br></button></li>
                <li><button onclick="showContent('favoritos', this)"><br>Lista de Desejos</br></button></li>
                <li><button onclick="showContent('config', this)"><br>Configurações</br></button></li>
                <li><button onclick="showContent('pagamento', this)"><br>Meios de Pagamento</br></button></li>
                <li><button onclick="showContent('notificacoes', this)"><br>Notificações e Alertas</br></button></li>
            </ul>
        </nav>
    
    <?php
    require_once 'conectar.php';

    $sql="SELECT * FROM utilizadores WHERE Email='$email'";
    $result=mysqli_query($con, $sql);

    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
    ?>

    <div class="dashboard">
            <div id="info" class="content-section">
                <h2><br>Informações Pessoais</br></h2>
                <p><br>Administre a sua informação pessoal, incluindo número de telefone e o endereço de email onde pode ser contactado.</br></p>
                <div class="info-box">
                    <p><strong>Nome<br></strong> <?php echo $row['Nome']; ?></p>
                    <span class="material-symbols-outlined">person</span>
                </div>
                <div class="info-box">
                    <p><strong>Email<br></strong> <?php echo $row['Email']; ?></p>
                    <span class="material-symbols-outlined">mail</span>
                </div>
                <div class="info-box">
                    <p><strong>Telefone<br></strong> <?php echo $row['Telemóvel'] ? $row['Telemóvel'] : 'Não informado'; ?></p>
                    <span class="material-symbols-outlined">call</span>
                </div>
                <div class="info-box">
                    <p><strong>Morada<br></strong> <?php echo $row['Morada'] ? $row['Morada'] : 'Não informado'; ?></p>
                    <span class="material-symbols-outlined">location_on</span>
                </div>
                <div class="info-box">
                    <p><strong>Data Criação<br></strong> <?php echo $row['Data_Criação']; ?></p>
                    <span class="material-symbols-outlined">calendar_month</span>
                </div>
                <button class="btn-edit">Editar Informações Pessoais<span class="material-symbols-outlined">edit</span></button>
            </div>
    </div>
        </div>
        <section id="historico" class="content-section">
            <h2>Histórico de Compras</h2>
            <ul>
                <?php
                require_once 'conectar.php';

                $pedidos = "SELECT * FROM pedidos WHERE Email_Utilizador='$email'";
                $pedidos_run = mysqli_query($con, $pedidos);
                if($pedidos_run && mysqli_num_rows($pedidos_run) > 0)
                    while ($compra = mysqli_fetch_assoc($pedidos_run)) {
                        $plantas = json_decode($compra['Plantas'], true);     
                {
                
                    echo "<li>";
                    echo "<strong>Data:</strong> " . $compra['Data_Criação'] . "<br>";
                    echo "<strong>Plantas:</strong> " . (is_array($plantas) ? implode(",", $plantas) : $compra['Plantas']) . "<br>";
                    echo "<strong>Status:</strong> " . $compra['Status_p'] . "<br>";
                    echo "<a href='reordenar.php?id=" . $compra['Id_Pedido'] . "'>Reordenar</a>";
                    echo "</li>";
                }
            }
                ?>
            </ul>
        </section>

        <section id="favoritos" class="content-section">
            <h2>Lista de Desejos</h2>
            <ul>
            
            </ul>
        </section>

        <section id="config" class="content-section">
            <h2>Configurações de Conta</h2>
            <ul>
                <li><a href="alterar_senha.php">Alterar Senha</a></li>
                <li><a href="preferencias.php">Preferências de Comunicação</a></li>
                <li><a href="configuracoes_conta.php">Alterar Preferências de Idioma/Região</a></li>
            </ul>
        </section>

        <section id="pagamento" class="content-section">
            <h2>Cartões de Crédito/Meios de Pagamento</h2>
            <ul>
                
            </ul>
            <a href="adicionar_cartao.php">Adicionar Cartão</a>
        </section>

        <section id="notificacoes" class="content-section">
            <h2>Notificações e Alertas</h2>
            <form action="configurar_alertas.php" method="POST">
                <label>
                    <input type="checkbox" name="alerta_estoque" >
                    Notificar sobre plantas em stock
                </label><br>
                <label>
                    <input type="checkbox" name="alerta_promocoes">
                    Notificar sobre promoções
                </label><br>
                <button type="submit">Salvar Preferências</button>
            </form>
        </section>
        <?php
            }
        }
        ?>
</body>
</html>