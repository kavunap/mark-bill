<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Course;
use Illuminate\Http\Request;

/**
 * Class TestController
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // $this->middleware('subscribed')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::paginate();

        return view('test.index', compact('tests'))
            ->with('i', (request()->input('page', 1) - 1) * $tests->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test = new Test();
        return view('test.create', compact('test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Test::$rules);
        $course=Course::find($request->course_id);

        $test = Test::create($request->all());
        return redirect()->back()->with('success', 'Test created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id);
        $students = $test->course->classroom->students;

        foreach ($students as $student) {
            
        }
        return view('test.show', compact('test','students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::find($id);

        return view('test.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Test $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        request()->validate(Test::$rules);

        $test->update($request->all());

        return redirect()->route('tests.index')
            ->with('success', 'Test updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $test = Test::find($id)->delete();

        return redirect()->route('tests.index')
            ->with('success', 'Test deleted successfully');
    }
}
