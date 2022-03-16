@extends('layouts.app')

@section('template_title')
    {{ $course->name ?? 'Show Course' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Course</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('courses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Title:</strong>
                                    {{ $course->title }}
                                </div>
                                <div class="form-group">
                                    <strong>Descriprion:</strong>
                                    {{ $course->descriprion }}
                                </div>
                                <div class="form-group">
                                    <strong>Credits:</strong>
                                    {{ $course->credits }}
                                </div>
                                <div class="form-group">
                                    <strong>Hours:</strong>
                                    {{ $course->hours }}
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('classrooms.show',$course->classroom->id) }}">
                                        <strong>Classroom:</strong>
                                        {{ $course->classroom->name }}
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <h3><strong>{{ $course->classroom->students->count() }}</strong> Students</h3>
                                @foreach ($course->classroom->students as $student )
                                    <div class="form-group">
                                        
                                        <a href="{{ route('students.show',$student->id) }}"><strong>{{ $student->name }}</strong></a> 
                                        <strong>ID:</strong> {{ $student->st_code }}
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
