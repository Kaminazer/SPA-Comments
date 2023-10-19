@extends('layouts.spa')
@section('content')
    <section class="card-comments mb-5" data-aos="fade-up">
        <h2 class="section-title mb-4" >{{__("Comments")}}({{$comments->count()}})</h2>
        @foreach($comments as $comment)
            <div class="comment-text">
                <span class="">{{$comment->user_name}}</span>
                <span class="text-muted float-right">{{$comment->created_at->diffForHumans()}}</span>
                <div class="comment-text">
                    <p class="text-black-50">
                        {{$comment->text}}
                    </p>
                </div>
            </div>
        @endforeach
    </section>
@endsection
