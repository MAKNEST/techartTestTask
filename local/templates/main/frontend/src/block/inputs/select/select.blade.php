<select name="{{ $name }}" class="{{ $block }}">
    @foreach ($value as $chapter)
        <option value="{{ $chapter }}">{{ $chapter }}</option>
    @endforeach
</select>