<div class="fixed top-4 right-4 z-50" x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)">
    @if(Session::has('success'))
        <div x-show="show" class="rounded-lg bg-red-500 text-white px-6 py-3 shadow-md" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div x-show="show" class="rounded-lg bg-yellow-600 text-white px-6 py-3 shadow-md" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif
</div>

<!-- Mensagem de sucesso para novo cadastro -->
<div>
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)">
        @if(Session::has('new_success'))
            <div x-show="show" class="fixed top-4 right-4 z-50 rounded-lg bg-green-600 text-white px-4 py-2 shadow-md" role="alert">
                {{ Session::get('new_success') }}
            </div>
        @endif
    </div>
</div>

<!-- Mensagem de sucesso para atualização -->
<div>
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)">
        @if(Session::has('update_success'))
            <div x-show="show" class="fixed top-4 right-4 z-50 rounded-lg bg-blue-500 text-white px-4 py-2 shadow-md" role="alert">
                {{ Session::get('update_success') }}
            </div>
        @endif
    </div>
</div>
