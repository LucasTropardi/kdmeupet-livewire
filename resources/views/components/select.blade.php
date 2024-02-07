<!-- resources/views/components/select.blade.php -->

@props(['options', 'name', 'selected' => null])

<select name="{{ $name }}" {{ $attributes }} class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm">
    @foreach($options as $value => $label)
        <option value="{{ $value }}" @if($value == $selected) selected @endif>{{ $label }}</option>
    @endforeach
</select>
