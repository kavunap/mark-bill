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
        if (Auth::user()->user_role=='admin') {
            $classrooms=Auth::user()->school->archives->sortByDesc('year')->first()->classrooms()->paginate();
        }
        elseif(Auth::user()->user_role=='super_admin'){
            $classrooms=Classroom::paginate();
        }
        else{
            $classrooms = Classroom::where('tutor_id',Auth::user()->id)->paginate();
        }
        

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

        return redirect()->route('archives.show',$classroom->archive->id)
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
            $courses = $classroom->courses()->paginate();
        }
        elseif(Auth::user()->user_role=='teacher'){
            $courses = $classroom->courses->where('user_id',Auth::user()->id)->paginate();
        }
        else{
            $courses=Course::paginate();
        }
        
        // $students = $classroom->students;
        $new_student = new Student();
        $students = Student::orderBy('name')->where('classroom_id',$classroom->id)->paginate();
        // $teachers= User::all()->where('user_role','=',"teacher")->pluck('name', 'id')->except(Auth::user()->id);
        $teachers= User::all()->where('user_role',"teacher")->where('admin_id',Auth::user()->id)->pluck('name', 'id')->except(Auth::user()->id);
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

    public function genReport($id,$term){
        $classroom = Classroom::find($id);
        return view('classroom.report',compact('classroom'));
      }
      
    public function createPDF($id,$term) {
    $classroom = Classroom::find($id);
    $school=$classroom->school;
        
    $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('classroom.report',compact('classroom','school','term'));   
    return $pdf->download("class$classroom->id.pdf");
    }

    
}
