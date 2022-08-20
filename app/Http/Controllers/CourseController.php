<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\User;
use Auth;

/**
 * Class CourseController
 * @package App\Http\Controllers
 */
class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('check_role')->except('index','show');
        // $this->middleware('subscribed')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_role=="admin" && Auth::user()->school!=null) {
            
            // $courses = Course::where('classroom_id',Auth::user()->school->archives->pluck('id')->classrooms->pluck('id'))->paginate();
            $courses = Auth::user()->school->archives->last()->classrooms->last()->courses()->paginate();
        }
        elseif(Auth::user()->user_role=="super_admin"){
            $courses = Course::paginate();
        } else {
            $courses = Course::where('user_id',Auth::user()->id)->paginate();
        }
        

        return view('course.index', compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * $courses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course();
        return view('course.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Course::$rules);
        $ex_course=Course::where('classroom_id',$request->classroom_id)->where('title',$request->title)->first();
        if ($ex_course == null) {
            $course = Course::create($request->all());

            return redirect()->route('classrooms.show',$course->classroom->id)
                ->with('success', 'Course created successfully.');
        }
        else{
            return redirect()->back()->withErrors("You have already created this course!! Please check in the list")->withInput();
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $test = new Test;
        $students = $course->classroom->students;

        return view('course.show', compact('course','students','test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers= User::all()->where('user_role','=',"teacher")->pluck('name', 'id')->except(Auth::user()->id);
        $course = Course::find($id);

        return view('course.edit', compact('course','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        request()->validate(Course::$rules);

        $input=$request->all();
        $input['classroom_id']=$course->classroom_id;
        if ($course->update($input)) {
            return redirect()->route('classrooms.show',$course->classroom_id)
                ->with('success', 'Course updated successfully');
        }
        else{
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $class_id= $course->classroom_id;
        $course->delete();

        return redirect()->route('classrooms.show',$class_id)
            ->with('success', 'Course deleted successfully');
    }
}
