{{-- This is the Home page --}}




@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">


@section('content')
    <div class="container h-25 bg-dark  ">
        <div class=" responsive"></div>
        <div class="d-flex text-dark ">
            <div class=" m-auto pt-4 pb-16 text-sm-center  ">
                <h1 class="text-uppercase font-weight-bold text-light ">Do you want to start blogging?
                </h1><br><a href="/blog"
                    class="text-center rounded-3 px-2 py-2 bg-gray text-dark fw-bold text-uppercase text-decoration-none border border-blue bg-light p-1">
                    read more
                </a>
            </div>
        </div>
    </div>

    <div class="container h-25 pt-2">
        <div class="text-center mt-2 ">
            <span class="text-uppercase text-sm fw-bold text-black fs-4">Blog</span>
            <h2 class="text-lg fw-bold py-2">Recent Posts</h2>
            <p class="m-auto w-75 p-1 text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius
                dolore
                debitis
                maiores at delectus
                incidunt ex id
                cupiditate voluptatibus ad odio iusto voluptatum sint blanditiis, ut repellat non placeat magnam?</p>
        </div>
    </div>

    <div class="container">
        <div class="row ">

            <div class="col-6 bg-warning text-dark " id="bg-1">
                <div class="m-auto px-2 py-2 m-auto d-block text-center">
                    <span class="  fs-3 fw-bold text-dark ">Football in Africa</span>
                    <h5 class=" m-auto w-100 py-3 ">The West African Football Union, officially abbreviated as WAFU-UFOA and
                        WAFU, is an association of the football playing nations in West Africa. It was the brainchild of the
                        Senegal Football Federation who requested that the nations belonging to CAF's Zone A and B meet and
                        hold a regular competitive tournament. The West African Football Union, officially abbreviated as
                        WAFU-UFOA and WAFU, is an association of the football playing nations in West Africa. It was the
                        brainchild of the Senegal Football Federation who requested that the nations belonging to CAF's Zone
                        A and B meet and hold a regular competitive tournament.</h3>
                </div>
            </div>
            <div class="col-6  ">
                <img src="https://cdn.pixabay.com/photo/2016/11/14/05/21/children-1822688_960_720.jpg" width="100%"
                    alt="mappa">
            </div>
        </div>
    </div>
@endsection
