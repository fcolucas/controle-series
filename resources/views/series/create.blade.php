@extends('layout')

@section('header')
Adicionar Série
@endsection

@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post">
    @csrf
    <div class="row align-items-end">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" name="name" class="form-control" id="nome">
        </div>
        <div class="col col-2">
            <label for="qtd_temporadas">Nº temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>
        <div class="col col-2">
            <label for="ep_por_temporada">Ep. por temporada</label>
            <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
        </div>
    </div>
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
@endsection