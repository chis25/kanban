@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'Новая роль')
@section('main')
<h2>Новая роль</h2>
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
        <form action="{{route('system.main.roles.store')}}" method="POST">
            @csrf
            @include('modules_system_main::roles.components.form')
            <br>
            <input type="submit" class="btn btn-primary" value="Сохранить">
        </form>
    </div>
</div>
@endsection