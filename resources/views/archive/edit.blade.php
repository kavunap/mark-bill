@extends('layouts.app')

@section('template_title')
    Update Archive
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Archive</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{route('schools.show',$archive->school->id)}}"> Back</a>
                        </div>
                    </div>
                    {{-- <a href="{{route('schools.show',$archive->school->id)}}" class="btn btn-info">Back</a> --}}
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('archives.update', $archive->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        {{ Form::label('year') }}
                                        {{ Form::number('year', $archive->year, ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
                                        {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('academic_year') }}
                                        {{ Form::text('academic_year', $archive->academic_year, ['class' => 'form-control' . ($errors->has('academic_year') ? ' is-invalid' : ''), 'placeholder' => 'Academic Year']) }}
                                        {!! $errors->first('academic_year', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    {{-- <div class="form-group">
                                        {{ Form::label('school_id') }}
                                        {{ Form::text('school_id', $archive->school_id, ['class' => 'form-control' . ($errors->has('school_id') ? ' is-invalid' : ''), 'placeholder' => 'School Id']) }}
                                        {!! $errors->first('school_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div> --}}
                                    <input type="hidden" name="school_id" value= {{$archive->school_id}}>
                            
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
