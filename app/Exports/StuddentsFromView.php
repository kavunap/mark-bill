<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StuddentsFromView implements FromView
{
    public function __construct($classroom)
    {
        $this->classroom=$classroom;
    }
    public function view(): View

    {
        $classroom=Classroom::find($this->classroom);
        return view('student.excel', [

            'students' => $students = Student::orderBy('name')->where('classroom_id',$classroom->id)->paginate()

        ])->with('i', (request()->input('page', 1) - 1) * $students->perPage());

    }
}
