@extends('layouts.app')

@section('template_title')
    {{ $school->name ?? 'Show School' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show School</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('schools.index') }}"> Back</a>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success" href="{{ route('classrooms.create') }}"> Add classroom</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $school->name }}
                                </div>
                                <div class="form-group">
                                    <strong>Location:</strong>
                                    {{ $school->location }}
                                </div>
                                <div class="form-group">
                                    <strong>Type:</strong>
                                    {{ $school->type }}
                                </div>
                                <div class="form-group">
                                    <strong>User:</strong>
                                    {{ $school->user->name }}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <h3>{{ $school->classrooms->count() }} <strong>Classses</strong><br></h3> 
                                @foreach ($classrooms as $class )
                                    <div class="form-group">
                                        
                                        <a href="{{ route('classrooms.show',$class->id) }}"><strong>{{ $class->name }}</strong></a> 
                                        <strong>Students:</strong> {{ $class->students->count() }}
                                        <strong>Courses:</strong>  {{ $class->courses->count() }}
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-sm-4">
                                <h3>Add Class</h3>
                                <form action="{{ route('classrooms.store') }}" method="POST">
                                    @csrf
                                    <input type="text" name="name" id="name" placeholder="Class Name" required>

                                    <input type="hidden" name="school_id" value="{{ $school->id }}">
                                    <input type="submit">
                                </form>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
