@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'cards')
@section('main')
<h2><a href="{{ route('kanban.kanban.cards.index') }}">cards</a> >> {{$card->title}}</h2>
<hr>
<div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">
        <form action="{{route('kanban.kanban.cards.users.update', compact('card'))}}" method="POST">
            @csrf
            @method('PATCH')
            @foreach($users as $user)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="users[]" value="<?=$user->id;?>" id="user" {{$card->users->contains($user)?'checked':''}}>
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