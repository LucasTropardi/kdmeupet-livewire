document.addEventListener('livewire:load', function () {
    Livewire.on('updateEspecie', function (especieId) {
        // Emitir solicitação Livewire para buscar raças e tamanhos com base na nova espécie selecionada
        Livewire.emit('fetchRacasAndTamanhos', especieId);
    });
});
