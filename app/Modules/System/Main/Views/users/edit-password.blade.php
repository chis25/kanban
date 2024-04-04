@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'Пользователи')
@section('main')
<h2><a href="{{ route('system.main.users.index') }}">Пользователи</a> >> {{$user->name}}</h2>
<hr>
<div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endforeach
        @endif
        <form action="{{route('system.main.users.password.update', compact('user'))}}" method="POST">
            @csrf
            @method('PATCH')
            @include('modules_system_main::users.components.password')
            <br>
            <input type="submit" class="btn btn-primary" value="Сохранить">
        </form>
    </div>
</div>
@endsection