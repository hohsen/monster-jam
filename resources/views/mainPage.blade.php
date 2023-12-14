@vite(['/resources/css/_zeroing.css', 'resources/js/app.js'])
@vite(['/resources/css/index.css', 'resources/js/app.js'])

<div class="container">
    <div class="main">
        <div class="main__nav">
            <a class="main__nav_title" href="{{ url('/') }}">monster jam</a>

            @if (Route::has('login'))
            <div class="main__nav_logInBtn">
                @auth
                    <a href="{{ url('/home') }}">Profile</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                @endauth
            </div>
            @endif
        </div>
        <div class="main__slider">
            <div class="main__slider_img"></div>
            <div class="main__slider_dots">...</div>
        </div>
    </div>
    <div class="news">
        <a class="news__title" href="{{ url('/articles') }}">news</a>
        <div class="news__list">
            <div class="news__list_img"></div>
            <div class="news__list_title"><p>title</p></div>
        </div>
    </div>
    <div class="champions">
        <a class="champions__title" href="{{ url('/championsList') }}">champions</a>
        {{-- @foreach ($champions as $champion) --}}
            <div class="champions__list">
                <div class="champions__list_img"></div>
                <div class="champions__list_name"><p>name</p></div>
            </div>
        {{-- @endforeach --}}
    </div>
</div>


