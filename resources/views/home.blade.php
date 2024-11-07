@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panell de control') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Has iniciat sessió!') }}

                    <div class="container text-center mt-5">
                        <div class="row">
                            <div class="col">
                                <a href="{{ url('alumne') }}" class="btn btn-outline-primary btn-lg">👥 Llistat d'alumnes</a>
                            </div>
                            <div class="col">
                                <a href="{{ url('ensenyament') }}" class="btn btn-outline-primary btn-lg">👨‍🏫 Llistat d'ensenyament</a>
                            </div>
                            <div class="col">
                                <a href="{{ url('centre') }}" class="btn btn-outline-primary btn-lg">🏛 Llistat de centres</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection