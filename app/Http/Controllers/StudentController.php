<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

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
        $students = Student::paginate();

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
