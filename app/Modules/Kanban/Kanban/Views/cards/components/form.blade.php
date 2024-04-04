<div class="form-group mb-3">
    <label for="title">title</label>
    <input name="title" id="title" class="form-control" value="{{$card->title??old('title')}}" required>
</div>

<div class="form-group mb-3">
    <label for="task">task</label>
    <textarea class="form-control" name="task" id="task" cols="30" rows="10" required>{{$card->task??old('task')}}</textarea>
</div>

<div class="form-group mb-3">
    <label for="column_id">column</label>
    <select class="form-select" name="column_id">
        @foreach($columns as $item)
        <option value="{{$item->id}}" {{$item->id===$column->id?'selected':''}}>{{$item->title}}</option>
        @endforeach
    </select>
</div>