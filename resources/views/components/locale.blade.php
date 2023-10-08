<div class="dropdown">
    <button class="btn border-0 px-4 rounded-pill fs-6 dropdown-toggle" type="button" id="dropdown-locale" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="fi fi-{{ \App\Constants\General::LOCALES[App::getLocale()]['flag'] }}"></span>
        {{-- {{ __(\App\Constants\General::LOCALES[App::getLocale()]['title']) }} --}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdown-locale">
        @foreach (\App\Constants\General::LOCALES as $key => $item)
            <li>
                <a class="dropdown-item" href="{{ route('locale.update', $key) }}">
                    <span class="fi fi-{{ $item['flag'] }}"></span>
                    {{ __($item['title']) }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
