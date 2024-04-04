@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'boards')
@section('main')
<h2><a href="{{ route('kanban.kanban.boards.index') }}">boards</a> >> {{$board->title}}</h2>
<hr>
<div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">
        <form action="{{route('kanban.kanban.boards.users.update', compact('board'))}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="users[]" value="<?=$board->owner()->id;?>" >
            @foreach($users as $user)
            @if ($board->owner()->id === $user->id)
                @continue
            @endif
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="users[]" value="<?=$user->id;?>" id="user" {{$board->users->contains($user)?'checked':''}}>
                <label class="form-check-label" for="user">
                    <?=$user->name;?>
                </label>
            </div>
            @endforeach
            <br>
            <input type="submit" class="btn btn-primary" value="Сохранить">
        </form>
    </div>
</div>
@endsection