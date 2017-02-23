@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->tags }}</h1>
            <p>{{ $post->content }}</p>

            <br><br><br>
            <a href="{{ route('post_edit', $post->id) }}">Editar</a>
        </div>
    </div>
</div>
@endsection
