
<html lang="pt_BR"
      ng-app="formApp">

    <header>

        <meta charset="UTF-8">

        <title>Cadastro de aluno</title>

        <script type="text/javascript" src="assets/js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="assets/js/datatable.js"></script>
        <script type="text/javascript" src="assets/js/angular.min.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/controller.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/datatable.css">
        <link rel="stylesheet" type="text/css" href="assets/css/tabela.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">


        <script>

            $(document).ready(function () {
                $("#header").load('header.php'); //* Carrega  o arquivo header.php *//
                $("#cadastro").load('cadastro.php'); //* Carrega  o arquivo cadastro.php *//
                $("#tabela").load('tabela.php'); //* Carrega  o arquivo tabela.php *//
                $("#footer").load('footer.php'); //* Carrega  o arquivo footer.php *//
            });

        </script>

    </header>

    <body>
        <div class="container">

            <div id="header"></div>

            <div id="cadastro"></div>

            <div id="tabela"></div>

            <div id="footer"></div>

        </div>

    </body>

</html>

