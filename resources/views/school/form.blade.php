<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $school->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('location') }}
            {{ Form::text('location', $school->location, ['class' => 'form-control' . ($errors->has('location') ? ' is-invalid' : ''), 'placeholder' => 'Location']) }}
            {!! $errors->first('location', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type') }}
            {{-- {{ Form::select('type', ['REB','WDA','TVET']) }} --}}
            {{Form::select('type', array('REB' => 'REB', 'WDA' => 'WDA'))}}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::hidden('user_id',$school->user_id  , ['value'=>auth()->user()->id,'class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}

            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        <input type="hidden" name="user_id" 
            @if(Request::is('schools/create'))
                value= "{{auth()->user()->id}}"
            @endif
            value ="{{ $school->user_id}}"
          >

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>