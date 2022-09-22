<?php

namespace App\Http\Controllers;

use App\Models\Behavior;
use Illuminate\Http\Request;
use Auth;
use App\Models\Classroom;
use App\Models\Student;

/**
 * Class BehaviorController
 * @package App\Http\Controllers
 */
class BehaviorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $behaviors = Behavior::paginate();

        return view('behavior.index', compact('behaviors'))
            ->with('i', (request()->input('page', 1) - 1) * $behaviors->perPage());
    }

    public function add_behavior($student){
        $behavior = new Behavior();
        return view('behavior.create', compact('behavior','student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $behavior = new Behavior();
        return view('behavior.create', compact('behavior'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Behavior::$rules);
        $behaviors= Behavior::where('student_id',$request->student_id)->where('term',$request->term);
        
        if($behaviors->count() > 0 ){
            return redirect()->back()->withErrors("Behavior marks for this student already registered")->withInput();

        }
        elseif($request->marks > 40){
            return redirect()->back()->withErrors("Behavior marks should be below 40")->withInput();
        }
        else{
            
            $behavior = Behavior::create($request->all());

            return redirect()->route('beh.classList',$behavior->student->classroom->id)
                ->with('success', 'Behavior created successfully.');
        }
        
    }

    public function list(){
        $classrooms=Auth::user()->school->archives->sortByDesc('year')->first()->classrooms()->paginate();
        return view('classroom.list', compact('classrooms'))
            ->with('i', (request()->input('page', 1) - 1) * $classrooms->perPage());
    }

    public function classList($classroom_id){
        $classroom = Classroom::find($classroom_id);
        
        
        // $students = $classroom->students;
        $behaviors=Behavior::all();
        $students = Student::orderBy('name')->where('classroom_id',$classroom->id)->paginate();
        
        return view('classroom.student_list', compact('students','behaviors'))
            ->with('i', (request()->input('page', 1) - 1) * $students->perPage());
        // return view('student.index', compact('students'))
        //     ->with('i', (request()->input('page', 1) - 1) * $students->perPage());
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $behavior = Behavior::find($id);

        return view('behavior.show', compact('behavior'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=$id;
        $behavior = Behavior::find($id);

        return view('behavior.edit', compact('behavior','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Behavior $behavior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Behavior $behavior)
    {
        request()->validate(Behavior::$rules);

        // $behaviors= Behavior::where('student_id',$request->student_id)->where('term',$request->term);
        
        
        if($request->marks > 40){
            return redirect()->back()->withErrors("Behavior marks should be below 40")->withInput();
        }
        else{
            
            $behavior->update($request->all());

            return redirect()->route('beh.classList',$behavior->student->classroom_id)
                ->with('success', 'Behavior updated successfully');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $behavior = Behavior::find($id)->delete();

        return redirect()->route('behaviors.index')
            ->with('success', 'Behavior deleted successfully');
    }
}
