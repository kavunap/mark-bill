@extends('layouts.app')

@section('template_title')
    Update Behavior
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                {{-- @includeif('partials.errors') --}}
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
                        <span class="card-title">Update Behavior</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('behaviors.update', $behavior->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            {{-- @include('behavior.form') --}}
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        {{ Form::label('marks') }}
                                        {{ Form::text('marks', $behavior->marks, ['class' => 'form-control' . ($errors->has('marks') ? ' is-invalid' : ''), 'placeholder' => 'Marks']) }}
                                        {!! $errors->first('marks', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('term') }}
                                        {{ Form::select('term', array('Term1' => 'First term', 'Term2' => 'Second term', 'Term3'=>'Third term'), $behavior->term,['class'=>'form-control']) }}
                                        {!! $errors->first('term', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    {{-- <div class="form-group">
                                        {{ Form::label('student_id') }}
                                        {{ Form::text('student_id', $behavior->student_id, ['class' => 'form-control' . ($errors->has('student_id') ? ' is-invalid' : ''), 'placeholder' => 'Student Id']) }}
                                        {!! $errors->first('student_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div> --}}
                                    <input type="hidden" name="student_id" value="{{ $behavior->student_id}}">
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
