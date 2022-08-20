<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Classroom;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

/**
 * Class ArchiveController
 * @package App\Http\Controllers
 */
class ArchiveController extends Controller
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
        $archives = Archive::paginate();

        return view('archive.index', compact('archives'))
            ->with('i', (request()->input('page', 1) - 1) * $archives->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $archive = new Archive();
        return view('archive.create', compact('archive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Archive::$rules);
        $ex_archive=Archive::where('school_id',Auth::user()->school->id)->where('year',$request->year)->first();
        if ($ex_archive == null) {
            $archive = Archive::create($request->all());

        return redirect()->route('schools.show',$archive->school->id)
            ->with('success', 'Archive created successfully.');
        }
        else{
            return redirect()->back()->withErrors("You have already created this academic year")->withInput();
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
        $archive = Archive::find($id);
        $classrooms=$archive->classrooms;
        $classroom= new Classroom();
        $archive_id=$archive->id;
        $teachers= User::all()->where('user_role',"teacher")->where('admin_id',Auth::user()->id)->pluck('name', 'id')->except(Auth::user()->id);


        return view('archive.show', compact('archive','classrooms','classroom','teachers','archive_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $archive = Archive::find($id);

        return view('archive.edit', compact('archive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Archive $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive $archive)
    {
        request()->validate(Archive::$rules);

        $archive->update($request->all());

        return redirect()->route('archives.index')
            ->with('success', 'Archive updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $archive = Archive::find($id)->delete();

        return redirect()->route('archives.index')
            ->with('success', 'Archive deleted successfully');
    }
}
