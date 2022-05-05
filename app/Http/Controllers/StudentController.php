<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentProject;
use App\Models\User;
use App\Services\StudentMediaService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = [];
        $courses = Course::with(['page', 'page.user'])->get();
        foreach ($courses as $course) {
            $category = [];
            foreach ($course->page()->inRandomOrder()->get() as $page) {
                $user = $page->user()->with(['page', 'page.avatar_image'])->first();
                if (isset($user['page']['avatar_image'])) {
                    $category[] = $page->user()->whereHas('page.avatar_image')->with(['page', 'page.avatar_image', 'page.course'])->first();
                }
            }
            $students = array_merge($students, [$course->slug => $category]);
        }
        return view('students.index', ['students' => $students]);
    }

    public function student(string $slug)
    {
        if (auth()->user() && $slug === auth()->user()->slug && \Options::get('student-login')) {
            return redirect('/my-page');
        } else {
            $student = User::where('slug', $slug)->first();
            if ($student) {
                if (\Options::get('count-views')) {
                    $page = $student->page;
                    $page->page_views++;
                    $page->save();
                }
                return view('students.student', ['student' => $student, 'courses' => Course::all(),
                    'students' => User::whereHas('page.avatar_image')
                    ->with(['page', 'page.course', 'page.avatar_image'])
                    ->inRandomOrder()
                    ->limit(16)
                    ->get(),]);
            } else {
                abort(404);
            }
        }
    }

    public function students_course(string $course_slug)
    {
        $course = Course::with('page', 'page.user', 'page.avatar_image', 'page.course')->where('slug', $course_slug)->first();
        if (!$course) {
            return redirect('/students');
        } else {
            return view('students.course',
                ['course' => $course]);
        }
    }

    public function students_year(string $course_slug, int $year)
    {
        $course = Course::with(['page', 'page.user', 'page.avatar_image', 'page.course'])->where('slug', $course_slug)->first();
        if (!$course) {
            return redirect('/students');
        } else {
            return view('students.course',
                ['course' => $course, 'year' => $year]);
        }
    }

    public function my_page(): View
    {
        return view('my-page', ['user' => auth()->user(), 'courses' => Course::all()]);
    }

    public function store_my_page(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'course_id' => 'nullable|exists:course,id',
            'portfolio_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'avatar' => 'nullable|image',
            'banner' => 'nullable|image'
        ]);

        $media = new StudentMediaService();

        $user = User::find($request->get('user_id'));
        $page = $user->page;
        $user->name = $this->checkValue($request->get('name'));
        $user->save();
        $page->course_id = $this->checkValue($request->get('course_id'));
        $page->tagline = $this->checkValue($request->get('tagline'));
        $page->bio = $this->checkValue($request->get('bio'));
        $page->portfolio_url = $this->checkValue($request->get('portfolio_url'));
        $page->instagram_url = $this->checkValue($request->get('instagram_url'));
        if ($request->file('avatar')) {
            $page->avatar = $media->save($request->file('avatar'), 'avatar');
        }
        if ($request->file('banner')) {
            $page->banner = $media->save($request->file('banner'), 'hero');
        }
        $page->save();

        return redirect('/my-page');
    }

    public function checkValue($value)
    {
        if ($value === 'null' || $value === null) {
            return null;
        } else {
            return $value;
        }
    }

    public function create_project(int $user_id): RedirectResponse
    {
        $user = User::find($user_id);
        if ($user->projects->count() < 3) {
            $new_project = new StudentProject([
                'user_id' => $user->id,
            ]);
            $new_project->save();
        }
        return redirect('/my-page');
    }

    public function save_project(Request $request, int $project_id): RedirectResponse
    {
        $request->validate([
            'image' => 'nullable|image',
        ]);

        $media = new StudentMediaService();

        $project = StudentProject::find($project_id);
        $project->title = $request->get('title');
        $project->description = $request->get('description');
        if ($request->file('image')) {
            $project->image = $media->save($request->file('image'), 'project-' . $project->id . '-image');
        }
        $project->save();
        return redirect('/my-page');
    }

    public function delete_project(int $project_id): RedirectResponse
    {
        $project = StudentProject::find($project_id);
        $media = new StudentMediaService();
        if ($project->image) {
            $media->delete($project->image);
        }
        $project->delete();
        return redirect('/my-page');
    }

    public function student_portfolio(int $student_id)
    {
        $student = User::find($student_id);
        if ($student) {
            if (\Options::get('count-views')) {
                $page = $student->page;
                $page->portfolio_views++;
                $page->save();
            }
            return redirect()->away($student->page->portfolio_url);
        } else {
            abort(404);
        }
    }

}
