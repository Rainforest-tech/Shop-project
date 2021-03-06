<!DOCTYPE html>
<html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name = "csrf-token" content = "{{ csrf_token() }}">

    <title></title>


    <!-- Styles -->
    <link href = "{{ asset('css/style.css') }}" rel = "stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity = "sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
          crossorigin = "anonymous">
    <!-- Scripts -->
    <script src = "{{ asset('js/app.js') }}"></script>
</head>
<body>
@if(Route::is('index'))
    <div class = "main_promo">
        @endif
        <header class = "container">
            <div class = "header__menu">
                <div class = "logo">
                    <a href = "/">
                        <img src = "{{asset('images/logo.png')}}" alt = "">
                    </a>
                </div>

                <!--<nav>-->
                <ul>
                    @isset($categories)
                        @foreach($categories as $category)
                            <li><a href = "{{route('category', $category->id)}}"
                                   @isset($currentCategory)
                                   class = "{{$category->id === $currentCategory->id ? 'active' : ''}}"
                                   @endisset
                                   title = "link">{{$category->name}}</a></li>
                        @endforeach
                    @endisset
                </ul>
                <!--</nav>-->

                <div class = "header__right">
                    <ul>


                        @auth
                            <li>
                                <a href = "{{ url('/logout') }}" class = "reg">??????????</a>
                            </li>

                        @else
                            <li>
                                <a href = "#" title = "link" class = "login"> <i
                                        class = "sprite sprite-login"></i>??????????</a>
                            </li>
                            <li>
                                <a href = "#" title = "link" class = "reg">??????????????????????</a>
                            </li>
                        @endauth
                    </ul>
                    <a class = "header__cart" href = "#">
                        <span class = "price_value">{{session('total_price_spaced', 0)}}</span> <span class = "desc"> ??????.</span>
                        <br>
                        <span class = "cart__sub"><span class = "count_value">{{session('total_count', 0)}}</span> ????????????????</span>
                    </a>
                </div>
            </div>
            @if(Route::is('index'))
                <div class = "header__promo_wrapper">
                    <div class = "header__promo">
                        <div class = "header__promo_h1">
                            <span>????????????????</span>

                            ??????????-????????????
                        </div>
                        <div class = "header__promo_desc">
                            ???????????????? ??????????-????????????
                        </div>

                    </div>
                    <a href = "#" class = "header__promo_button float-right">
                        ???????????????????? +
                    </a>

                </div>
            @endif
        </header>
        @if(Route::is('index'))
    </div>
@endif
{{--@include('inc.messages')--}}
<main>
    @yield('content')
</main>
<footer class = "container">
    <span class = "footer__text">
        ???????????? ?????? ???????????????????????????????? ??????????????. <br>
        ???????????????????? ???????????????????? ?????? ???????????????????????????? ?????????? ?????????????????????????????????? <br>
        http://bedev.ru/
    </span>
    <div class = "footer__button">
        <a href = "#">???????????? &#x25B2;</a>
    </div>
</footer>



</body>
</html>
