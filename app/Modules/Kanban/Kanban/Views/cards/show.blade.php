@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'cards')
@section('main')
<h2><a href="{{ route('kanban.kanban.cards.index') }}">cards</a> >> {{$card->title}}</h2>
<hr>
<div class="row">
    <div class="col">
        <pre>{{$card->task}}</pre>
        <hr>
        <ul class="list-group">
        @foreach($card->users as $user)
            <li class="list-group-item">{{$user->name}}</li>
        @endforeach
        </ul>
    </div>
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('kanban.kanban.cards.edit', compact('card')) }}">Редактировать</a>
            <a class="list-group-item" href="{{ route('kanban.kanban.cards.users.edit', compact('card')) }}">Пользователи</a>
            <a class="list-group-item" href="{{ route('kanban.kanban.cards.delete', compact('card')) }}">Удалить</a>
        </div>
    </div>
</div>
@endsection