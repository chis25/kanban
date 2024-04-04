@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'Пользователи')
@section('main')
<h2><a href="{{ route('system.main.users.index') }}">Пользователи</a> >> {{$user->name}}</h2>
<hr>
<div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">
        <form action="{{route('system.main.users.roles.update', compact('user'))}}" method="POST">
            @csrf
            @method('PATCH')
            @foreach($roles as $role)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="roles[]" value="<?=$role->id;?>" id="flexCheckDefault" {{$user->roles->contains($role)?'checked':''}}>
                <label class="form-check-label" for="flexCheckDefault">
                    <?=$role->title;?>
                </label>
            </div>
            @endforeach
            <br>
            <input type="submit" class="btn btn-primary" value="Сохранить">
        </form>
    </div>
</div>
@endsection