@extends('layouts.app')

@section('template_title')
    {{ $classroom->name ?? 'Show Classroom' }}
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Classroom</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('classrooms.index') }}"> Back</a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-4">
                                {{-- <h3><strong>{{ $classroom->students->count() }}</strong> Students</h3>
                                @foreach ($students as $student )
                                    <div class="form-group">
                                        
                                        <a href="{{ route('students.show',$student->id) }}"><strong>{{ $student->name }}</strong></a> 
                                        <strong>ID:</strong> {{ $student->st_code }}
                                    </div>
                                @endforeach --}}
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $classroom->name }}
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('schools.show',$classroom->school->id) }}">
                                        <strong>School:</strong>
                                        {{ $classroom->school->name }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <h3><strong>Add</strong> Course</h3>
                                <form method="POST" action="{{ route('courses.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">

                                    @include('course.form')
        
                                </form>
                            </div>
                            <div class="col-sm-4">
                                <h3>Add Student</h3>
                                    <form action="{{ route('students.store') }}" method="POST">
                                        @csrf
                                        {{-- <input type="text" name="name" id="name" placeholder="Student Name"><br>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span> <br>
                                        @endif
                                        <input type="text" name="parent_phone" id="phone" placeholder="Parent phone Number"><br>
                                        @if ($errors->has('parent_phone'))
                                            <span class="text-danger">{{ $errors->first('parent_phone') }}</span> <br>
                                        @endif
    
                                        <input type="text" name="st_code" id="code" placeholder="Student Reg Number"><br>
                                        @if ($errors->has('st_code'))
                                            <span class="text-danger">{{ $errors->first('st_code') }}</span> <br>
                                        @endif --}}
                                        @include('student.form')

                                        <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                                        {{-- <input type="submit"> --}}
                                    </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-sm-4">
                                <h3><strong>{{ $classroom->students->count() }}</strong> Students</h3>
                                @foreach ($students as $student )
                                    <div class="form-group">
                                        
                                        <a href="{{ route('students.show',$student->id) }}"><strong>{{ $student->name }}</strong></a> 
                                        <strong>ID:</strong> {{ $student->st_code }}
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-sm-4">
                                <h3><strong>{{ $classroom->courses->count() }}</strong> Courses</h3>
                                @foreach ($courses as $course )
                                    <div class="form-group">
                                        <a href="{{ route('courses.show',$course->id) }}"><strong>{{ $course->title }}</strong></a> 
                                        <strong>Credits:</strong> {{ $course->credits }}
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-sm-4">
                                
                            </div>
                            {{-- <div class="col-sm-3">
                                <h3>Add Student</h3>
                                    <form action="{{ route('students.store') }}" method="POST">
                                        @csrf
                                        <input type="text" name="name" id="name" placeholder="Student Name"><br>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span> <br>
                                        @endif
                                        <input type="text" name="parent_phone" id="phone" placeholder="Parent phone Number"><br>
                                        @if ($errors->has('parent_phone'))
                                            <span class="text-danger">{{ $errors->first('parent_phone') }}</span> <br>
                                        @endif
    
                                        <input type="text" name="st_code" id="code" placeholder="Student Reg Number"><br>
                                        @if ($errors->has('st_code'))
                                            <span class="text-danger">{{ $errors->first('st_code') }}</span> <br>
                                        @endif
    
                                        <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                                        <input type="submit">
                                    </form>
                            </div> --}}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
