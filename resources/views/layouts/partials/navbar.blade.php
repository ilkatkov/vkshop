<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="logo nav-link  text-secondary"><img id="vkLogo" src="{!! url('images/logo-blue.svg') !!}" alt="logo"><p>Интернет-магазин</p></a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Поиск..." aria-label="Search">
            </form>

            @auth
                <div class="text-end">
                    <a href="{{ route('account') }}" class="btn btn-outline-light me-2">{{auth()->user()->name}}</a>
                    <a href="{{ route('basket') }}" class="btn btn-info me-2">Корзина</a>
                    <a href="{{ route('logout.perform') }}" class="btn btn-danger">Выход</a>
                </div>
            @endauth

            @guest
                <div class="text-end">
                    <a href="{{ route('login.perform') }}" class="btn btn-primary me-2">Вход</a>
                    <a href="{{ route('register.perform') }}" class="btn btn-secondary">Регистрация</a>
                </div>
            @endguest
        </div>
    </div>
</header>
