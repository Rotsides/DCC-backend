{{-- Here is the where the /blog/create is --}}

@extends ('layouts.app')

@section('content')
    <div class="width-100 m-auto text-center">
        <div class="py-15 ">
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
                class="bg-dark d-block border-b-2 w-100 h-20 text-xl text-light"
                style="padding-top: 10px; padding-bottom: 10px; padding-left:10px;">


            <div class="container" style="padding: 4px"></div>
            <input type="text" name="type" placeholder="Type..."
                class="bg-dark d-block border-b-2 w-100 h-20 text-xl text-light"
                style="padding-top: 10px; padding-bottom: 10px; padding-left:10px;">
            <div class="container" style="padding: 4px"></div>
            <textarea name="content" placeholder="Content..." class="py-20 bg-dark d-block border-b-2 w-100 h-60 text-xl text-light"
                style="padding-top: 20px; padding-left:10px;"></textarea>

            <div class="container"
                style="padding-top:20px; padding-right:10px; padding-bottom: 20px; margin-right: 0px;
              margin-left: 0px">
                <label style="width:150px; height:45px;   "
                    class=" d-flex justify-content-center alignt-items-center bg-light shadow-lg  text-uppercase border border-blue ">
                    <span class="m-auto fw-bold " style="cursor: pointer; ">Select a File</span>
                    <input type="file" name="image" style="display: none" class="hidden"></label>
            </div>

            <div class="container"><button type="submit" style="padding-top: 10px; margin-right:0; margin-left:0"
                    class="text-uppercase bg-primary bg-gradient fw-bold text-white text-lg px-3 py-3 rounded-5 border border-none m-auto">Submit
                    Post</button></div>
        </form>
    </div>
@endsection
