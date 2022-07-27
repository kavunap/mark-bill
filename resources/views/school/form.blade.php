
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
            {{ Form::label('email') }}
            {{ Form::email('email', $school->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::number('phone', $school->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone number']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('school leader full names') }}
            {{ Form::text('director', $school->director, ['class' => 'form-control' . ($errors->has('director') ? ' is-invalid' : ''), 'placeholder' => 'School head master full names']) }}
            {!! $errors->first('director', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('stamp') }}
            {{ Form::file('stamp', $school->stamp, ['class' => 'form-control' . ($errors->has('stamp') ? ' is-invalid' : ''), 'placeholder' => 'stamp']) }}
            {!! $errors->first('stamp', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        <div class="form-group">
            <label class="form-label" for="default-06">Stamp</label>
            <div class="form-control-wrap">
                <div class="custom-file">
                    <input type="file" multiple class="custom-file-input" id="image" name="stamp" accept="image/*" value="{{$school->stamp}}">

                    <label class="custom-file-label" for="customFile">Choose file</label>
                    @if ($errors->has('stamp'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('stamp') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <img id="preview-image-before-upload" @if($school->stamp) src="{{ asset('stamps/' . $school->stamp) }}" @else src="{{asset('assets/img/preview.png')}}" @endif
                alt="preview image" style="max-height: 250px;">
        </div>
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
