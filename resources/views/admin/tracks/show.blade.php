@extends('layouts.app', ['title' => __('Courses Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><b>Track :</b> {{ $track->name }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/admin/tracks/{{$track->id}}/courses/create" class="btn btn-sm btn-primary">{{ __('Add course') }}</a>
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

                    @if ($track->courses)
                        <div class="row">
                            
                            @foreach ($track->courses as $course)
                            <div class="col-sm-4">
                                
                                <div class="card" style="width: 18rem;">
                                    
                                    @if ($course->photo)
                                        <img width="100px" src="/images/{{$course->photo->filename}}" class="card-img-top" alt="...">
                                    @else
                                        <img width="100px" src="/images/defoulte.jpg" class="card-img-top" alt="...">
                                    @endif
                                    <div class="card-body">
                                    <h5 class="card-title">{{$course->title}}</h5>
                                    <form action="{{route('courses.destroy' , $course)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('courses.edit', $course)}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{route('courses.show' , $course)}}" class="btn btn-info btn-sm">Show</a>
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                    </form>
                                    
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        there are not found Courses
                    @endif

                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection