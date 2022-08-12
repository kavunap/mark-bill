<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('dat_of_test') }}
            {{ Form::date('done_on', $test->done_on, ['class' => 'form-control' . ($errors->has('done_on') ? ' is-invalid' : ''), 'placeholder' => 'Done On','required']) }}
            {!! $errors->first('done_on', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('term') }}
            {{ Form::select('term', array('Term 1' => 'First Term', 'Term 2' => 'Second Term', 'Term 3' => 'Third Term'),['class'=>'form-control']) }}
            {!! $errors->first('term', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Test Type') }}
            {{ Form::select('type', array('Exam' => 'Exam', 'Quiz' => 'Quiz'),['class'=>'form-control']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Max marks') }}
            {{ Form::number('max', $test->max, ['class' => 'form-control' . ($errors->has('max') ? ' is-invalid' : ''), 'placeholder' => 'Maximum marks']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('course_id') }} --}}
            {{ Form::hidden('course_id', $test->course_id == "" ? $course->id : $test->course_id, ['class' => 'form-control' . ($errors->has('course_id') ? ' is-invalid' : ''), 'placeholder' => 'Course Id']) }}
            {{-- {!! $errors->first('course_id', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}

        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>