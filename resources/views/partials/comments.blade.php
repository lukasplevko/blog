<section class="comment__boxes">
    @if (Auth::user())


        <div class="comment">
            <h1 class="display-5">Komentáre</h1>
            <form action="/{{ Request::segment(1) }}/comment" method="post" class="comment__form">
                @csrf

                <textarea class="comment__area" name="comment" id="" cols="30" rows="3"
                    value="{{ old('commentOld') }}"></textarea>
                <button type="submit" class="btn comment__btn"><img src="{{ asset('svg/send.svg') }}" alt=""
                        class="comment__icon"></button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    @else
        <div class="comment__access-block container">
            <div class="comment__ball"></div>
            <div class="jumbotron comment__access">
                <p class="lead">Pre prístup ku komentárom sa prihlás alebo zaregistruj</p>
                <hr class="my-4">

                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Prihlásenie</a>
                    <a class="btn btn-primary btn-lg" href=" {{ route('register') }}" role="button">Registrácia</a>
                </p>
            </div>
        </div>

    @endif


    <div class="comment__items">
        <ul class="comment__list">


        </ul>
    </div>


</section>
