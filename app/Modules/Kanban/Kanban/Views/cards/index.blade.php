@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'cards')
@section('main')
<h2>cards</h2>
<hr>
<div class="row">
    <div class="col">
        @foreach($cards as $card)
        <a class="btn btn-info" href="{{ route('kanban.kanban.cards.show', compact('card')) }}">{{$card->title}}</a>
        <br><br>
        @endforeach
    </div>
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('kanban.kanban.cards.create') }}">Добавить</a>
        </div>
    </div>
</div>
@endsection