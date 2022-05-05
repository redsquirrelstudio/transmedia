<?php

namespace App\Http\Controllers;

use App\Models\FeaturedProject;
use App\Models\Schedule;
use Illuminate\Contracts\View\View;
use App\Models\Course;
use App\Models\User;

class PageController extends Controller
{
    public function index(): View
    {
        return view('index', [
            'students' => User::whereHas('page.avatar_image')
                ->with(['page', 'page.course', 'page.avatar_image'])
                ->inRandomOrder()
                ->limit(16)
                ->get(),
            'projects' => FeaturedProject::inRandomOrder()
                ->with('user')
                ->limit(16)
                ->get()
        ]);
    }

    public function about(): View
    {
        return view('about');
    }

    public function schedule(): View
    {
        return view('schedule', ['schedule' => Schedule::orderBy('datetime', 'asc')->get(), 'students' => User::where('year', 3)->inRandomOrder()->whereHas('page.avatar_image')->get()]);
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function login(): View
    {
        return view('auth.login');
    }

    public function forgot(): View
    {
        return view('auth.forgot');
    }

    public function reset(string $token): View
    {
        return view('auth.reset', ['token' => $token]);
    }

    public function exhibition(): View
    {
        return view('exhibition');
    }

    public function students(): View
    {
        return view('students.index', ['students' => User::all()]);
    }

    public function student_course(string $course_slug): View
    {
        return view('students.index', ['students' => User::all()]);
    }

    public function year(int $year): View
    {
        $students = User::with('page')->where('year', $year)->get();
        return view('students.year', ['students' => $students, 'courses' => Course::all(), 'year' => $year]);
    }

    public function course(int $year, string $course_slug): View
    {
        $course = Course::where('slug', $course_slug)->first();
        $course_id = $course->id;
        $data = [];
        $students = User::with('page')->where('year', $year)->get();

        foreach ($students as $student) {
            if ($student->page->course_id === $course_id) {
                $data[] = $student;
            }
        }
        return view('students.course', ['courses' => Course::all(), 'year' => $year, 'course_slug' => $course_slug, 'students' => $data]);
    }
}
