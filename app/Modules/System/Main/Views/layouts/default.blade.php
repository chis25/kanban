<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script>

    </script>
    <script src=""></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Вход</a>
                        </li>
                        @endguest
                        @can('index', App\Modules\System\Main\Models\User::class)
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('system.main.users.index') }}">Пользователи</a>
                        </li>
                        @endcan
                        @can('index', App\Modules\System\Main\Models\Role::class)
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('system.main.roles.index') }}">Роли</a>
                        </li>
                        @endcan
                        @can('index', App\Modules\Kanban\Kanban\Models\Board::class)
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('kanban.kanban.boards.index') }}">КАНБАН</a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <div class="container">
        @yield('main')
    </div>
</body>

</html>