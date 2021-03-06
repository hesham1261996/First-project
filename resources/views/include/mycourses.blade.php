<!--Carousel Wrapper-->
<div id="carousel-with-lb" class="carousel slide carousel-multi-item" data-interval="5000" data-ride="carousel">

  <!--Controls-->
    <a class="btn-floating btn-primary left-arrow" href="#carousel-with-lb" data-slide="prev"><i
        class="fas fa-chevron-left"></i></a>
    <a class="btn-floating btn-primary right-arrow" href="#carousel-with-lb" data-slide="next"><i
        class="fas fa-chevron-right"></i></a>
  <!--/.Controls-->

  <!--Slides and lightbox-->

  <div class="carousel-inner mdb-lightbox" role="listbox">
    <div id="mdb-lightbox-ui"></div>
    <!--First slide-->

    <div id="courses-header">
        <h4>Resume Learning</h4>
        <a href="/mycourses">My courses</a>
        <div class="clearfix"></div>
      </div>

    @foreach($user_courses as $course)

    <div class="course carousel-item <?php if($loop->first) echo 'active'; ?>">
      <div class="row">
        <div class="col-sm-4 offset-sm-2">
          <figure class="col-md-4 d-md-inline-block">
            <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(2).jpg"
              data-size="1600x1067">
              @if($course->photo)
              <a href="/courses/{{$course->slug}}"><img src="/images/{{$course->photo->filename}}"></a>
              @else
              <a href="/courses/{{$course->slug}}"><img src="/images/defoulte.jpg"></a>
              @endif

            </a>
          </figure>
        </div>
        <div class="col-sm-4">
          
            <h3><a href="/courses/{{$course->slug}}">{{\Str::limit($course->title, 30)}}</a></h3>
            <h4>Track: <a href="">{{$course->track->name}}</a></h4><br>
            <h5><a href="">{{count($course->users)}} users are learning this course.</a></h5>
        </div>
      </div>
      

    </div>
    <!--/.First slide-->
      @endforeach
    </div>
  </div>

</div>
<!--/.Carousel Wrapper-->