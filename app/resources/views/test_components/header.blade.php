<div class="d-flex flex-column flex-md-row align-items-center border-bottom">
    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        @if(\Illuminate\Support\Facades\Auth::user())
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('home') }}">Список моих контактов</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('contacts.create') }}">Добавить контакт</a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="py-2 text-dark text-decoration-none">Выйти</button>
            </form>
        @else
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('login') }}">Войти</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('register') }}">Регистрация</a>
        @endif
    </nav>
</div>
