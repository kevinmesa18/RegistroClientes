@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">Clientes</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-sm table-hover table-striped text-center table-bordered">
                            <thead class="bg-info">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Ciudad</th>
                                    <th scope="col">Fecha Registro</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->city->name}}</td>
                                        <td>{{$client->created_at}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning" href="/user/edit?id={{$client->id}}"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-sm btn-danger" href="/user/delete?id={{$client->id}}"><i class="fas fa-window-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contenedor">
        <button class="bg-success botonF1">
            <i class="fas fa-plus"></i>
        </button>
    </div>
@endsection
