<div class="home_picture">
    <div class="container_fluid">
        <div class="background_text">
            <p class="text-center"> Start learning <span class="number">{{\App\Models\Course::all()->count()}}</span> courses for <strong>Free</strong></p>
            <p class="text-center">More than <span>{{ \App\Models\User::all()->count() }}</span> users have enrolled in <span>{{ \App\Models\Course::all()->count() }}</span> courses in <span>{{ \App\Models\Track::all()->count() }}</span> different Tracks</p>
            <div class="actions">
				<a class="btn btn-primary" href="/register">Start Learning</a>
				<a class="btn" href="/mycourses">My Courses</a>
			</div>
        </div>

    </div>
</div>

