@extends('layout')

@section('header')
Temporadas de {{$serie->name}}
@endsection

@section('content')
<ul class="list-group">
    @foreach($seasons as $season)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="/temporadas/{{$season->id}}/episodios">
            Temporada {{$season->number}}
        </a>
        <span class="badge badge-secondary">
            {{$season->getWatchedEpisodes()->count()}}
        </span>
    </li>
    @endforeach
</ul>
@endsection