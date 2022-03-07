@extends('layouts.app', ['title' => __('Video Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Preview Video')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Video Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('videos.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="row"> 

                        <div class="col-sm-4">
                            @if ($course->photo)
                            <img width="100px" src="/images/{{$course->photo->filename}}" class="card-img-top" alt="...">
                            @else
                                <img width="100px" src="/images/defoulte.jpg" class="card-img-top" alt="...">
                            @endif
                        </div>


                        <div class="col-sm">
                                
                            <div class="course-info">
                                <h2>{{$course->title}}</h2>
                                <p><strong>Track :  </strong> <a href="/admin/tracks/{{ $course->track->id}}">
                                    {{strtoupper($course->track->name)}}</a>
                                
                                </p>

                                    <span class="{{$course->status == 0 ? 'text-success' : 'text-danger'}}">{{$course->status == 0 ? 'FREE' : 'PAID' }}</span>
                            </div>    
                
                        </div>
                    </div>   
                        
                </div>


                <div class="table-responsive">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <h3 class="mb-0">{{ __('Course Management') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="/admin/courses/{{$course->id}}/videos/create" class="btn btn-sm btn-primary">{{ __('add video') }}</a>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="/admin/courses/{{$course->id}}/quizzes/create" class="btn btn-sm btn-primary">{{ __('add Quiz') }}</a>
                                </div>
                            </div>
                        </div>
                    <table class="table align-items-center table-flush">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="mb-0">{{ __('Video Management') }}</h3>
                                    </div>
                                </div>
                            </div>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Name') }}</th>
                                
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->videos as $video)
                                <tr>
                                    <td><a href="{{route('videos.show' , $video)}}" >{{\Str::limit($video->title , '50') }}</a></td>
                                    <td>{{ $video->created_at->diffForHumans() }}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                
                                                    <form action="{{ route('videos.destroy', $video) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item" href="{{ route('videos.edit', $video) }}">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                
                                                    
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <h3 class="mb-0">{{ __('Quizzes Management') }}</h3>
                                    </div>
                                </div>
                            </div>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Name') }}</th>
                                
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->Quizzes as $quiz)
                                <tr>
                                    <td><a href="{{route('quizzes.show' , $quiz)}}" >{{\Str::limit($quiz->name , '50') }}</a></td>
                                    <td>{{ $video->created_at->diffForHumans() }}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                
                                                    <form action="{{ route('quizzes.destroy', $quiz) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item" href="{{ route('quizzes.edit', $quiz) }}">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                
                                                    
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection