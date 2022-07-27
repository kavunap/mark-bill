<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Test;
use App\Models\Student;
use Illuminate\Http\Request;

/**
 * Class MarkController
 * @package App\Http\Controllers
 */
class MarkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // $this->middleware('check_role')->only('store');
        // $this->middleware('subscribed')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::paginate();

        return view('mark.index', compact('marks'))
            ->with('i', (request()->input('page', 1) - 1) * $marks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mark = new Mark();
        return view('mark.create', compact('mark'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mark::$rules);
        $test= Test::find($request->test_id);
        $student=Student::find($request->user_id);
        $recordings=Mark::where('student_id','=',$request->student_id)->where('test_id','=',$request->test_id)->count();
        if($request->marks > $test->max){
            return redirect()->back()->withErrors('Marks can not be greater than maximum');
        }
        elseif($recordings>=1){
            return redirect()->back()->withErrors('This student`s marks already recorded for this test');
        }
        else{
            $mark = Mark::create($request->all());
            return redirect()->back()->with('success', "Marks recorded successfully.{$recordings}");
        }
        

        // return redirect()->route('marks.index')
        //     ->with('success', 'Mark created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mark = Mark::find($id);

        return view('mark.show', compact('mark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mark = Mark::find($id);

        return view('mark.edit', compact('mark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mark $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $mark)
    {
        request()->validate(Mark::$rules);

        $mark->update($request->all());

        return redirect()->route('marks.index')
            ->with('success', 'Mark updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mark = Mark::find($id)->delete();

        return redirect()->route('marks.index')
            ->with('success', 'Mark deleted successfully');
    }
}
