<?php
session_start();
require_once 'conectar.php';
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Plantas</title>
    <link rel="stylesheet" href="css/planta.css">
    <link rel="stylesheet" href="css/barralado.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://kit.fontawesome.com/76ed8667ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="js/planta.js">
    <script src="js/toggle.js"></script>
</head>
<body>
<section id="pag1" class="pag1">
<div class="barralado collapsed">
            <header class="header">
                <button class="toggler barralado-toggler">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </header>
            <ul class="lista-nav primary-nav">
                <li class="conteudo-nav">
                    <a href="paginicial.html" class="link-nav">
                        <span class="nav-icon material-symbols-outlined">home</span>
                        <span class="label-nav">Início</span>
                    </a>
                    <span class="tooltip">Início</span>
                </li>
                <li class="conteudo-nav">
                    <a href="plantas.php" class="link-nav">
                        <span class="nav-icon material-symbols-outlined">
                            psychiatry
                            </span>
                        <span class="label-nav">Plantas</span>
                    </a>
                    <span class="tooltip">Plantas</span>
                </li>
                <li class="conteudo-nav">
                    <a href="arvores.php" class="link-nav">
                        <span class="nav-icon material-symbols-outlined">nature</span>
                        <span class="label-nav">Árvores e Arbustos</span>
                    </a>
                    <span class="tooltip">Árvores e Arbustos</span>
                </li>
                <li class="conteudo-nav">
                    <a href="FAQ.html" class="link-nav">
                        <span class="nav-icon material-symbols-outlined">quiz</span>
                        <span class="label-nav">FAQ's</span>
                    </a>
                    <span class="tooltip">FAQ's</span>
                </li>
                <li class="conteudo-nav">
                    <a href="#" class="link-nav">
                        <span class="nav-icon material-symbols-outlined">groups</span>
                        <span class="label-nav">Sobre Nós</span>
                    </a>
                    <span class="tooltip">Sobre Nós</span>
                </li>
                <li class="conteudo-nav">
                    <a href="#" class="link-nav">
                        <span class="nav-icon material-symbols-outlined">article</span>
                        <span class="label-nav">Blogue</span>
                    </a>
                    <span class="tooltip">Blogue</span>
                </li>
            </ul>
            <ul class="lista-nav secondary-nav">
                <li class="conteudo-nav">
                    <a href="conta.html" class="link-nav">
                        <span class="nav-icon material-symbols-outlined">account_circle</span>
                        <span class="label-nav">Conta</span>
                        <span class="tooltip">Conta</span>
                    </a>
                </li>
                <li class="conteudo-nav">
                    <a href="#" class="link-nav">
                        <span class="nav-icon material-symbols-outlined">shopping_cart</span>
                        <span class="label-nav">Carrinho</span>
                        <span class="tooltip">Carrinho</span>
                    </a>
                </li>
                <li class="conteudo-nav">
                    <a href="#" class="link-nav">
                        <span class="nav-icon material-symbols-outlined">favorite</span>
                        <span class="label-nav">Favoritos</span>
                        <span class="tooltip">Favoritos</span>
                    </a>
                </li>
            </ul>
        </div>

<?php

require_once 'conectar.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $Id_Planta = intval($_GET['id']);

$sql="SELECT * FROM plantas WHERE Id_Planta=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $Id_Planta);
mysqli_stmt_execute($stmt);
$products_run = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($products_run) > 0)
            {
                $planta = mysqli_fetch_assoc($products_run);
                    ?>
                    <div class="planta-detalhes">
                        <div class="imagem">
                        <img src="<?php echo $planta['Imagem']; ?>" alt="Imagem">
                        </div>
                        <div class="info">
                            <h1><?php echo $planta['Nome_Científico']; ?></h1>
                            <h2><?php echo $planta['Nome_Comum']; ?></h2>
                            <p class="preco">€<?php echo $planta['Preço']; ?></p>
                            <p class="desc"><?php echo $planta['Descrição']; ?></p>
                            <div class="opcoes">
                                <p>Escolha o tamanho da planta</p>
                                <button class="opcao"><?php echo $planta['Altura'] .' | '. $planta['Diâmetro']; ?></button>
                            </div>
                            <div class="quant">
                                <p>Quantidade</p>
                                <button class="diminuir" onclick="alterarQuantidade(-1)">-</button>
                                <span class="quantidade" id="quantidade">1</span>
                                <button class="aumentar" onclick="alterarQuantidade(1)">+</button>
                            </div>
                            <form id="carrinho-form" method="POST" action="">
                                <input type="hidden" name="quantidade" id="input-quantidade" value="1">
                                <button type="submit" class="adicionar-carrinho">Adicionar ao carrinho</button>
                            </form>
                        </div>
                    </div>
                    <?php
    }
    else{
        echo "Sem resultados";
    }
}
?>

