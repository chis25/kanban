@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'boards')
@section('main')
<h2><a href="{{ route('kanban.kanban.boards.index') }}">boards</a> >> {{$board->title}}</h2>
<hr>
<div class="row">
    <div class="col">
        <div class="row">
            @foreach($board->columns as $column)
            <div class="col">
                <h3>{{$column->title}}</h3>
                <hr>
                <a class="list-group-item" href="{{ route('kanban.kanban.columns.edit', compact('column')) }}">Редактировать</a>
                <a class="list-group-item" href="{{ route('kanban.kanban.columns.delete', compact('column')) }}">Удалить</a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('kanban.kanban.columns.create', compact('board')) }}">Добавить столбец</a>
            <a class="list-group-item" href="{{ route('kanban.kanban.boards.edit', compact('board')) }}">Редактировать</a>
            <a class="list-group-item" href="{{ route('kanban.kanban.boards.delete', compact('board')) }}">Удалить</a>
        </div>
    </div>
</div>
@endsection