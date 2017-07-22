<?php ?>

<!-- Tabela de listagem dos alunos cadastrados-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/tabela.js"></script>
<script type="text/javascript" src="assets/js/jquery.mask.min.js"></script>
<div class="text-center">
    <h2>Lista de alunos cadastrados</h2>
    <hr></hr>
</div>
<center>
    <!-- TABELA DE ALUNOS-->
    <table id="listar" class="table table-striped" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>NOME</th>
                <th>CPF</th>
                <th>IDADE</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
    </table>
</center>

<!-- POPUP EDITAR-->
<div class="modal fade" id="editar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Aluno</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nome">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nome-editar" placeholder="Digite seu nome ..." name="nome-editar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cpf">CPF:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cpf-editar" placeholder="Digite seu CPF ..." name="cpf-editar"data-mask="000.000.000-00" data-mask-selectonfocus="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="idade">Idade:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="idade-editar" placeholder="Digite sua idade ..." name="idade-editar">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-primary" id="botao-editar">Editar aluno</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar janela</button>
            </div>
        </div>

    </div>
</div>

