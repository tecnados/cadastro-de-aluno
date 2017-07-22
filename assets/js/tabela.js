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
                            var html = '<div style="min-width:70px" align-content: center>';
                            html += '<div class="editar" name="editar" value="' + data.id + '" style=" text-align: center; font-size: 20px; color: red; cursor: pointer;"> X </div>';
                            html += '</div>';
                            return html;
                        }
                    },
                    {
                        data: null,
                        render: function (data) {
                            var html = '<div style="min-width:70px" align-content: center>';
                            html += '<div class="excluir" name="excluir" value="' + data.id + '" style=" text-align: center; font-size: 20px; color: red; cursor: pointer;"> X </div>';
                            html += '</div>';
                            return html;
                        }
                    }
                ]
            });
            this.datatable.on('draw', function () {

                //Exclui aluno.
                $('.excluir').on('click', function () {
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

                //Editar aluno.
                $('.editar').on('click', function () {
                    dialog = $("#dialog-editar").dialog({// Abre dialog de edição de aluno
                        autoOpen: false,
                        height: 400,
                        width: 350,
                        modal: true,
                        buttons: {
                            "Create an account": addUser,
                            Cancel: function () {
                                dialog.dialog("close");
                            }
                        },
                        close: function () {
                            form[ 0 ].reset();
                            allFields.removeClass("ui-state-error");
                        }
                    });
                });

            });
        };
    };

    tabela = new criarTabela();
    tabela.init(); //Inicia a tabela.



});