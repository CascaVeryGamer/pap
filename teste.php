<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Dado recebido: " . $_POST['teste'];
} else {
    echo "Aguardando POST...";
}
?>
