<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('marks') }}
            {{ Form::text('marks', $mark->marks, ['class' => 'form-control' . ($errors->has('marks') ? ' is-invalid' : ''), 'placeholder' => 'Number of Marks']) }}
            {!! $errors->first('marks', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{-- {{ Form::label('term') }}
            {{ Form::text('term', $mark->term, ['class' => 'form-control' . ($errors->has('term') ? ' is-invalid' : ''), 'placeholder' => 'Term']) }}
            {!! $errors->first('term', '<div class="invalid-feedback">:message</p>') !!} --}}
            <select name="term" id="term" class="form-group" required>
                <option value="Term 1">First term</option>
                <option value="Term 2">Second term</option>
                <option value="Term 3">Third term</option>
            </select>
        </div>
        <div class="form-group">
            {{-- {{ Form::label('type') }}
            {{ Form::text('type', $mark->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }} --}}
            <select name="type" id="type" class="form-group" required>
                <option value="">Select Type</option>
                <option value="Test">Test</option>
                <option value="Exam">Exam</option>

            </select>
            {!! $errors->first('type', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('student_id') }} --}}
            {{-- {{ Form::text('student_id', $mark->student_id, ['class' => 'form-control' . ($errors->has('student_id') ? ' is-invalid' : ''), 'placeholder' => 'Student Id','id'=>'st','value'=>1]) }} --}}
            <input type="hidden" name="student_id" class="form-control" value="{{ $mark->student_id }}" id="st">
            {{-- {!! $errors->first('student_id', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        {{-- <div class="form-group">
            {{ Form::label('course_id') }} --}}
            {{-- {{ Form::text('course_id', $mark->course_id, ['class' => 'form-control' . ($errors->has('course_id') ? ' is-invalid' : ''), 'placeholder' => 'Course Id','id'=>'c']) }} --}}
            <input type="hidden" name="course_id" class="form-control" value="{{ $mark->course_id }}" id="c">
            {{-- {!! $errors->first('course_id', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>