$(document).ready(function () {
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
                    url: "app/Listar/dadosTabela",
                    type: "POST"
                },
                language: {
                    url: "assets/js/pt_br.json"
                },
                columns: [
                    {"data": "id"},
                    {"data": "codigo"},
                    {"data": "contador"},
                    {
                        data: null,
                        render: function (data) {
                            var html = '<div style="min-width:70px" align-content: center>';
                            html += '<div class="excluir" name="excluir" value="' + data.id + '" style=" text-align: center; font-size: 20px; color: red; cursor: pointer;"> X </div>';
                            html += '</div>';
                            return html;
                        }
                    },
                    {
                        data: null,
                        render: function (data) {
                            var html = '<div style="min-width:70px" align-content: center>';
                            html += '<div class="editar" name="editar" value="' + data.id + '" style=" text-align: center; font-size: 20px; color: red; cursor: pointer;"> X </div>';
                            html += '</div>';
                            return html;
                        }
                    }
                ]
            });
            this.datatable.on('draw', function () {

                //Button evento cancelamento

                $('.excluir').on('click', function () {
                    var id = $(this).attr('value');
                    $.ajax({
                        type: 'post',
                        url: 'removerCodigo.php',
                        data: {
                            id: id
                        },
                        success: function () {
                            tabela.datatable.ajax.reload();
                            alert('Codigo excluido com sucesso!');
                        }/* ... */
                    });
                });

            });
        };
    };

    tabela = new criarTabela();
    tabela.init();

});