@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                @if(session()->has('error'))

                    <div class="row">
                        <div class="col-md-8">
                            <div class="alert alert-danger">
                                Failed to fetch statistics from the server.
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-end">
                        <a class="btn btn-outline-primary" href="{{ route('home') }}">گەڕانەوە</a>
                    </div>
                    @foreach($departments as $departmentName => $stages)
                        <div class="card mt-3">
                            <div class="card-header text-center"><h5>{{ $departmentName }}</h5></div>
                            <div class="card-body">
                                <div class="row d-flex flex-row-reverse">
                                    @foreach($stages as $stageName => $statuses)
                                        <div class="col-12 col-md-4 mt-3">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    @if($stageName == 'all')
                                                        {{ 'کۆی گشتی' }}
                                                    @else
                                                        {{ $stageName }}
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-sm table-hover">
                                                        <tbody>
                                                        @foreach($statuses as $statusName => $status)
                                                            <tr>
                                                                <td>{{ $status }}</td>
                                                                <td class="text-end">{{ $statusName }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif


            </div>
        </div>
    </div>
@endsection

