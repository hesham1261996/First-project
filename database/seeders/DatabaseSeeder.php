<?php
namespace Database\Seeders;

use App\Models\Course;
use App\Models\Photo;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Track;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $users = User::factory(20)->create();

        $tracks =Track::factory(20)->create();

        foreach($users as $user ){  //seed to pivot table between users & tracks 
            $tracks_id = [] ;
            $tracks_id[] = Track::all()->random()->id ;
            $tracks_id[] = Track::all()->random()->id ;
            $user->tracks()->sync( $tracks_id ) ;
        }

        $courses = Course::factory(50)->create();

        foreach($users as $user ){  //seed to pivot table between users & courses 
            $Courses_id = [] ;
            $Courses_id[] = Course::all()->random()->id ;
            $Courses_id[] = Course::all()->random()->id ;
            $user->courses()->sync( $Courses_id ) ;
        }




        
        Photo::factory(50)->create();
        Video::factory(50)->create();


        $Quiz = Quiz::factory(50)->create();

        foreach($users as $user ){  //seed to pivot table between users & Quizzes 
            $Quizzes_id = [] ;
            $Quizzes_id[] = Course::all()->random()->id ;
            $Quizzes_id[] = Course::all()->random()->id ;
            $user->Quizzes()->sync( $Courses_id ) ;
        }

        Question::factory(50)->create();
    }
}
