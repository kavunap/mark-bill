<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\Archive;
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
        if (Auth::user()->user_role=="super_admin") {
            $schools = School::paginate();
        }
        else{
            $schools = School::where('user_id',Auth::user()->id)->paginate();
        }
        

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
        $school=Auth::user()->school;
        if ($school==null) {
            $school = School::create($data);

            return redirect()->route('schools.index')
                ->with('success', 'School created successfully.');
        }
        else{
            return redirect()->back()->withErrors("You are not allowed to create more than one schools")->withInput();
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
        $school = School::find($id);
        $archives = $school->archives;
        $new_archive = new Archive();
        $school_id=$school->id;
        
        return view('school.show', compact('school','archives','new_archive','school_id'));
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
