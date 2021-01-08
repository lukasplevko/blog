@extends('layouts.app')
@section('content')
    <article class="article container">
        @foreach ($post as $item)

            <header class="article__header">
                @foreach ($item->getMedia('thumbnail') as $image)
                    <img src="{{ $image->getUrl('thumbnail-wide') }}" alt="" class="article__img">
                @endforeach
            </header>

            <section class="article__text">
                <header class="article__text-heading">
                    <h1>
                        {{ $item->title }}
                    </h1>
                    <p>
                        {{ $item->perex }}
                    </p>

                </header>
                {!! $item->text !!}

                <div class="article__gallery">
                    @foreach ($item->getMedia('gallery') as $image)
                        <a href="{{ $image->getUrl() }}" data-lightbox="{{ $item->title }}"><img
                                src="{{ asset($image->getUrl()) }}" alt="{{ $item->title }}"
                                class="article__gallery-item"></a>
                    @endforeach

                </div>
            </section>
        @endforeach


    </article>
@endsection
