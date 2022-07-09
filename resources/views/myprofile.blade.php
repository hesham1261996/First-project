@extends('layouts.user_layout')

@section('content')

    <div class="container">
        <div class="user-profile">
            <h3>Profile: {{$user->name}}</h3>
            <div class="row">
                <div class="col-sm-4">
                    <div class="user-info">
                        <div class="user-image">
                            <p id="message"></p>
                            <div id="uploaded_image">
                                @if ($user->photo)
                                <img class="img-fluid img-thumbnail" src="/images/{{$user->photo->filename}}" alt="">
                                @else
                                    <img class="img-fluid img-thumbnail" src="/images/defoulte.jpg" alt="">
                                @endif
                            </div>
                            <a id="upload_btn" class="btn btn-primary" href=""><i class="fas fa-cloud-upload-alt" ></i> Upload</a>
                            <form id="form" action="/myprofile" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <input id="image_file" type="file" name="image">
                            </form>
                        </div>
                        <div class="user-data">
                            <ul class="list-unstyled">
                                <li>{{$user->email}}</li>
                                <li>{{$user->score}} points</li>
                                <li style="color:#1c5996  "><i class="fas fa-user-shield"></i>{{$user->Admin == 1 ? ' Admin' : ' Users'}} </li>
                                <li style="font-weight: bold" class="{{$user->email_verified_at  ? 'text-success' : 'text-danger'}}">{{$user->email_verified_at  ? 'verified' : 'Unverified'}}</li>
                                <li>{{$user->created_at->diffForHumans()}}</li>

                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm">
                    
                    <p id="message"></p>
                    <form id="user_info_form" action="/myprofile" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Your name</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Your Password</label>
                            <input type="password" name="password" class="form-control" placeholder="your password">
                        </div>  
                        <div class="form-group">
                            <label for="email">Your confermation</label>
                            <input type="password" name="conferm password" class="form-control" placeholder="your password">
                        </div>
                        
                        <input type="submit" value="save" name="save" class="btn btn-primary">
                    </form>
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                </div>
            </div>

            <div class="user-tracks">
                <div class="heading">
                    <h4>You are Tracks</h4>
                    <div class="famous-tracks">
                        
                        <div class="tracks">
                            <ul class="list-unstyled">
                            @foreach($tracks as $track)
                                <li><a class="btn track-name" href="/tracks/{{$track->name}}">{{$track->name}}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                
            </div>
        </div>
    </div>
@endsection