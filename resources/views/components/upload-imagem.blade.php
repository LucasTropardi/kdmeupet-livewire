<!-- resources/views/components/upload-imagem.blade.php -->

@props(['disabled' => false, 'inputName' => 'anFoto'])

<div>
    <label for="{{ $inputName }}" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Selecione uma imagem</label>
    <input type="file" id="{{ $inputName }}" name="{{ $inputName }}" accept=".jpg, .jpeg, .png"
           {{ $disabled ? 'disabled' : '' }}
           {!! $attributes->merge(['class' => 'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400']) !!}>
    @error($inputName)
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
