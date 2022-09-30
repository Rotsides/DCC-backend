@extends ('layouts.app')

@section('content')
    <div class="w-100 m-auto text-center">
        <div class="py-3 ">
            <h1 class="text-xl">{{ $post->title }}</h1>
        </div>
    </div>

    <div class=" w-75  m-auto text-center">
        <span class="text-dark">By <span class="fw-bold fst-italic " style="color: gray"> {{ $post->user->name }}</span>, Created on
            {{ date('jS M Y', strtotime($post->updated_at)) }}</span>
        <p class="text-dark px-2 py-2 fw-normal"> {{ $post->content }}</p>
    </div>
@endsection
