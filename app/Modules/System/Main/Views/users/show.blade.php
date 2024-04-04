@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'Пользователи')
@section('main')
<h2><a href="{{ route('system.main.users.index') }}">Пользователи</a> >> {{$user->name}}</h2>
<hr>
<div class="row">
    <div class="col">
        <ul class="list-group">
            @foreach($user->roles as $role)
            <li class="list-group-item">{{$role->title}}</li>
            @endforeach
        </ul>
    </div>
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('system.main.users.edit', compact('user')) }}">Редактировать</a>
            <a class="list-group-item" href="{{ route('system.main.users.password.edit', compact('user')) }}">Изменить пароль</a>
            <a class="list-group-item" href="{{ route('system.main.users.roles.edit', compact('user')) }}">Роли</a>
            <a class="list-group-item" href="{{ route('system.main.users.delete', compact('user')) }}">Удалить</a>
        </div>
    </div>
</div>
@endsection