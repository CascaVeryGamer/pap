<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/plantas.css">
    <link rel="stylesheet" href="css/barralado.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/76ed8667ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Plantas</title>
</head>
<body>

<!-- pesquisa -->

<div class="caixa-pesquisa">
            <form id="form-pesquisa" action="/buscar" method="GET">
                <input type="text" name="q" placeholder="Pesquisar">
                <button type="submit">
                    <span class="material-symbols-outlined procurar">search</span>
                </button>
            </form>
            <div class="resultados"></div>
        </div>
        <script src="js/pesquisa.js"></script>

<!-- Filtro -->

<div class="filtros">
    <form action="" method="GET">
        <h5>Categorias</h5> 
        <div class="filtros-opcoes">
<?php

    require_once 'conectar.php';
    
    $sql="SELECT * FROM plantas WHERE Id_Categoria IN (1, 2, 6, 8, 9)";
    $cat="SELECT * FROM categorias WHERE Id_Categoria IN (1, 2, 6, 8, 9)";
    $all_products=$con->query($sql);
    $filtro=mysqli_query($con, $cat);

    if(mysqli_num_rows($filtro)>0)
    {
        foreach($filtro as $listafiltro)
        {
            $checked=isset($_GET['filtros']) ? $_GET['filtros'] : [];;
            if(isset($_GET['filtros']))
            {
                $checked=$_GET['filtros'];
            }
            ?>
                <div class="filtro-item">
                    <input type="checkbox" name="filtros[]" value="<?=$listafiltro['Id_Categoria'] ?>"
                        <?php if(in_array($listafiltro['Id_Categoria'],$checked)){ echo "checked";} ?>
                    />
                    <?= $listafiltro['Nome']; ?>
                </div>
            <?php
        }
    }
    else
    {
        echo "Sem resultados";
    }
?> 
        </div>
    <button type="submit" class="btnfiltro" >Procurar</button>
    </form>
</div>
<main>

    <?php
        if(isset($_GET['filtros']) && !empty($_GET['filtros']))
        {
            $plantchecked = $_GET['filtros'];
            foreach($plantchecked as $rowplant)
            {
                $products = "SELECT * FROM plantas WHERE Id_Categoria IN ($rowplant)";
                $products_run = mysqli_query($con, $products);
                if(mysqli_num_rows($products_run) > 0)
                {
                    foreach($products_run as $proditems):
                        ?>
                        <div class="card">
                            <div class="imagem">
                                <img src="<?php echo $proditems['Imagem']; ?>" alt="Imagem">
                            </div>
                            <div class="favoritos">
                                <p class="favorito">
                                    <button onclick="toggleFavorito(this)" id="btn1" class="btn btn1"><i class="fa-regular fa-heart"></i></button>
                                    <button style="display:none" onclick="toggleFavorito(this)" id="btn2" class="btn btn2"><i class="fa-solid fa-heart"></i></button>
                                </p>
                                <p class="nome_planta"><?php echo $proditems["Nome_Científico"]; ?></p>
                                <p class="preço">€<?php echo $proditems["Preço"]; ?></p>
                            </div>
                            <form action="planta.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $proditems['Id_Planta']; ?>">
                                <button type="submit" class="ver">Ver</button>
                            </form>
                        </div>
                        <script src="toggle.js"></script>
                        <script src="favorito.js"></script>
                    <?php
                    endforeach;
                }
                else
                {
                    echo "Sem resultados";
                }
            }
        }
        else
        {
            $products = "SELECT * FROM plantas WHERE Id_Categoria IN (1, 2, 6, 8, 9)";
            $products_run = mysqli_query($con, $products);
            if(mysqli_num_rows($products_run) > 0)
            {
                foreach($products_run as $proditems):
                    ?>
                    <div class="card">
                        <div class="imagem">
                            <img src="<?php echo $proditems['Imagem']; ?>" alt="Imagem">
                        </div>
                        <div class="favoritos">
                            <p class="favorito">
                                <button onclick="toggleFavorito(this)" id="btn1" class="btn btn1"><i class="fa-regular fa-heart"></i></button>
                                <button style="display:none" onclick="toggleFavorito(this)" id="btn2" class="btn btn2"><i class="fa-solid fa-heart"></i></button>
                            </p>
                            <p class="nome_planta"><?php echo $proditems["Nome_Científico"]; ?></p>
                            <p class="preço">€<?php echo $proditems["Preço"]; ?></p>
                        </div>
                        <form action="planta.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $proditems['Id_Planta']; ?>">
                            <button type="submit" class="ver">Ver</button>
                        </form>
                    </div>
                    <script src="js/toggle.js"></script>
                    <script src="js/favorito.js"></script>
                <?php
                endforeach;
            }
            else
            {
                echo "Sem resultados";
            }
        }
    ?>

</main>
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