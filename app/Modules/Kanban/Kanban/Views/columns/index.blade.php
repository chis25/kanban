@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'columns')
@section('main')
<h2>columns</h2>
<hr>
<div class="row">
    <div class="col">
        @foreach($columns as $column)
        <a class="btn btn-info" href="{{ route('kanban.kanban.columns.show', compact('column')) }}">{{$column->title}}</a>
        <br><br>
        @endforeach
    </div>
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('kanban.kanban.columns.create') }}">Добавить</a>
        </div>
    </div>
</div>
@endsection