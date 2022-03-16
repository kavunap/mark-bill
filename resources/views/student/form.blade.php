<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $student->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('parent_phone') }}
            {{ Form::text('parent_phone', $student->parent_phone, ['class' => 'form-control' . ($errors->has('parent_phone') ? ' is-invalid' : ''), 'placeholder' => 'Parent Phone']) }}
            {!! $errors->first('parent_phone', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('st_code') }}
            {{ Form::text('st_code', $student->st_code, ['class' => 'form-control' . ($errors->has('st_code') ? ' is-invalid' : ''), 'placeholder' => 'St Code']) }}
            {!! $errors->first('st_code', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('classroom_id') }}
            {{ Form::text('classroom_id', $student->classroom_id, ['class' => 'form-control' . ($errors->has('classroom_id') ? ' is-invalid' : ''), 'placeholder' => 'Classroom Id']) }}
            {!! $errors->first('classroom_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>