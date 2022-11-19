<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Test;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $student=Student::find($request->student_id);
        $recordings=Mark::where('student_id','=',$request->student_id)->where('test_id','=',$request->test_id)->count();
        if($request->marks > $test->max){
            return redirect()->back()->withErrors('Marks can not be greater than maximum');
        }
        elseif($recordings>=1){
            return redirect()->back()->withErrors('This student`s marks already recorded for this test');
        }
        else{
            // DB::beginTransaction();
                $mark = Mark::create($request->all());

                if($mark->test->term == 'Term 1'){
                    $student->total_term1+=$mark->marks;
                    $student->save();
                }
                elseif($mark->test->term == 'Term 2'){
                    $student->total_term2+=$mark->marks;
                    $student->save();
                }
                elseif($mark->test->term == 'Term 3'){
                    $student->total_term3+=$mark->marks;
                    $student->save();
                }

            return redirect()->back()->with('success', "Marks recorded successfully.");
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

    public function inline_update(Request $request){
        if ($request->ajax()) {
            // $student=Student::find($request->student_id);

            $mark= Mark::find($request->pk);
            $student=$mark->student;
            $previous_mark=$mark->marks;
            $mark->update([

                $request->name => $request->value

            ]);
            if($mark->test->term == 'Term 1'){
                $value=$student->total_term1-$previous_mark;
                $value+=$request->value;
                $student->total_term1=$value;
                $student->save();
            }
            // Mark::find($request->pk)

            //     ->update([

            //         $request->name => $request->value

            //     ]);

            return response()->json(['success' => true]);

        }
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
