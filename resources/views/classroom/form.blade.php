<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $classroom->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('class_teacher') }} <br>
            {{ Form::select('tutor_id', $teachers, $classroom->tutor_id, ['class' => '' . ($errors->has('tutor_id') ? ' is-invalid' : ''), 'placeholder' => 'Classroom tutor']) }}
            {!! $errors->first('tutor_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <input type="hidden" name="archive_id" value="{{ $archive->id }}">

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary" href="{{ route('archives.show',$archive->id) }}"> Cancel</a>
    </div>
</div>