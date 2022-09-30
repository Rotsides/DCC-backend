{{-- Here is the where the /blog/create is --}}

@extends ('layouts.app')

@section('content')
    <div class="w-100 m-auto text-center">
        <div class="py-3 ">
            <h1 class="text-lg">Create Posts</h1>
        </div>
    </div>
    @if ($errors->any())
        <div class="container w-75 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-25 mb-4 text-dark bg-primary rounded-3 pt-4"></li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-75 m-auto  ">
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Title..."
                class="bg-light d-block rounded-2 py-2 px-2 w-100 h-20 text-dark"
                >


            <div class="py-2 w-100"  ></div>
            <input type="text" name="type" placeholder="Type..."
                class="bg-light d-block rounded-2 py-2 px-2 w-100 h-20 text-dark"
                >
            <div class="py-2 w-100 "  ></div>
            <textarea name="content" placeholder="Content..." class="bg-light d-block rounded-2 py-2 px-2 w-100 h-20 text-dark"
               ></textarea>

            <div class="d-flex w-100 justify-content-between align-items-center">

                 <div class=" py-3 d-flex justify-content-between">
                    <label class=" py-2 px-3 bg-light shadow-lg text-uppercase border border-blue">
                        <span class="m-auto fw-bold " style="cursor: pointer; ">Select a File</span>
                        <input type="file" name="image" style="display: none" class="hidden"></label>
                </div>

            
                    <button type="submit" class="text-uppercase bg-primary bg-gradient fw-bold text-light text-lg px-3 py-2 rounded-4 text-decoration-none border border-light shadow-lg">Submit Post</button>
           
           
        </div>
    </form>
    </div>
@endsection
