@extends('layouts.admin')
@section('content')
    <?php
    @include 'app/helpers.php';
    ?>
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">


        <h2>Комментарии</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Статья</th>
                    <th>Коммент</th>
                    <th>Дата добавления</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{_article($comment->article_id)->title}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>{!! $comment->created_at->format('d-m-Y H:i') !!}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </main>
@endsection
