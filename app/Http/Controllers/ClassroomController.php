<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Student;
use PDF;
use Auth;

/**
 * Class ClassroomController
 * @package App\Http\Controllers
 */
class ClassroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $classrooms = Classroom::paginate();

        return view('classroom.index', compact('classrooms'))
            ->with('i', (request()->input('page', 1) - 1) * $classrooms->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classroom = new Classroom();
        return view('classroom.create', compact('classroom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Classroom::$rules);

        $classroom = Classroom::create($request->all());

        return redirect()->route('schools.show',$classroom->school->id)
            ->with('success', 'Classroom created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classroom = Classroom::find($id);
        if(Auth::user()->user_role=='admin'){
            $courses = $classroom->courses;
        }
        elseif(Auth::user()->user_role=='teacher'){
            $courses = $classroom->courses->where('user_id',Auth::user()->id);
        }
        else{
            $courses=Course::paginate();
        }
        
        // $students = $classroom->students;
        $new_student = new Student();
        $students = Student::where('classroom_id',$classroom->id)->paginate();
        $teachers= User::all()->where('user_role','=',"teacher")->pluck('name', 'id')->except(Auth::user()->id);
        $course = new Course();
        $student = new Student();

        return view('classroom.show', compact('classroom','students','courses','course','new_student','teachers'))
            ->with('i', (request()->input('page', 1) - 1) * $students->perPage());
        // return view('student.index', compact('students'))
        //     ->with('i', (request()->input('page', 1) - 1) * $students->perPage());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classroom = Classroom::find($id);

        return view('classroom.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Classroom $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        request()->validate(Classroom::$rules);

        $classroom->update($request->all());

        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $classroom = Classroom::find($id)->delete();

        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom deleted successfully');
    }

    public function genMission($id){
        $classroom = Classroom::find($id);
        return view('classroom.report',compact('classroom'));
      }
      
    public function createPDF($id) {
    $classroom = Classroom::find($id);

    $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'setIsRemoteEnabled'=>true])->loadView('classroom.report',compact('classroom'));   
    return $pdf->download('murunda.pdf');
    }
}
