@extends('layout')

@section('header')
Registrar-se
@endsection

@section('content')
<form method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" required class="form-control" id="name">
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" required class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="password">Senha</label>
        <input type="text" name="password" required class="form-control" id="password">
    </div>

    <button type="submit" class="btn btn-primary mt-3">
        Entrar
    </button>
</form>
@endsection