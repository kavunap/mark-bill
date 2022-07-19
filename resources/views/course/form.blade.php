<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::text('title', $course->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::text('description', $course->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::number('credits', $course->credits, ['class' => 'form-control' . ($errors->has('credits') ? ' is-invalid' : ''), 'placeholder' => 'Credits']) }}
            {!! $errors->first('credits', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::number('hours', $course->hours, ['class' => 'form-control' . ($errors->has('hours') ? ' is-invalid' : ''), 'placeholder' => 'Hours']) }}
            {!! $errors->first('hours', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::number('max', $course->max, ['class' => 'form-control' . ($errors->has('max') ? ' is-invalid' : ''), 'placeholder' => 'Maximum marks']) }}
            {!! $errors->first('max', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        {!! Form::select('user_id', $teachers, null, ['placeholder'=>'Select Teacher']) !!} <br>
        
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>