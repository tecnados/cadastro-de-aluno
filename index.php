<?php
require_once 'config.php';
?>
<html>
    <header>
        <meta charset="UTF-8">
        <title><?= $titulo ?></title>
        <script type="text/javascript" src="assets/js/jquery-3.2.1.js"></script>
        <script>
            $(document).ready(function () {
                $("#cadastro").load('cadastro.php'); //* Carrega  o arquivo cadastro.php *//
            });
        </script>
    </header>
    <body>
        <div id="cadastro"></div>
    </body>
</html>

