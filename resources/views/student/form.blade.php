<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::text('name', $student->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Student Full Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::text('parent_phone', $student->parent_phone, ['class' => 'form-control' . ($errors->has('parent_phone') ? ' is-invalid' : ''), 'placeholder' => 'Parent Phone number']) }}
            {!! $errors->first('parent_phone', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::text('st_code', $student->st_code, ['class' => 'form-control' . ($errors->has('st_code') ? ' is-invalid' : ''), 'placeholder' => 'Student Number']) }}
            {!! $errors->first('st_code', '<div class="invalid-feedback">:message</p>') !!}
        </div>
            {{ Form::hidden('classroom_id', $student->classroom_id, ['class' => 'form-control' . ($errors->has('classroom_id') ? ' is-invalid' : ''), 'placeholder' => 'Classroom Id']) }}

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>