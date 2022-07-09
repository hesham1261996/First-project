<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 mx-auto">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Footer Content</h5>
        <p>You can now learn free courses .</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="/mycourses">MY Courses</a>
          </li>
          <li>
            <a href="myprofile">My Profile</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="https://www.facebook.com/hesham7197" target="_blank"><i class="fab fa-facebook-f"></i>acebook</a>
          </li>
          <li>
            <a href="https://github.com/hesham1261996" target="_blank"><i class="fab fa-github"></i> github</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <hr>

  <!-- Call to action -->
  <ul class="list-unstyled list-inline text-center py-2">
    <li class="list-inline-item">
      @if (Auth::user() )
        <h5></h5>
      @else
        <h5 class="mb-1">Register for free</h5>
      @endif
    </li>
    <li class="list-inline-item">
      @if (Auth::user() )
      <a href="/register" class="btn btn-danger btn-rounded"> My Profile </a>
      @else
      <a href="/register" class="btn btn-danger btn-rounded">  SIGN UP!</a>OR
      <a href="/login" class="btn btn-danger btn-rounded">   Login </a> 

      @endif
    </li>
  </ul>
  <!-- Call to action -->
  

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2022 Copyright:
    <a href="/"> Learncode.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->