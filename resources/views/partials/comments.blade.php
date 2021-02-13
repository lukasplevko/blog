<section class="comment__boxes">
    @if (Auth::user())


        <div class="comment" id="comments-container">
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
</section>
