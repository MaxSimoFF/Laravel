<div class="col-md-12 my-1">
    <div class="input-group input-group-lg">
        <div class="input-group-prepend">
            <span class="input-group-text">{{ $spanText }}</span>
        </div>
        <input type="{{ $type }}" name="{{ $name }}" class="form-control {{ $class }} @error($name) is-invalid @enderror" value="{{ $value }}">
    </div>
    @error('first_name') <span class="text-danger pl-2">{{ $message }}</span>@enderror
</div>