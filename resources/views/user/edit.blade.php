@extends('layouts.app')

@section('template_title')
    Update User
@endsection

@section('content')
<div class="row">
    <div class="col-md-3"></div>

    <div class="col-md-6">

    
        <section class="content container-fluid">
            <div class="">
                <div class="col-md-12">

                    @includeif('partials.errors')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Update User</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf

                                @include('user.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-3"></div>
</div>
<script type="text/javascript">
      
    $(document).ready(function (e) {
     
       
       $('#profile').change(function(){
                
        let reader = new FileReader();
     
        reader.onload = (e) => { 
    
          $('#preview-image-before-upload2').attr('src', e.target.result); 
        }
     
        reader.readAsDataURL(this.files[0]); 
       
       });
       
    });
     
</script>
@endsection
