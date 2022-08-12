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
                            <a class="btn btn-primary" href="{{ route('classrooms.show',$course->classroom->id) }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>Title:</strong>
                                    {{ $course->title }}
                                </div>
                                <div class="form-group">
                                    <strong>Descriprion:</strong>
                                    {{ $course->description }}
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

                            <div class="col-sm-4">
                                <h3>Add test</h3>
                                <form method="POST" action="{{ route('tests.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    @include('test.form')
                                </form>
                                
                            </div>

                            <div class="col-sm-4">
                                <h3><strong>{{ $course->tests->count() }}</strong> Tests</h3>
                                @foreach ($course->tests as $test )
                                    <div class="form-group">
                                        
                                        <a href="{{ route('tests.show',$test->id) }}"><strong> {{ $test->done_on }}</strong></a> <br>
                                        <strong>Test Type:</strong> {{ $test->type }} <br>
                                        <strong>Test Term:</strong> {{ $test->term }} <br>
                                        <strong>Test Max marks:</strong> {{ $test->max }} <br>
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
