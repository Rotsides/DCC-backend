@extends ('layouts.app')

@section('content')
    <div class="w-100 m-auto text-center">
        <div class="py-15 ">
            <h1 class="text-xl">{{ $post->title }}</h1>
        </div>
    </div>

    <div class="container w-100 pt-20">
        <span class="text-dark">By <span class="fw-bold fst-italic text-dark"> {{ $post->user->name }}</span>, Created on
            {{ date('jS M Y', strtotime($post->updated_at)) }}</span>
        <p class="text-dark text-xl-start pt-5 pb-5 leding-8 font-weight-light"> {{ $post->content }}</p>
    </div>
@endsection
