@extends('layouts.app')

@section('template_title')
    Update School
@endsection

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update School</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('schools.update', $school->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('school.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
