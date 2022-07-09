@extends('layouts.user_layout')


@section('content')

    @include('include.home_picture')
    @auth
        @include('include.mycourses')
    @endauth

    @include('include.track_famous_courses')
@endsection


