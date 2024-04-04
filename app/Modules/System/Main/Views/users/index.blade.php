@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'Пользователи')
@section('main')
<h2>Пользователи</h2>
<hr>
<div class="row">
    <div class="col">
        @foreach($users as $user)
        <a class="btn btn-info" href="{{ route('system.main.users.show', compact('user')) }}">{{$user->name}}</a>
        <br><br>
        @endforeach
    </div>
    <div class="col-3">
        <div class="list-group">
            <a class="list-group-item" href="{{ route('system.main.users.create') }}">Добавить</a>
        </div>
    </div>
</div>
@endsection