@extends('layouts.app')
@section('content')

    <!-- Page Header -->
    <header class="masthead pt-10">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($articles as $article)
                    <div class="post-preview">
                        <a href="{!! route('article-page', [
                       'id'   => $article->id,
                    ]) !!}">
                            <h2 class="post-title">
                                {!! $article->title !!}
                            </h2>
                            <h3 class="post-subtitle">
                                {!! $article->short_text !!}
                            </h3>
                        </a>
                        <p class="post-meta">Опубликовал
                            <a href="#">{{$article->author}}</a>
                            в {!! $article->created_at->format('H:i - d/m/Y') !!}</p>
                    </div>
                @endforeach



                <hr>
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>

@endsection
