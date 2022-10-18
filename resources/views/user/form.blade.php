<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
            <div class="form-group">
                {{ Form::label('status') }}
                {{-- {{ Form::select('status', $user->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }} --}}
                {{Form::select('status', array('active' => 'Actve', 'disactive' => 'Disactive'), $user->status)}}
                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @if (Auth::user()->user_role=="super_admin")
            <div class="form-group">
                {{ Form::label('user_role') }} <br>
                {{ Form::select('user_role' , array('super_admin' => 'Super Admin', 'admin' => 'Admin','teacher' => 'Teacher'),$user->user_role, ['width'=>'100%','placeholder' => 'User Role','height'=>'100px']) }}
                {!! $errors->first('user_role', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif
        
        {{-- <div class="form-group">
            {{ Form::label('profile') }}
            {{ Form::file('profile', $user->profile, ['class' => 'form-control' . ($errors->has('profile') ? ' is-invalid' : ''), 'placeholder' => 'Profile','accept'=>"image/*"]) }}
            {!! $errors->first('profile', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('signature') }}
            {{ Form::file('signature', $user->signature, ['class' => 'form-control' . ($errors->has('signature') ? ' is-invalid' : ''), 'placeholder' => 'Signature','accept'=>"image/*"]) }}
            {!! $errors->first('signature', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

        <div class="form-group">
            <label class="form-label" for="default-06">Signature</label>
            <div class="form-control-wrap">
                <div class="custom-file">
                    <input type="file" multiple class="custom-file-input" id="image" name="signature" accept="image/*" value="{{$user->signature}}">

                    <label class="custom-file-label" for="customFile">Choose file</label>
                    @if ($errors->has('signature'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('signature') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <img id="preview-image-before-upload" @if($user->signature) src="{{ asset('signatures/' . $user->signature) }}" @else src="{{asset('assets/img/preview.png')}}" @endif
                alt="preview image" style="max-height: 250px;">
        </div>
        <br><br>

        <div class="form-group">
            <label class="form-label" for="default-06">Profile Picture</label>
            <div class="form-control-wrap">
                <div class="custom-file">
                    <input type="file" multiple class="custom-file-input" id="profile" name="profile" accept="image/*" value="{{$user->profile}}">

                    <label class="custom-file-label" for="customFile">Choose file</label>
                    @if ($errors->has('profile'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('profile') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <img id="preview-image-before-upload2" @if($user->profile) src="{{ asset('profiles/' . $user->profile) }}" @else src="{{asset('assets/img/preview.png')}}" @endif
                alt="preview image" style="max-height: 250px;">
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>