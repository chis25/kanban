@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'Авторизация')
@section('main')
<h2>Авторизация</h2>
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
        <form action="{{route('auth')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Почта</label>
                <input name="email" id="email" class="form-control" value="{{old('email')}}" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" class="form-control" value="" required>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Сохранить">
        </form>
    </div>
</div>
@endsection