<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use App\Models\Archive;
use Illuminate\Http\Request;
use Auth;


/**
 * Class StudentController
 * @package App\Http\Controllers
 */
class StudentController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth']);
        $this->middleware('check_role')->only('store','update','edit');
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
            $archive=Archive::where('school_id',Auth::user()->school->id)->latest('created_at')->first();
            $classrooms=Classroom::where('archive_id',$archive->id);
            // $students=Auth::user()->school->archives->last()->classrooms->last()->students()->paginate();
            $students=Student::query()->paginate();
            foreach ($classrooms as $classroom) {
                $student=Student::where('classroom_id',$classroom->id)->paginte();
                $students = $students->concat($student)->paginate();
            }
            // if ($students->count() != 0) {
            //     # code...
            // }
            // $students=$students->paginate();
        }
        elseif(Auth::user()->user_role=='super_admin'){
            $students = Student::paginate();
        }
        else{
            $students = Classroom::where('tutor_id',Auth::user()->id)->pluck('id')->students()->paginate();
        }

        return view('student.index', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * $students->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = new Student();
        return view('student.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Student::$rules);

        $student = Student::create($request->all());

        // return redirect()->route('classrooms.show',$student->classroom->id)
        //     ->with('success', 'Student created successfully.');

            return redirect()->back()->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new_student = Student::find($id);
        // $new_student = new Student();
        $classrooms=Classroom::all()->where('archive_id',$new_student->classroom->archive_id)->pluck('name', 'id');

        return view('student.edit', compact('new_student','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        request()->validate(Student::$rules);
        // $request->classroom_id=$student->classroom_id;
        $student->update($request->all());

        return redirect()->route('classrooms.show',$student->classroom_id)
            ->with('success', 'Student updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $student = Student::find($id)->delete();

        return redirect()->route('classrooms.show',$student->classroom_id)
            ->with('success', 'Student deleted successfully');
    }

    public function list(){
        $students=Student::paginate();
        return view('student.list2', compact('students'));
    }

    public function excel_list($classroom){
        return \Excel::download(new \App\Exports\StuddentsFromView($classroom), 'students.xlsx', 'Html');
    }
}
