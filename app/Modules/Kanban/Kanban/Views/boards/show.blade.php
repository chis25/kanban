@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'boards')
@section('main')
<h2><a href="{{ route('kanban.kanban.boards.index') }}">boards</a> >> {{$board->title}}</h2>
<hr>
<div class="row">
    <div class="col">
        <div class="row">
            @foreach($board->columns as $column)
            <div class="col" style="background-color:{{$column->color}}; padding:8px;margin:4px;">
                <h3>{{$column->title}}</h3>
                <hr>
                <a class="list-group-item" href="{{ route('kanban.kanban.cards.create', compact('board', 'column')) }}">Добавить карточку</a>
                <hr>
                @foreach ($column->cards as $card)
                <a class="list-group-item" href="{{ route('kanban.kanban.cards.show', compact('card')) }}">{{$card->title}}</a>
                @endforeach
                <hr>
                @can('edit', $board)
                <a class="list-group-item" href="{{ route('kanban.kanban.columns.edit', compact('column')) }}">Редактировать</a>
                <a class="list-group-item" href="{{ route('kanban.kanban.columns.delete', compact('column')) }}">Удалить</a>
                @endcan
            </div>
            @endforeach
        </div>
    </div>
    @can('edit', $board)
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('kanban.kanban.columns.create', compact('board')) }}">Добавить столбец</a>
            <a class="list-group-item" href="{{ route('kanban.kanban.boards.users.edit', compact('board')) }}">Пользователи</a>
            <a class="list-group-item" href="{{ route('kanban.kanban.boards.edit', compact('board')) }}">Редактировать</a>
            <a class="list-group-item" href="{{ route('kanban.kanban.boards.delete', compact('board')) }}">Удалить</a>
        </div>
    </div>
    @endcan
</div>
@endsection