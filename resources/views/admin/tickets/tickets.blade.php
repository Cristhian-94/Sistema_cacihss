@extends('layouts.plantillaadmin')

@section('content')

<!-- Contenido -->
<section class="container-fluid content">
        <!-- Categorías -->
        <div class="row justify-content-center">
            <div class="col-10 col-md-12">

                <nav class="text-center my-5">
                    <div class="btn-group">
                        <a href="#" class=" pb-3 link-category d-block d-inline btn btn-primary">Todas</a>
                        @foreach ($categories as $category)
                        <a href="{{ route('tickets.category',$category->name) }}" class=" pb-3 link-category d-block d-inline btn btn-primary  {{ (isset($categoryIdSelected) && $category->id==$categoryIdSelected)? 'selected-category':'' }} " >{{ $category ->name }}</a>
                        @endforeach
                    </div>

                </nav>
            </div>
        </div>

        <!-- Posts -->
        <div class="row justify-content-center border-radius ">
            <div class=" border-radius col-10">
                <div class="row">
                    <!-- Post 1 -->
                    @foreach ($tickets as $ticket)

                    <div class="col-md-4 col-12 justify-content-center mb-5">
                        <div class="card m-auto border-radius"  style="width: 18rem;">


                            <div class="card-body">
                                <br>
                                <small class="card-txt-category">Categoría: {{ $ticket->category->name }}</small>
                                <br>
                                <h5 class="card-title my-2">{{ $ticket->title }}</h5>
                                <br>
                                <hr>
                                <div class="d-card-text">
                                    {{ $ticket->content }}
                                </div>
                                <a href="#" class="post-link"><b>Leer más</b></a>
                                <hr>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <span class="card-txt-author">{{ $ticket->author }}</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        <span class="card-txt-date">{{ $ticket->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Post 2 -->

                    <!-- Post 3 -->

                </div>
            </div>

            <div class="col-12">
                <!-- Paginador -->


            </div>
        </div>
    </section>

    @endsection
