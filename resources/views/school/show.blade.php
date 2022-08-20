@extends('layouts.app')

@section('template_title')
    {{ $school->name ?? 'Show School' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show School</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('schools.index') }}"> Back</a>
                        </div>
                        {{-- <div class="float-right">
                            <a class="btn btn-success" href="{{ route('classrooms.create') }}"> Add classroom</a>
                        </div> --}}
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
                                <div class="form-group">
                                    <strong>Stamp:</strong>
                                    <img src="{{ asset('stamps/' . $school->stamp) }}" alt="stamp" height="50px"/>
                                    {{ $school->user->name }}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <h3>{{ $school->archives->count() }} <strong>Academic Year</strong><br></h3> 
                                @foreach ($archives as $archive )
                                    <div class="form-group">
                                        
                                        <a href="{{ route('archives.show',$archive->id) }}"><strong>{{ $archive->year }}</strong></a> 
                                        <strong>Classrooms:</strong> {{ $archive->classrooms->count() }}
                                        {{-- <strong>Courses:</strong>  {{ $class->courses->count() }} --}}
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-sm-4">
                                <h3>Add New Academic Year</h3>
                                <form action="{{ route('archives.store') }}" method="POST">
                                    @csrf
                                    {{-- <input type="text" name="name" id="name" placeholder="Class Name" required> --}}
                                    @include('archive.form')

                                    {{-- <input type="submit"> --}}
                                </form>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
