@extends('layouts.app', ['title' => __('Track Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Track') }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    @include('include.error')
                    <form action="{{route('tracks.update' , $track)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-10 ml-2">
                                <div class="form-group">
                                    <input type="text" value="{{$track->name}}" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm">
                                <input class="btn btn-primary" type="submit" value="Edit tracks" name="addtrack" >
                            </div>


                        </div>
                    
                    
                    
                    </form>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection