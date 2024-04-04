@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'roles')
@section('main')
<h2>{{$role->title}} ({{$role->name}})</h2>
<hr>
<div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">
        <form action="{{route('system.main.roles.permissions.update', compact('role'))}}" method="POST">
            @csrf
            @method('PATCH')
            @foreach($groups as $group)
            <h3>{{$group->title}}</h3>
            @foreach($group->permissions as $permission)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="<?=$permission->id;?>" id="flexCheckDefault" {{$role->permissions->contains($permission)?'checked':''}}>
                <label class="form-check-label" for="flexCheckDefault">
                    <?=$permission->title;?>
                </label>
            </div>
            @endforeach
            @endforeach
            <br>
            <input type="submit" class="btn btn-primary" value="Сохранить">
        </form>
    </div>
</div>
@endsection