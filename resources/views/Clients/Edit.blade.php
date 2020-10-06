@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">{{ __('Editar ciudad') }}</div>

                <div class="card-body">
                    <form method="POST" action="/clients/update/{{$client->id}}">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $client->name }}" placeholder="Nombre" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                            </div>
                            <select id="city_id" class="form-control @error('city_id') is-invalid @enderror" name="city_id" value="{{ $client->city->name }}" required>
                                <option value="">Seleccione una ciudad</option>
                                @foreach($cities as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0 text-right">
                            <a class="btn btn-secondary" href="{{ url('/clients') }}">Cancelar</a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Editar ciudad') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
