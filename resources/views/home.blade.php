@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <main class="container">

                    <div class="d-flex align-items-center p-3 pb-2 my-3 text-white bg-white rounded shadow-sm">
                        <img class="me-3" src="{{ asset('img/epu-logo.png') }}" alt=""
                             style="width: 48px; height: auto;">
                        <div class="">
                            <h1 class="h6 mb-0 text-body lh-1">
                                Erbil Polytechnic University
                            </h1>
                            <p class="text-body mt-2">
                                Please choose a college / university to view the statistics.
                            </p>
                        </div>
                    </div>


                    <div class="row">
                        @foreach($colleges as $code => $college)
                            <div class="col-md-4 col-12 mb-2">
                                <div class="shadow-sm rounded p-3 bg-white">
                                    <a href="{{ route('statistics', $code) }}"
                                       style="text-decoration: none;">
                                        <div class="d-flex text-body-secondary ">
                                            <div class="me-2">
                                                <img src="{{ asset('img/graduate.png') }}" alt="EPU Logo"
                                                     style="width: 32px; height: auto;">
                                            </div>
                                            <div>
                                                <p class="mb-0 small lh-sm">
                                                    <strong class="d-block text-gray-dark">
                                                        {{ $college['english'] }}
                                                    </strong>
                                                    {{ $college['kurdish'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </main>
            </div>
        </div>
    </div>
@endsection
