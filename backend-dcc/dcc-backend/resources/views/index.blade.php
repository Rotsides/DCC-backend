{{-- This is the Home page --}}




@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">


@section('content')
    <div class=" m-auto w-75 rounded-4 h-25 bg-dark">
     
        <div class="d-flex text-dark ">
            <div class=" m-auto py-5 text-center   ">
                <h1 class="text-uppercase fw-bold text-light ">Do you want to start blogging?
                </h1><br><a href="/blog"
                    class="text-center rounded-3 px-2 py-2  text-dark fw-bold text-uppercase text-decoration-none border border-blue bg-light p-1">
                    read more
                </a>
            </div>
        </div>
    </div>

    <div class="w-100 py-3">
        <div class="text-center mt-2 ">
            <span class="text-uppercase  fw-bold text-dark fs-4">Blog</span>
            <h2 class="text-lg fw-bold py-2">Recent Posts</h2>
            <p class="m-auto w-75 text-center p-1 text-dark"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam unde explicabo aut fugiat, non, numquam eius quod rem molestias aliquid illo odit expedita sequi officiis fugit. Sequi delectus ipsum fugiat. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo quaerat iure accusamus fugit ducimus qui harum facilis. Ducimus quo consequatur nemo rerum voluptatibus expedita nisi recusandae, ab, dolorem beatae iste!</p>
        </div>
    </div>

    <div class="w-100 py-3">
        <div class="m-auto row w-75 ">
          
            <div class="col-6  ">
                <img src="https://cdn.pixabay.com/photo/2016/11/14/05/21/children-1822688_960_720.jpg" width="100%"
                    alt="mappa">
            </div>
                <div class="col-6 bg-light border border-1 text-dark " id="bg-1">
                    <div class=" px-2 py-2 d-block text-center">
                        <span class="fs-4 fw-bold text-dark "> Football in Africa </span>
                         
                    
                        </span>
                        <p class="py-3 text-center d-block ">The West African Football Union, officially abbreviated as WAFU-UFOA and
                        WAFU, is an association of the football playing nations in West Africa. It was the brainchild of the
                        Senegal Football Federation who requested that the nations belonging to CAF's Zone A and B meet and
                        hold a regular competitive tournament. The West African Football Union, officially abbreviated as
                        WAFU-UFOA and WAFU, is an association of the football playing nations in West Africa. It was the
                        brainchild of the Senegal Football Federation who requested that the nations belonging to CAF's Zone
                        A and B meet and hold a regular competitive tournament.</p>
                    </div>
                </div>
              
            
          
        </div>
 
    </div>
    
@endsection
