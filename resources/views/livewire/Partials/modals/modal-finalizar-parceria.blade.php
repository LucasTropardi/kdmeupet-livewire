<!-- Confirma finalização parceria modal -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75 flex items-center justify-center z-50" x-show="$wire.open">
    <div class="bg-white dark:bg-gray-800 rounded-lg p-8 max-w-md w-full">
        <div title="Publicação finalizada" class="grid justify-items-center p-1 mb-2">
            <div>
                <img src="{{ asset('images/warning-icon.png') }}" alt="Logo" width="70">
            </div>
        </div>
        <p class="mb-4 font-medium text-gray-700 dark:text-gray-300 text-xl">Deseja realmente finalizar a parceria?</p>
        <div class="flex justify-center">
            <form wire:submit.prevent="finalizar" id="finalizarParceriaForm">
                <input type="hidden" wire:model="parceriaId" id="parceriaIdInput" name="parceria_id" value="{{ $parceriaId }}">
                <button type="button" class="font-medium text-lg px-4 py-2.5 bg-gray-300 hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-400 rounded-lg mr-2" id="cancelBtnParceriaFinalizar" x-on:click="$wire.open = false">Cancelar</button>
                <button type="submit" class="font-medim text-lg text-white bg-red-600 hover:bg-red-800 dark:bg-red-700 dark:hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg inline-flex items-center px-5 py-2.5 text-center" id="confirmBtnParceriaFinalizar">Finalizar</button>
            </form>
        </div>
    </div>
</div>
