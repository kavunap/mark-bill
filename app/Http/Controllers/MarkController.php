<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;

/**
 * Class MarkController
 * @package App\Http\Controllers
 */
class MarkController extends Controller
{
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
        return view('mark.create2', compact('mark'));
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
        $input = $request->all();
        // $input['student_id']= 
        $mark = Mark::create($request->all());

        // return redirect()->route('marks.index')
        //     ->with('success', 'Mark created successfully.');
        return redirect()->back()->with('success', 'Mark created successfully.');
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
