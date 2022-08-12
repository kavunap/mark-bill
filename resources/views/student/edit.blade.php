@extends('layouts.app')

@section('template_title')
    Update Student
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-md-6">

                @includeif('partials.errors')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif  

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Student</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('classrooms.show',$new_student->classroom_id) }}"> Back</a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('students.update', $new_student->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('student.form')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Change classroom</label> <br>
                                    {{-- <select class="" name="classroom_id" id="classroom_id">
                                        <option value="">Select classroom</option>
                                        @foreach ($classrooms as $key => $value)
                                            <option value="{{$admin->id}}">{{$admin->name}}</option>
                                            <option value="">Sel</option>
                                            <option value="{{ $key }}">{{ $value}}</option>
                                        @endforeach
                                    </select> --}}
                                    {!! Form::select('classroom_id', $classrooms, $new_student->classroom->id, ['class' => '']) !!}
                                </div>
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            {{-- <input type="hidden" name="classroom_id" value="{{$new_student->classroom_id}}"> --}}
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </section>
@endsection
