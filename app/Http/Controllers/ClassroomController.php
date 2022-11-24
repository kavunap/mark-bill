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
        $this->middleware('check_role')->except('index','show','searchStudent');
        // $this->middleware('subscribed')->except('store');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_role=='admin' && Auth::user()->school !=null) {
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

        $ex_class=Classroom::where('archive_id',$request->archive_id)->where('name',$request->name)->first();
        if ($ex_class == null) {
            $classroom = Classroom::create($request->all());

            return redirect()->route('archives.show',$classroom->archive->id)
                ->with('success', 'Classroom created successfully.');
        }
        else{
            return redirect()->back()->withErrors("You have already created this class!! Please check in the list")->withInput();
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $classroom = Classroom::find($id);
        if(Auth::user()->user_role=='admin'){
            $courses = $classroom->courses()->paginate();
        }
        elseif(Auth::user()->user_role=='teacher'){
            $courses = $classroom->courses()->where('user_id',Auth::user()->id)->paginate();
        }
        else{
            $courses=Course::paginate();
        }
        
        // $students = $classroom->students;
        $new_student = new Student();
        if($request->has('name')){
    		// $students = Student::search($request->get('search'))->orderBy('name')->where('classroom_id',$classroom->id)->paginate();	
            $students = Student::where('name','LIKE',$request->name.'%')->orderBy('name')->where('classroom_id',$classroom->id)->paginate();
    	}else{
            $students = Student::orderBy('name')->where('classroom_id',$classroom->id)->paginate();
        }
        
        
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
        $archive=$classroom->archive;
        $teachers= User::all()->where('user_role',"teacher")->where('admin_id',Auth::user()->id)->pluck('name', 'id')->except(Auth::user()->id);
        return view('classroom.edit', compact('classroom','teachers','archive'));
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
        $classroom = Classroom::find($id);
        $classroom->delete();

        return redirect()->route('archives.show',$classroom->archive_id)
            ->with('success', 'Classroom deleted successfully');
    }

    public function genReport($id,$term){
        $classroom = Classroom::find($id);
        return view('classroom.report',compact('classroom'));
    }
      
    public function createPDF($id,$term) {
    $classroom = Classroom::find($id);
    $previous1 = 0;
    $rank1= 0;
    $previous2 = 0;
    $rank2= 0;
    $previous3 = 0;
    $rank3= 0;
    $previous_yr = 0;
    $rankyr= 0;
        foreach ($classroom->students->sortByDesc('total_term1') as $student) {
            
            if($student->total_term1  != $previous1){
                $rank1++;
            }
            if($student->total_term2  != $previous2){
                $rank2++;
            }
            if($student->total_term3  != $previous3){
                $rank3++;
            }
            
            $total_year=$student->total_term1+$student->total_term2+$student->total_term3;
            if($total_year  != $previous_yr){
                $rankyr++;
            }
            
            $student->rank_term1=$rank1;
            $student->rank_term2=$rank2;
            $student->rank_term3=$rank3;
            $student->rank_year=$rankyr;
            $student->save();
            $previous1 = $student->total_term1;
            $previous2 = $student->total_term2;
            $previous3 = $student->total_term3;
            $previous_yr = $total_year;
            
        }
    $school=$classroom->school;
        
    $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
    ->loadView('classroom.report',compact('classroom','school','term'))
    ->setPaper('a4', 'landscape');
    return $pdf->download("class$classroom->name.pdf");
    }

    public function autosearch(Request $request)

    {

        if ($request->ajax()) {

            $data = Classroom::where('name','LIKE',$request->name.'%')->get();

            $output = '';

            if (count($data)>0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row) {

                    $output .= '<li class="list-group-item">'.$row->name.'</li>';

                }

                $output .= '</ul>';

            }else {

                $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';

            }

            return $output;

        }

        return view('autosearch');  

    }


    public function searchStudent(Request $request){
        $classroom=Classroom::find($request->class_id);
        $students = Student::search($request->name)->where('classroom_id',$classroom->id)->paginate();
        // $students=$classroom->students()->searchable();
        // $students = Student::where('classroom_id',$classroom->id)->searchable();
        // return redirect()->back()->with($students);
        return view('student.index',compact('students','classroom'))->with('i', (request()->input('page', 1) - 1) * $students->perPage());
    }

}
