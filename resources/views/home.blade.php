@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header bg-info">DASHBOARD</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header bg-info">Ciudades</div>
                                    <div class="card-body">
                                        <h4>{{$cities}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header bg-info">Clientes</div>
                                    <div class="card-body">
                                        <h4>{{$clients}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header bg-info">Usuarios</div>
                                    <div class="card-body">
                                        <h4>{{$users}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
