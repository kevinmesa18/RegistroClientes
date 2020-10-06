@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">Ciudades</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('errors'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('errors') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <table id="cities" class="table table-sm table-hover table-striped text-center table-bordered">
                            <thead class="bg-info">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Clientes asociados</th>
                                    <th scope="col">Fecha Registro</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                    <tr>
                                        <td>{{$city->id}}</td>
                                        <td>{{$city->name}}</td>
                                        <td>{{$city->clients_count}}</td>
                                        <td>{{$city->created_at}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning" href="/cities/edit/{{$city->id}}"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-sm btn-danger" href="/cities/delete/{{$city->id}}"><i class="fas fa-window-close"></i></a>
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
        <a class="botonF1 btn-success" href="{{ route('cities/create') }}">
            <i class=" fas fa-plus"></i>
        </a>
    </div>
@endsection
