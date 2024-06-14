$(document).ready(function () {
    function loadTableData(filter = '') {
        $.ajax({
            url: './PHP/fetch-estoque.php',
            type: 'GET',
            success: function (data) {
                let estoques = JSON.parse(data);
                let tbody = $('#tabela-estoque tbody');
                tbody.empty();  // Limpa a tabela antes de adicionar novos dados
                
                // Filtra os dados se houver um filtro
                if (filter) {
                    estoques = estoques.filter(estoque => {
                        return estoque.produto.toLowerCase().includes(filter.toLowerCase()) ||
                               estoque.fornecedor.toLowerCase().includes(filter.toLowerCase());
                    });
                }

                estoques.forEach(function (estoque) {
                    let row = `
                        <tr>
                            <td>${estoque.produto}</td>
                            <td>${estoque.fornecedor}</td>
                            <td>${parseFloat(estoque.preco).toFixed(2)}</td>
                            <td>${estoque.quantidade}</td>
                        </tr>
                    `;
                    tbody.append(row);
                });
            },
            error: function (xhr, status, error) {
                console.error('Erro ao buscar dados do estoque:', error);
            }
        });
    }

    // Chama a função para carregar os dados quando a página é carregada
    loadTableData();

    // Adiciona o evento de clique ao botão de pesquisa
    $('#search-button').click(function () {
        let filter = $('#search-input').val();
        loadTableData(filter);
    });

    // Adiciona o evento de tecla pressionada ao campo de pesquisa para filtrar em tempo real
    $('#search-input').on('keyup', function () {
        let filter = $(this).val();
        loadTableData(filter);
    });
});
