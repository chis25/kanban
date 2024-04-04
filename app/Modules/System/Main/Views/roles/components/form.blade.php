<div class="form-group mb-3">
    <label for="name">name</label>
    <input name="name" id="name" class="form-control" value="{{$role->name??old('title')}}" required>
</div>
<div class="form-group mb-3">
    <label for="title">title</label>
    <input name="title" id="title" class="form-control" value="{{$role->title??old('title')}}" required>
</div>