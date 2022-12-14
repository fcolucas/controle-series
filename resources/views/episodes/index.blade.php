@extends('layout')

@section('header')
Episódios
@endsection

@section('content')
@include('message', ['message' => $message])
<form action="/temporada/{{$seasonId}}/episodios/assistir" method="post">
    @csrf
    <ul class="list-group">
        @foreach($episodes as $episode)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episodio {{$episode->number}}
            <input type="checkbox" name="episodes[]" value="{{$episode->id}}" {{$episode->watched ? 'checked' :
            ''}}
            >
        </li>
        @endforeach
    </ul>

    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
</form>
@endsection