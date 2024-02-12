 <!-- Modal Excluir Cor -->
 <div class="fixed inset-0 bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75 flex items-center justify-center z-50" x-show="$wire.open">
    <div class="bg-white dark:bg-gray-800 rounded-lg p-8 max-w-md w-full">
        <svg class="mx-auto mb-4 text-gray-700 dark:text-gray-300 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
        </svg>
        <p class="mb-8 font-medium text-gray-700 dark:text-gray-300 text-xl">Deseja realmente excluir a mensagem?</p>
        <div class="flex justify-center">
            <form wire:submit.prevent="excluirMensagem" id="excluirMensagemForm">
                <input type="hidden" wire:model="mensagemId" id="mensagemIdInput" name="mensagem_id" value="{{ $mensagemId }}">
                <button type="button" class="font-medium text-lg px-4 py-2.5 bg-gray-300 hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-400 rounded-lg mr-2" id="cancelBtnMensagemExcluir" x-on:click="$wire.open = false; window.location.reload();">Cancelar</button>
                <button type="submit" class="font-medim text-lg text-white bg-red-600 hover:bg-red-800 dark:bg-red-700 dark:hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg inline-flex items-center px-5 py-2.5 text-center" id="confirmBtnMensagemExcluir">Excluir</button>
            </form>
        </div>
    </div>
</div>
