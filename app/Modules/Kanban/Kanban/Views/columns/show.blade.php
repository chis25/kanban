@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'columns')
@section('main')
<h2><a href="{{ route('kanban.kanban.columns.index') }}">columns</a> >> {{$column->title}}</h2>
<hr>
<div class="row">
    <div class="col">
    </div>
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('kanban.kanban.columns.edit', compact('column')) }}">Редактировать</a>
            <a class="list-group-item" href="{{ route('kanban.kanban.columns.delete', compact('column')) }}">Удалить</a>
        </div>
    </div>
</div>
@endsection