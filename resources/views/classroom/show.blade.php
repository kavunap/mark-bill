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
                            <span class="card-title">Classroom Details</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('archives.show',$classroom->archive_id) }}"> Back</a>
                        </div>
                        @if (Auth::user()->user_role=="admin" || Auth::user()->user_role=="super_admin")
                            <div class="float-left">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Reports
                                </a>
            
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('download',['id'=>$classroom->id, 'term'=>1]) }}" target="blank"><i class="fa fa-fw fa-eye"></i> Reports1</a>
                                    <a class="dropdown-item" href="{{ route('download',['id'=>$classroom->id, 'term'=>2]) }}" target="blank"><i class="fa fa-fw fa-eye"></i> Reports2</a>
                                    <a class="dropdown-item" href="{{ route('download',['id'=>$classroom->id, 'term'=>3]) }}" target="blank"><i class="fa fa-fw fa-eye"></i> Reports3</a>
                                </div>
                            </div>
                        @endif
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
                                    <a href="{{ route('archives.show',$classroom->archive->id) }}">
                                        <strong>Year:</strong>
                                        {{ $classroom->archive->year }}
                                    </a>
                                </div>
                                @if ($classroom->tutor)
                                    <div class="form-group">
                                        <a href="{{ route('users.show',$classroom->tutor->id) }}">
                                            <strong>Class Tutor:</strong>
                                            {{ $classroom->tutor->name }}
                                        </a>
                                    </div>
                                @endif
                                
                            </div>
                            @if (Auth::user()->user_role=="admin" || Auth::user()->user_role=="super_admin")
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
                                            @include('student.form')

                                            <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                                            {{-- <input type="submit"> --}}
                                            <div class="box-footer mt20">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-sm-8">
                                {{-- @foreach ($students as $student )
                                    <div class="form-group">
                                        
                                        <a href="{{ route('students.show',$student->id) }}"><strong>{{ $student->name }}</strong></a> 
                                        <strong>ID:</strong> {{ $student->st_code }}
                                    </div>
                                @endforeach --}}
                                @include('student.list')
                            </div>
                            <div class="col-sm-4">
                                {{-- <h3><strong>{{ $courses->count() }}</strong> Courses</h3>
                                @foreach ($courses as $course )
                                    <div class="form-group">
                                        <a href="{{ route('courses.show',$course->id) }}"><strong>{{ $course->title }}</strong></a> 
                                        <strong>Max:</strong> {{ $course->max }} 
                                        <form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                        </form>
                                    </div>
                                @endforeach --}}
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                    
                                                <span id="card_title">
                                                    {{ $courses->count() }} {{Str::plural('Course', $courses->count())}}
                                                </span>
                                            </div>
                                        </div>
                    
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead class="thead">
                                                        <tr>
                                                            <th>No</th>
                                                            
                                                            <th>Title</th>
                                                            <th>Max</th>
                    
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($courses as $course)
                                                            <tr>
                                                                <td>{{ ++$i }}</td>
                                                                
                                                                <td>{{ $course->title }}</td>
                                                                <td>{{ $course->max }}</td>
                    
                                                                <td>
                                                                    
                                                                    @if(Auth::user()->user_role!="teacher")
                                                                    <form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                                                                        
                                                                        <a class="btn btn-sm btn-success" href="{{ route('courses.edit',$course->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                                    </form>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    {!! $courses->links() !!}
                                </div>
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
