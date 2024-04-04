@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'boards')
@section('main')
<h2>boards</h2>
<hr>
<div class="row">
    <div class="col">
        @foreach($boards as $board)
        <a class="btn btn-info" href="{{ route('kanban.kanban.boards.show', compact('board')) }}">{{$board->title}} [Владелец: {{$board->owner()->name}}]</a>
        <br>
        
        <br><br>
        @endforeach
    </div>
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('kanban.kanban.boards.create') }}">Добавить</a>
        </div>
    </div>
</div>
@endsection