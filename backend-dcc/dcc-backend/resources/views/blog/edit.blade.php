{{-- This is the edit view after clicking edit button to edit the post. --}}

@extends ('layouts.app')

@section('content')
    <div class="w-100 m-auto text-center">
        <div class="py-3">
            <h1 class="text-lg">Update Post</h1>
        </div>
    </div>
    {{-- Check if any errors occur show the error if not continue --}}
    @if ($errors->any())
        <div class="  ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-25 mb-4 text-dark bg-primary rounded-3 pt-4"></li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- we navigate to the specific post's url using slug  --}}
    <div class="w-75 m-auto  ">
        <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $post->title }}"
                class="bg-light d-block rounded-2 py-2 px-2 w-100 h-20 text-dark">
 <div class="w-100 py-2"></div>
            <input type="text" name="type" value="{{ $post->type }}"
                class="bg-light d-block rounded-2 py-2 px-2  w-100 h-20 text-dark">
                <div class="w-100 py-2"></div>
            <textarea name="content" placeholder="Content..." class="bg-light d-block rounded-2 py-2 px-2  w-100 h-20 text-dark"
                >{{ $post->content }}</textarea>


            {{-- Submit button to update the post --}}
            <div class="py-4 d-flex justify-content-end"><button type="submit"  
                    class="text-uppercase bg-primary bg-gradient fw-bold text-light text-lg px-3 py-2 rounded-4 text-decoration-none border border-light shadow-lg">Submit
                    Post</button></div>
        </form>
    </div>
@endsection
