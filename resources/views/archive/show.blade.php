@extends('layouts.app')

@section('template_title')
    {{ $archive->name ?? 'Show Archive' }}
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
     @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Archive</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('schools.show',$archive->school_id) }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Year:</strong>
                            {{ $archive->year }}
                        </div>
                        <div class="form-group">
                            <strong>Academic Year:</strong>
                            {{ $archive->academic_year }}
                        </div>
                        <div class="form-group">
                            <strong>School:</strong>
                            {{ $archive->school->name }}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <h3>{{ $archive->classrooms->count() }} <strong>Classses</strong><br></h3> 
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
                    {{-- <input type="text" name="name" id="name" placeholder="Class Name" required> --}}
                    @include('classroom.form')

                    {{-- <input type="submit"> --}}
                </form>
            </div>
        </div>
    </section>
@endsection
