{{-- This is the /blog page --}}


@extends ('layouts.app')

@section('content')
    <div class="width-100 m-auto text-center">
        <div class="py-2  border-bottom ">
            <h1 class="text-lg">Blog Posts</h1>
        </div>
    </div>
    {{-- Here is where our message is displayed if the post is successful, deleted, edited or has errors after clicking submit --}}
    @if (session()->has('message'))
        <div class="container-xxl py-2 w-25 d-flex align-items-center justify-content-center " >
            <p class="d-flex bg-info bg-gradient fw-bold text-dark px-3 py-3  rounded-2">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif


    {{-- Here we check if the user is logged in to show the create post button if not the button is hidden --}}


    @if (Auth::check())
        <div class="container pt-4 " style="height: 100px">
            <div class="row ">
                <div class="col-xxl d-flex m-auto text-center justify-content-end align-items-center">
                    
                        <a href="/blog/create"
                            class="text-uppercase bg-primary bg-gradient fw-bold text-light px-3 py-2 rounded-4 text-decoration-none border border-white shadow-lg">Create
                            post</a>
                   
                </div>
            </div>
        </div>
    @endif

    {{-- Here we use for loop to generate posts --}}

    @foreach ($posts as $post)
        <div class="container h-auto" style="height: auto">
            <div class="row">

                <div class="col-6 mx-auto border-dark">

                    {{-- is where the image is being generated --}}

                    <img src="{{ asset('images/' . $post->image_path) }}" alt="" width="100%">
                </div>
                <div class="col-6 mx-auto border-dark d-block bg-light border">
                    <h2 class="text-dark fw-bold text-lg ">{{ $post->title }}</h2> {{-- Here is where the title is --}}
                    <span class="text-dark">Type: <span class="fw-bold text-dark  "> {{ $post->type }}
                            {{-- Here is the type of the post sports, biography, news --}}
                        </span>
                        <br>

                        <span class="text-dark">By <span class="fw-bold text-dark fst-italic  ">
                                {{ $post->user->name }}</span>, 
                                {{-- Here it finds the user_id and takes the name of the user to show him as the Author of the post. --}}
                            Created on {{ date('jS M Y', strtotime($post->updated_at)) }}</span>
                        <br><br>
                         
                            <p class="fs-5 "> {{ $post->content }}</p> 
                        
                
                        <div
                            class="justify-content-between align-items-center m-auto d-flex text-center  ">
                            <a href="/blog/{{ $post->slug }}" {{-- Here is where the slug is created, i.g the title is I love PHP the slug will be i-love-php --}}
                                class="text-uppercase bg-primary bg-gradient fw-bold text-light  px-3 py-2 rounded-4 text-decoration-none border border-light shadow-lg">
                                Keep
                                reading</a>


                        


                                {{-- Here check if the user that created the post is the same as the logged in user. If yes give them access to edit and delete button, else hide --}}
                                <span class=" d-flex align-items-center">
                                    @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                                     {{-- Edit button --}}
                                <span
                                    class="text-uppercase text-light px-2 ">
                                    <a href="/blog/{{ $post->slug }}/edit"
                                        class="text-light bg-dark fw-bold text-decoration-none rounded-4 shadow-sm px-3 py-2">Edit</a>
                                </span>

                                {{-- Delete button --}}

                                    <form action="/blog/{{ $post->slug }}" method="POST">@csrf
                                        @method('delete')

                                        <button style="background: rgb(243, 56, 56); "
                                            class="text-uppercase rounded-4  border border-none px-2 py-2 shadow-sm"  
                                            type="submit"><span class="fw-bold" >Delete</span></button>
                                    </form>
                                </span>
                            @endif
                        </div>

                </div>


            </div>
        </div>
        <div class="w-100 py-3"></div>
    @endforeach
@endsection
