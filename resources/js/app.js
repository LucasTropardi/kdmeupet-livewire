import './bootstrap';

// Selecionar raças e tamanhos para cadastro animal
function atualizarOpcoesRacaETamanho() {
    var especieId = $('#especie_id').val();

    $.ajax({
        url: '/buscar-racas',
        method: 'GET',
        data: { especie_id: especieId },
        success: function (response) {
            var racaSelect = $('#raca_id');
            racaSelect.empty();

            if (response.racas && response.racas.length > 0) {
                $.each(response.racas, function (index, raca) {
                    racaSelect.append('<option value="' + raca.id + '">' + raca.racaNome + '</option>');
                });
            } else {
                racaSelect.append('<option value="">Nenhuma raça encontrada</option>');
            }
        },
        error: function (error) {
            console.log('Erro na requisição de raças:', error);
        }
    });

    $.ajax({
        url: '/buscar-tamanhos',
        method: 'GET',
        data: { especie_id: especieId },
        success: function (response) {
            var tamanhoSelect = $('#tamanho_id');
            tamanhoSelect.empty();

            if (response.tamanhos && response.tamanhos.length > 0) {
                $.each(response.tamanhos, function (index, tamanho) {
                    tamanhoSelect.append('<option value="' + tamanho.id + '">' + tamanho.tamanho + '</option>');
                });
            } else {
                tamanhoSelect.append('<option value="">Nenhum tamanho encontrado</option>');
            }
        },
        error: function (error) {
            console.log('Erro na requisição de tamanhos:', error);
        }
    });
}

$('#especie_id').change(function () {
    atualizarOpcoesRacaETamanho();
});

atualizarOpcoesRacaETamanho();




