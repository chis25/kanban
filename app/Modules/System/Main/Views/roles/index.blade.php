@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'Роли')
@section('main')
<h2>Роли</h2>
<hr>
<div class="row">
    <div class="col">
        @foreach($roles as $role)
        <a class="btn btn-info" href="{{ route('system.main.roles.show', compact('role')) }}">{{$role->title}}</a>
        <br><br>
        @endforeach
    </div>
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('system.main.roles.create') }}">Добавить</a>
        </div>
    </div>
</div>
@endsection