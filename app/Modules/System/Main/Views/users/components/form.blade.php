<div class="form-group mb-3">
    <label for="name">Имя</label>
    <input name="name" id="name" class="form-control" value="{{$user->name??old('name')}}" required>
</div>

<div class="form-group mb-3">
    <label for="email">Почта</label>
    <input name="email" id="email" class="form-control" value="{{$user->email??old('email')}}" required>
</div>
