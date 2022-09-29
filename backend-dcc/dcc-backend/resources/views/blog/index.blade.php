{{-- This is the /blog page --}}


@extends ('layouts.app')

@section('content')
    <div class="width-100 m-auto text-center">
        <div class="py-15 border-dark">
            <h1 class="text-lg">Blog Posts</h1>
        </div>
    </div>
    {{-- Here is where our message is displayed if the post is successful, deleted, edited or has errors after clicking submit --}}
    @if (session()->has('message'))
        <div class="container w-75 m-auto mt-10 pl2">
            <p class="w-20 mb-4 text-bg-light bg-info rounded-2 py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif


    {{-- Here we check if the user is logged in to show the create post button if not the button is hidden --}}


    @if (Auth::check())
        <div class="container pt-4 " style="height: 100px">
            <div class="row ">
                <div class="col d-flex  ">
                    <div class="m-auto">
                        <a href="/blog/create"
                            class="bg-primary bg-gradient text-uppercase  text-white text-sm fw-bold py-3 px-3 rounded-5 text-decoration-none ">Create
                            post</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Here we use for loop to generate posts --}}

    @foreach ($posts as $post)
        <div class="container h-auto" style="height: auto">
            <div class="row">

                <div class="col-6 gap-20 mx-auto border-dark">

                    {{-- is where the image is being generated --}}

                    <img src="{{ asset('images/' . $post->image_path) }}" alt="" width="100%">
                </div>
                <div class="col-6 mx-auto border-dark">
                    <h2 class="text-dark fw-bold text-lg ">{{ $post->title }}</h2> {{-- Here is where the title is --}}
                    <span class="text-dark">Type: <span class="fw-bold text-dark  py-10"> {{ $post->type }}
                            {{-- Here is the type of the post sports, biography, news --}}
                        </span>
                        <br>

                        <span class="text-dark">By <span class="fw-bold text-dark fst-italic py-10">
                                {{ $post->user->name }}</span>, {{-- Here it finds the user_id and takes the name of the user to show him as the Author of the post. --}}
                            Created on {{ date('jS M Y', strtotime($post->updated_at)) }}</span>
                        <br><br>
                        <p class="text-lg text-dark-700 "> {{ $post->content }}</p>
                        <br><br>
                        <div
                            class="container justify-content-between align-items-center  m-auto d-flex text-center position-relative embed-responsive">
                            <a href="/blog/{{ $post->slug }}" {{-- Here is where the slug is created, i.g the title is I love PHP the slug will be i-love-php --}}
                                class="text-uppercase bg-primary bg-gradient fw-bold text-light text-lg px-3 py-2 rounded-4 text-decoration-none border border-light">
                                Keep
                                reading</a>


                            {{-- Here check if the user that created the post is the same as the logged in user. If yes give them access to edit and delete button, else hide --}}
                            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                                <span
                                    class="text-uppercase text-center1 fs-5 fw-light text-light text-sm-center px-4 py-2 rounded-4 text-decoration-none">
                                    <a href="/blog/{{ $post->slug }}/edit"
                                        class="text-dark italic  pb-1 border-b-2">Edit</a>
                                </span>
                                <span class=" m-auto">
                                    <form action="/blog/{{ $post->slug }}" method="POST">@csrf
                                        @method('delete')

                                        <button style="background: rgb(243, 56, 56)"
                                            class="text-uppercase fw-bold text-dark rounded-4 border border-none px-2 py-2"
                                            type="submit">Delete</button>
                                    </form>
                                </span>
                            @endif
                        </div>

                </div>


            </div>
        </div>
        <div class="container" style="padding-top: 40px"></div>
    @endforeach
@endsection