</section>
<section id="pag2" class="pag2">
<div class="info-cuidados">
    <div class="caixa-cuidados">
        <h3>Luminosidade <i class="fa-solid fa-sun"></i></h3><br>
        <p class="luminosidade"><?php echo $planta['Luminosidade']; ?></p>
    </div>
    <div class="caixa-cuidados">
        <h3>Rega <i class="fa-solid fa-droplet"></i></h3><br>
        <p class="rega"><?php echo $planta['Rega']; ?></p>
    </div>
    <div class="caixa-cuidados">
        <h3>Clima <i class="fa-solid fa-cloud"></i></h3><br>
        <p class="clima"><?php echo $planta['Clima']; ?></p>
    </div>
</div>

    <div class="caixa-reviews">
        <h3>Avaliações</h3>
        <div class="lista-reviews">
            <?php
                require_once 'conectar.php';

                $re="SELECT r.review_texto, r.Data_Criação, r.rating, u.Nome AS Nome
                        FROM reviews r 
                        JOIN utilizadores u ON r.Id_Cliente = u.Id_Cliente 
                        WHERE r.Id_Planta = ?
                        ORDER BY r.Data_Criação DESC";
                $review = mysqli_prepare($con, $re);
                if (!$review) {
                    die("Erro na preparação da consulta: " . mysqli_error($con));
                }
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $Id_Planta = intval($_GET['id']);
                } else {
                    die("ID inválido");
                }
                if (!$con) {
                    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
                }
                
                mysqli_stmt_bind_param($review, "i", $Id_Planta);
                mysqli_stmt_execute($review);
                $reviews_run = mysqli_stmt_get_result($review);

                if(mysqli_num_rows($reviews_run) > 0) {
                    while($row=mysqli_fetch_assoc($reviews_run)){
            ?>
            <div class="review_cliente">
                <p class="nome_review"><?php echo $row['Nome']; ?></p>
                <div class="rating">
                <?php
                $ratings = $row['rating'];

                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $ratings) {
                        echo '<i class="fa-solid fa-star"></i>';
                    } else {
                        echo '<i class="fa-regular fa-star"></i>';
                    }
                }
                ?>
                </div>
                <p class="data"><?php echo date('Y-m-d', strtotime($row['Data_Criação'])); ?></p>
                <p class="texto_review"><?php echo $row['review_texto']; ?></p>
            </div>
            <?php
                } 
            } else {
                echo "<p>Sem avaliações para esta planta.</p>";
            }
            ?>
            <?php

            $_SESSION['Id_Cliente']=$id_cliente;

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review_texto']) && !empty($_POST['review_texto'])) {
                if (isset($_SESSION['Id_Cliente'])) {
                    $id_cliente = $_SESSION['Id_Cliente'];
                    $review_texto = trim($_POST['review_texto']);
                    $Id_Planta = intval($_GET['Id_Planta']);
            
                    $r = "INSERT INTO reviews (Id_Cliente, Id_Planta, review_texto, Data_Criação) VALUES (?, ?, ?, NOW())";
                    $stm = mysqli_prepare($con, $r);
            
                    if ($stm) {
                        mysqli_stmt_bind_param($stm, "iis", $id_cliente, $Id_Planta, $review_texto);
                        if (mysqli_stmt_execute($stm)) {
                            echo "<p>Avaliação enviada com sucesso!</p>";
                        } else {
                            echo "<p>Erro ao enviar a avaliação. Tente novamente.</p>";
                        }
                    } else {
                        echo "<p>Erro na preparação da consulta: " . mysqli_error($con) . "</p>";
                    }
                } else {
                    echo "<p>Você precisa estar logado para enviar uma avaliação.</p>";
                }
            }
            
        ?>
        </div>
        <form method="POST" action="">
            <textarea name="review_texto" placeholder="Escreva a sua avaliação aqui..."></textarea>
            <button type="submit" class="add-reviews">Enviar</button>
        </form>
    </div>
</section>
<div class="footer">
            <div>
                <h3>Sobre</h3>
                <br><a href="#">Contactos</a>
                <br><a href="sobre.html">Sobre Nós</a>
                <br><a href="#">Blogue</a>
            </div>
            <div>
                <h3>Informações</h3>
                <br><p>+351 967 500 772</p>
                <br><p>+351 969 892 694</p>
                <br><p>geral@naturalis.pt</p>
            </div>
            <div>
                <h3>Redes Sociais</h3>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            &copy; Naturalis 2025
        </div>
</body>