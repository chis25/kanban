@extends(config('modules.views.layout', 'layouts.default'))
@section('title', 'columns')
@section('main')
<h2>Новая</h2>
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
        <form action="{{route('kanban.kanban.columns.update', compact('column'))}}" method="POST">
            @csrf
            @method('PATCH')
            @include('modules_kanban_kanban::columns.components.form')
            <br>
            <input type="submit" class="btn btn-primary" value="Сохранить">
        </form>
    </div>
</div>
@endsection