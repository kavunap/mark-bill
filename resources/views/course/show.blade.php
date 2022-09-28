@extends('layouts.app')

@section('template_title')
    {{ $course->name ?? 'Show Course' }}
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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Course</span>
                        </div>
                        @if (Auth::user()->user_role=='admin' || Auth::user()->user_role=='super_admin')
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('classrooms.show',$course->classroom->id) }}"> Back</a>
                            </div>
                        @else
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('courses.index') }}"> Back</a>
                            </div>
                        @endif
                        

                        
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-3">
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

                            <div class="col-sm-3">
                                <h3>Add test</h3>
                                <form method="POST" action="{{ route('tests.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    @include('test.form')
                                </form>
                                
                            </div>

                            <div class="col-sm-6">
                                {{-- <h3><strong>{{ $course->tests->count() }}</strong> Tests</h3>
                                @foreach ($course->tests as $test )
                                    <div class="form-group">
                                        
                                        <a href="{{ route('tests.show',$test->id) }}"><strong> {{ $test->done_on }}</strong></a> <br>
                                        <strong>Test Type:</strong> {{ $test->type }} <br>
                                        <strong>Test Term:</strong> {{ $test->term }} <br>
                                        <strong>Test Max marks:</strong> {{ $test->max }} <br>
                                    </div>
                                @endforeach --}}
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                    
                                                <span id="card_title">
                                                    {{ __('Test') }}
                                                </span>
                                            </div>
                                        </div>
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @endif
                    
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead class="thead">
                                                        <tr>
                                                            
                                                            <th>Done On</th>
                                                            <th>Term</th>
                                                            <th>Type</th>
                                                            <th>Course Id</th>
                    
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($tests as $test)
                                                            <tr>
                                                                
                                                                <td>{{ date('d-m-Y', strtotime($test->done_on)) }}</td>
                                                                <td>{{ $test->term }}</td>
                                                                <td>{{ $test->type }}</td>
                                                                <td>{{ $test->course_id }}</td>
                    
                                                                <td>
                                                                    <form action="{{ route('tests.destroy',$test->id) }}" method="POST">
                                                                        <a class="btn btn-sm btn-primary " href="{{ route('tests.show',$test->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                                        <a class="btn btn-sm btn-success" href="{{ route('tests.edit',$test->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {!! $tests->links() !!}
                                </div>
                            </div>

                        </div>
                        
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
