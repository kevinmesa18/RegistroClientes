@extends('layouts.mail.mail')
@section('content')
<div class="container">
    <p>
        Hola **{{$user->name}}**. <br>
        Estas son las credenciales de acceso al sistema. <br>
        Url: **{{env("APP_URL")}}** <br>
        Usuario: **{{$user->email}}** <br>
        Contraseña: **{{isset($password)?$password:"La que ya utilizas en los sistemas."}}** <br>
        Cordialmente.

    </p>
</div>
@endsection
