@extends('layout.master')
@section('content')
    <div class="tile-wrapper">
        @foreach ($posts as $item)
            @foreach ($item->getMedia('thumbnail') as $image)
                <article class="tile">
                    <div>
                        <a href="/{{ $item->slug }}" class="tile__img-wrapper"> <img src="{{ asset($image->getUrl()) }}"
                                alt="" class="tile__figure">
                        </a>
                        <h2 class="tile__title"><a href="{{ $item->slug }}"> {{ $item->title }}</a></h2>
                    </div>
                </article>
            @endforeach
        @endforeach
    </div>




@endsection
