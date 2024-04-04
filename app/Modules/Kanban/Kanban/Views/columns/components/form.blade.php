<div class="form-group mb-3">
    <label for="title">title</label>
    <input name="title" id="title" class="form-control" value="{{$column->title??old('title')}}" required>
</div>

<div class="form-group mb-3">
    <label for="color">color</label>
    <input type="color" name="color" id="color" class="form-control" value="{{$column->color??old('color')}}" required>
</div>
