<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('year') }}
            {{ Form::number('year', $new_archive->year, ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
            {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('academic_year') }}
            {{ Form::text('academic_year', $new_archive->academic_year, ['class' => 'form-control' . ($errors->has('academic_year') ? ' is-invalid' : ''), 'placeholder' => 'Academic Year']) }}
            {!! $errors->first('academic_year', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('school_id') }}
            {{ Form::text('school_id', $archive->school_id, ['class' => 'form-control' . ($errors->has('school_id') ? ' is-invalid' : ''), 'placeholder' => 'School Id']) }}
            {!! $errors->first('school_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <input type="hidden" name="school_id" value= {{$school->id}}>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>