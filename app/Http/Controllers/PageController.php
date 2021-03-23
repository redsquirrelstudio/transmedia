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

        foreach($students as $student){
            if ($student->page->course_id === $course_id){
                $data[] = $student;
            }
        }
        return view('students.course', ['courses' => Course::all(), 'year' => $year, 'course_slug' => $course_slug, 'students' => $data]);
    }

    public function my_page(): View
    {
        return view('my-page', ['user' => User::with(['page'])->find(auth()->id()),'courses' => Course::all()]);
    }

    public function store_my_page(Request $request): Response
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'course_id' => 'nullable|exists:course,id',
            'portfolio_url' => 'nullable|url',
        ]);

        $user = User::find($request->get('user_id'));
        $page = $user->page;
        $user->name = $request->get('name');
        $user->save();
        $page->course_id = $request->get('course_id');
        $page->tagline = $request->get('tagline');
        $page->bio = $request->get('bio');
        $page->portfolio_url = $request->get('portfolio_url');
        $page->avatar_url = $request->get('avatar');
        $page->banner_url = $request->get('hero');
        $page->save();

        return response([
            'success' => true,
            'message' => 'Page saved'
        ]);
    }
}
