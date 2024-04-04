@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'Пользователи')
@section('main')
<h2><a href="{{ route('system.main.users.index') }}">Пользователи</a> >> {{$user->name}}</h2>
<h3>Объект будет безвозвратно удален!</h3>
<br>
<form action="{{ route('system.main.users.destroy', compact('user')) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" class="btn btn-primary" value="Удалить">
</form>
@endsection('main')