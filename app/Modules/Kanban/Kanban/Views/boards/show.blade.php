@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'boards')
@section('main')
<h2><a href="{{ route('kanban.kanban.boards.index') }}">boards</a> >> {{$board->title}}</h2>
<hr>
<div class="row">
    <div class="col">
    </div>
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('kanban.kanban.boards.edit', compact('board')) }}">Редактировать</a>
            <a class="list-group-item" href="{{ route('kanban.kanban.boards.delete', compact('board')) }}">Удалить</a>
        </div>
    </div>
</div>
@endsection