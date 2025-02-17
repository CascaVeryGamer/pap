<!DOCTYPE html>
<html>
    <head>
        <title>Inicío</title>
        <link rel="stylesheet" type="text/css" href="css/paginicial.css">
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/76ed8667ce.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="css/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="css/footer.css">
    </head>
    <body>
        <section id="pag1" class="pag1">
        <div class="banner">
            <video autoplay muted loop>
            <source src="imagens/video.mp4" alt="Imagem 1"/>
            </video>
        </div>
        <div class="barralado collapsed">
            <header class="header">
                <button class="toggler barralado-toggler">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </header>
            <ul class="lista-nav primary-nav">
                <li class="conteudo-nav">
                    <a href="paginicial.php" class="link-nav">
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
                    <a href="conta.php" class="link-nav">
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
        <div class="titulo">
            <h1>Welcome to</h1>
            <h2>Sementes & Raízes</h2>
        </div>
        <script src="js/toggle.js"></script>
        <div class="logo">
            <img src="imagens/logo2.png" alt=""/>
        </div>

        <div class="seta">
            <i class="fa-solid fa-arrow-down"></i>
            <p>Descubra Mais</p>
        </div>

        <div class="caixa-pesquisa">
            <form id="form-pesquisa" action="/buscar" method="GET">
                <input type="text" name="q" placeholder="Pesquisar">
                <button type="submit">
                    <span class="material-symbols-outlined procurar">search</span>
                </button>
            </form>
            <div class="resultados"></div>
        </div>
        <script src="pesquisa.js"></script>

    </section>
        <section id="pag2" class="pag2">
        <h1>Novidades</h1>
        <main>

        <?php
            include_once 'conectar.php';

            $query="SELECT * FROM plantas ORDER BY data_criação DESC LIMIT 4";
            $result=mysqli_query($con, $query);

            if($result->num_rows > 0){
                while($planta=$result->fetch_assoc()){
        ?>
                <div class="card-nov">
                    <div class="slides-nov">
                            <div class="imagem">
                                <img src="<?php echo $planta['Imagem']; ?>" alt="Imagem">
                            </div>
                                <p class="nome_planta"><?php echo $planta["Nome_Científico"]; ?></p>
                                <p class="preço">€<?php echo $planta["Preço"]; ?></p>
                                <button class="ver">Ver</button>
                    </div> 
                </div>
                <?php
            }
        } else {
            echo "Nenhuma planta recente encontrada";
        }

        ?>  
        </main>
    </body>
</html>