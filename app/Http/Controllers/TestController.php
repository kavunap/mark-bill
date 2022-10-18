<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Auth;

/**
 * Class TestController
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // $this->middleware('subscribed')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::paginate();

        return view('test.index', compact('tests'))
            ->with('i', (request()->input('page', 1) - 1) * $tests->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test = new Test();
        return view('test.create', compact('test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Test::$rules);
        $course=Course::find($request->course_id);

        $ex_test=Test::where('course_id',$request->course_id)->where('type',$request->type)->where('term',$request->term)->first();
        
        if($course->user_id != Auth::user()->id && Auth::user()->user_role!="admin"){
            return redirect()->back()->withErrors("Oooops! You are not the one who will teach this course!!")->withInput();
        }
        elseif ($ex_test != null){

            return redirect()->back()->withErrors("Oooops! You have already created {$ex_test->type} for {$ex_test->term}!!")->withInput();
        }
        else{
            $test = Test::create($request->all());
            return redirect()->back()->with('success', 'Test created successfully.');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $test = Test::find($id);
        if($request->has('search')){
            $students = Student::search($request->get('search'))->where('classroom_id',$test->course->classroom_id)->paginate();
    		// $students = $test->course->classroom->students()->searchable();	
    	}else{
            $students = $test->course->classroom->students;
        }
        
        // foreach ($students as $student) {
            
        // }
        return view('test.show', compact('test','students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::find($id);

        return view('test.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Test $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        request()->validate(Test::$rules);

        $course=Course::find($request->course_id);

        $ex_test=Test::where('course_id',$request->course_id)->where('type',$request->type)->where('term',$request->term)->first();
        
        if($course->user_id != Auth::user()->id && Auth::user()->user_role!="admin"){
            return redirect()->back()->withErrors("Oooops! You are not the one who will teach this course!!")->withInput();
        }
        elseif ($ex_test != null){

            return redirect()->back()->withErrors("Oooops! You have already created {$ex_test->type} for {$ex_test->term}!!")->withInput();
        }
        else{
            $test->update($request->all());

            return redirect()->route('courses.show',$test->course_id)
                ->with('success', 'Test updated successfully');
        }

        
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $test = Test::find($id);
        $test->delete();
        return redirect()->route('courses.show',$test->course_id)
            ->with('success', 'Test deleted successfully');
    }
}
