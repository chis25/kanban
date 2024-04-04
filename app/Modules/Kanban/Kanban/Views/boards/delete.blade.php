@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'boards')
@section('main')
<h3>Объект будет безвозвратно удален!</h3>
<br>
<form action="{{ route('kanban.kanban.boards.destroy', compact('board')) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" class="btn btn-primary" value="Удалить">
</form>
@endsection('main')