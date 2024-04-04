@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'roles')
@section('main')
<h2><a href="{{ route('system.main.roles.index') }}">Роли</a> >> {{$role->title}}</h2>
<h3>Объект будет безвозвратно удален!</h3>
<br>
<form action="{{ route('system.main.roles.destroy', compact('role')) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" class="btn btn-primary" value="Удалить">
</form>
@endsection('main')