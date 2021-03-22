<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Response;

class PageController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function register(): View
    {
        return view('register');
    }

    public function login(): View
    {
        return view('login');
    }

    public function exhibition(): View
    {
        return view('exhibition');
    }

    public function students(): View
    {
        return view('students.index');
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
        $students = User::with('page')->where('year', $year)->get()->toArray();
        $students = array_filter($students, function ($student) use ($course_id) {
            return $student['page']['course_id'] === $course_id;
        });
        return view('students.course', ['courses' => Course::all(), 'year' => $year, 'course_slug' => $course_slug, 'students' => $students]);
    }

    public function my_page(): View
    {
        return view('my-page', ['courses' => Course::all()]);
    }

    public function store_my_page(Request $request): Response
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'course_id' => 'required|exists:course,id',
            'portfolio_url' => 'required|url',
            'tagline' => 'required',
            'bio' => 'required',
        ]);

        $user = User::find($request->get('user_id'));
        $page = $user->page;
        $user->name = $request->get('name');
        $user->save();
        $page->course_id = $request->get('course_id');
        $page->tagline = $request->get('tagline');
        $page->bio = $request->get('bio');
        $page->portfolio_url = $request->get('portfolio_url');
        $page->save();

        return response([
            'success' => true,
            'message' => 'Page saved'
        ]);
    }
}
