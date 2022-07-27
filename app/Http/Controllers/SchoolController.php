<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\User;
use Auth;

/**
 * Class SchoolController
 * @package App\Http\Controllers
 */
class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
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
        $schools = School::paginate();

        return view('school.index', compact('schools'))
            ->with('i', (request()->input('page', 1) - 1) * $schools->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = new School();
        return view('school.create', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(School::$rules);

        $data=$request->all();
        if($request->file('stamp')){
            $file= $request->file('stamp');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/stamps'), $filename);
            $data['stamp']= $filename;
        }

        $school = School::create($data);

        return redirect()->route('schools.index')
            ->with('success', 'School created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::find($id);
        $classrooms = $school->classrooms;
        $classroom= new Classroom();
        $school_id=$school->id;
        $teachers= User::all()->where('user_role','=',"teacher")->pluck('name', 'id')->except(Auth::user()->id);

        return view('school.show', compact('school','classrooms','classroom','school_id','teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::find($id);

        return view('school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  School $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        request()->validate(School::$rules);
        $data=$request->all();
        if($request->file('stamp')){
            $file= $request->file('stamp');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/stamps'), $filename);
            $data['stamp']= $filename;
        }
        $school->update($data);

        return redirect()->route('schools.index')
            ->with('success', 'School updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $school = School::find($id)->delete();

        return redirect()->route('schools.index')
            ->with('success', 'School deleted successfully');
    }

    
}
