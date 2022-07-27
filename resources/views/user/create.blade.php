@extends('layouts.app')

@section('template_title')
    Create User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create User</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
