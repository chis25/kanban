@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'Роли')
@section('main')
<h2><a href="{{ route('system.main.roles.index') }}">Роли</a> >> {{$role->title}}</h2>
<hr>
<div class="row">
    <div class="col">
        <ul class="list-group">
        @foreach($role->permissions as $permission)
            <li class="list-group-item"><b>{{$permission->group->title}}</b> : {{$permission->title}}</li>
        @endforeach
        </ul>
    </div>
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('system.main.roles.edit', compact('role')) }}">Редактировать</a>
            <a class="list-group-item" href="{{ route('system.main.roles.permissions.edit', compact('role')) }}">Права доступа</a>
            <a class="list-group-item" href="{{ route('system.main.roles.delete', compact('role')) }}">Удалить</a>
        </div>
    </div>
</div>
@endsection