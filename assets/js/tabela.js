$(document).ready(function () {
    //Cadastrar aluno
    $("#botao").click(function () {
        var nome = $('#nome').val();
        var cpf = $('#cpf').val();
        var idade = $('#idade').val();
        if (nome == '') {
            alert('Campo nome esta vazio!');
        } else
        if (cpf == '') {
            alert('Campo cpf esta vazio!');
        } else
        if (idade == '') {
            alert('Campo idade esta vazio!');
        } else {
            $.ajax({
                type: 'post',
                url: 'app/Aluno.php',
                data: {
                    metodo: 'cadastrar',
                    nome: $('#nome').val(),
                    cpf: $('#cpf').val(),
                    idade: $('#idade').val()
                },
                success: function (data) {
                    $('#nome').val('');
                    $('#cpf').val('');
                    $('#idade').val('');
                    tabela.datatable.ajax.reload(); // Recarrega a tabela.
                    alert(data);
                }/* ... */
            });
        }

    });
    //Cria a tabela.
    var criarTabela = function () {
        this.datatable = null;
        this.init = function () {
            this.datatable = $('#listar').DataTable({//cria a tabela
                ordering: true,
                processing: true,
                responsive: true,
                destroy: true,
                order: [[0, 'des'], [1, 'des']],
                ajax: {
                    url: "app/Aluno.php",
                    data: {metodo: 'listar'},
                    type: "POST"
                },
                language: {
                    url: "assets/js/pt_br.json"
                },
                columns: [
                    {"data": "nome"},
                    {"data": "cpf"},
                    {"data": "idade"},
                    {
                        data: null,
                        render: function (data) {
                            var html = '<div style="min-width:15px; align-content: center; font-size: 20px;">';
                            html += '<button type="button" class="btn" data-toggle="modal" data-target="#editar" id="pegaid" value="' + data.id + '"><span class= "glyphicon glyphicon-edit "></span></button>';
                            html += '</div>';
                            return html;
                        }
                    },
                    {
                        data: null,
                        render: function (data) {
                            var html = '<div style="min-width:15px" align-content: center>';
                            html += '<button type="button" class="btn" id="excluir" value="' + data.id + '" style=" text-align: center; font-size: 20px; color: red;"> X </button>';
                            html += '</div>';
                            return html;
                        }
                    }
                ]
            });
            this.datatable.on('draw', function () {

                //Exclui aluno.
                $('#excluir').on('click', function () {
                    var id = $(this).attr('value');
                    $.ajax({
                        type: 'post',
                        url: 'app/Aluno.php',
                        data: {
                            metodo: 'excluir',
                            id: id
                        },
                        success: function (data) {
                            tabela.datatable.ajax.reload();
                            alert(data);
                        }/* ... */
                    });
                });
                //Pega o id do aluno
                $('#pegaid').on('click', function () {
                    var id = $(this).attr('value');
                    $.ajax({
                        type: 'post',
                        url: 'app/Aluno.php',
                        data: {
                            metodo: 'aluno', //retorna dados do aluno por id!
                            id: id
                        },
                        success: function (data) {

                        }/* ... */
                    });
                    $('#botao-editar').on('click', function () {
                        var nome = $('#nome-editar').val();
                        var cpf = $('#cpf-editar').val();
                        var idade = $('#idade-editar').val();
                        if (nome == '') {
                            alert('Campo nome esta vazio!');
                        } else
                        if (cpf == '') {
                            alert('Campo cpf esta vazio!');
                        } else
                        if (idade == '') {
                            alert('Campo idade esta vazio!');
                        } else {
                            $.ajax({
                                type: 'post',
                                url: 'app/Aluno.php',
                                data: {
                                    metodo: 'editar', //retorna dados do aluno por id!
                                    id: id,
                                    nome: $('#nome-editar').val(),
                                    cpf: $('#cpf-editar').val(),
                                    idade: $('#idade-editar').val()
                                },
                                success: function (data) {
                                    tabela.datatable.ajax.reload();
                                    alert(data);
                                }/* ... */
                            });
                        }
                    });


                });

            });
        };
    };

    tabela = new criarTabela();
    tabela.init(); //Inicia a tabela.



});