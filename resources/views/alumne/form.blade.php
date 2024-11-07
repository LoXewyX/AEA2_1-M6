@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="mb-5">{{ isset($alumne) ? __("Editar alumne") : __("Afegir alumne") }}</h1>
    </div>

    <form method="POST" action="{{ isset($alumne) ? route('alumne.update', $alumne) : route('alumne.store') }}" class="needs-validation">
        @csrf
        @if(isset($alumne))
            @method("PUT")
        @endif

        <div class="mb-3">
            <label for="nom" class="form-label">{{ __("Nom") }}</label>
            <input name="nom" type="text" class="form-control" value="{{ old('nom', $alumne->nom ?? '') }}" required>
            @error('nom')
                <div class="fs-6 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cognoms" class="form-label">{{ __("Cognoms") }}</label>
            <input name="cognoms" type="text" class="form-control" value="{{ old('cognoms', $alumne->cognoms ?? '') }}" required>
            @error('cognoms')
                <div class="fs-6 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="data_naixement" class="form-label">{{ __("Data de naixement") }}</label>
            <input name="data_naixement" type="date" class="form-control" value="{{ old('data_naixement', $alumne->data_naixement ?? '') }}" required>
            @error('data_naixement')
                <div class="fs-6 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="centre_id" class="form-label">{{ __("Centre") }}</label>
            <select class="form-select" name="centre_id" required>
                @foreach ($centres as $centre)
                    <option value="{{ $centre->id }}" {{ (old('centre_id', $alumne->centre_id ?? '') == $centre->id) ? 'selected' : '' }}>
                        {{ $centre->nom }}
                    </option>
                @endforeach
            </select>
            @error('centre_id')
                <div class="fs-6 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ensenyament_id" class="form-label">{{ __("Ensenyament") }}</label>
            <select class="form-select" name="ensenyament_id" required>
                @foreach ($ensenyaments as $ensenyament)
                    <option value="{{ $ensenyament->id }}" {{ (old('ensenyament_id', $alumne->ensenyament_id ?? '') == $ensenyament->id) ? 'selected' : '' }}>
                        {{ $ensenyament->nom }}
                    </option>
                @endforeach
            </select>
            @error('ensenyament_id')
                <div class="fs-6 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button class="btn btn-primary" type="submit">
                {{ isset($alumne) ? __("Actualitzar") : __("Afegir") }}
            </button>
        </div>
    </form>
</div>
@endsection
