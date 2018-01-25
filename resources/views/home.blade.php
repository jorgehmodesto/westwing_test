@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12" style="text-align: center">
            <h1><b>Bem vindo</b>, {{ Auth::user()->name }}.</h1>
            <h4>Acesse o menu, para cadastrar ou consultar atendimentos</h4>
        </div>

    </div>
</div>
@endsection
