@extends('layouts.main')

@section('title', 'Eventos Una')

@section('content')

<div id="search-container" class="col-md-12">
    <h1> Busque um evento </h1>
    <form action="/" method="GET">
        @csrf
        <div id="search-container-bar">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        <button type="submit"><ion-icon name="search-outline"></ion-icon></button>
        </div>
    </form>    
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Próximos eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src="img/events/{{ $event->image }}" alt="{{ $event->title }}" class="card-image">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-participants">{{ count($event->users) }} participantes</p>
                <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($events) == 0 && $search)
            <h1>Não foi possivel encontrar nenhum evento com {{ $search }}! <a href="/">Ver todos os eventos</a></h1>
        @elseif(count($events) == 0)
            <h1>Não há eventos disponiveis</h1>  
        @endif    
    </div>
</div>

@endsection
