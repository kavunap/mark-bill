<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('marks') }}
            {{ Form::number('marks', $mark->marks, ['class' => 'form-control' . ($errors->has('marks') ? ' is-invalid' : ''), 'placeholder' => 'Marks']) }}
            {!! $errors->first('marks', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{-- {{ Form::label('student_id') }} --}}
            {{ Form::hidden('student_id', $mark->student_id, ['class' => 'form-control' . ($errors->has('student_id') ? ' is-invalid' : ''), 'placeholder' => 'Student Id','id'=>'st']) }}
            {!! $errors->first('student_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{-- {{ Form::label('test_id') }} --}}
            {{ Form::hidden('test_id', $mark->test_id, ['class' => 'form-control' . ($errors->has('test_id') ? ' is-invalid' : ''), 'placeholder' => 'Test Id','id'=>'test']) }}
            {!! $errors->first('test_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>