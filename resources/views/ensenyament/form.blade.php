<div class="w-full">
    <div class="flex flex-wrap">
        <h1 class="mb-5">{{ $title }}</h1>
    </div>
</div>

<form method="POST" action="{{ $route }}" class="needs-validation">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    <div class="mb-3">
        <label for="nom" class="form-label">{{ __("Nom") }}</label>
        <label for="descripcio" class="form-label">{{ __("Descripció") }}</label>
        <input name="nom" type="text" class="form-control" value="{{ old("nom") ?? $ensenyament->nom }}">
        @error("nom")
        <div class="fs-6 text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit">
            {{ $textButton }}
        </button>
    </div>
</form>