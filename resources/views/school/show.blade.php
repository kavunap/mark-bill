@extends('layouts.app')

@section('template_title')
    {{ $school->name ?? 'Show School' }}
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show School</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('schools.index') }}"> Back</a>
                        </div>
                        {{-- <div class="float-right">
                            <a class="btn btn-success" href="{{ route('classrooms.create') }}"> Add classroom</a>
                        </div> --}}
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $school->name }}
                                </div>
                                <div class="form-group">
                                    <strong>Location:</strong>
                                    {{ $school->location }}
                                </div>
                                <div class="form-group">
                                    <strong>Type:</strong>
                                    {{ $school->type }}
                                </div>
                                <div class="form-group">
                                    <strong>User:</strong>
                                    {{ $school->user->name }}
                                </div>
                                <div class="form-group">
                                    <strong>Stamp:</strong>
                                    <img src="{{ asset('stamps/' . $school->stamp) }}" alt="stamp" height="50px"/>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <h3>Add New Academic Year</h3>
                                <form action="{{ route('archives.store') }}" method="POST">
                                    @csrf
                                    {{-- <input type="text" name="name" id="name" placeholder="Class Name" required> --}}
                                    @include('archive.form')

                                    {{-- <input type="submit"> --}}
                                </form>
                            </div>
                            <div class="col-sm-4">
                                <h3>{{ $school->archives->count() }} <strong>Academic Year</strong><br></h3> 
                                
                                <div class="form-group">

                                    <label for="name">Search by year</label>

                                    <input type="text" name="name" id="name" class="form-control" autocomplete="off">

                                </div>

                                <div id="product_list"></div>
                                {{-- @foreach ($archives as $archive )
                                    <div class="form-group">
                                        
                                        <a href="{{ route('archives.show',$archive->id) }}"><strong>{{ $archive->year }}</strong></a> 
                                        <strong>Classrooms:</strong> {{ $archive->classrooms->count() }}
                                    </div>
                                @endforeach --}}
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead class="thead">
                                                <tr>
                                                    
                                                    <th>Year</th>
                                                    <th>Academic Year</th>
            
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($archives as $archive)
                                                    <tr>
                                                        
                                                        <td>{{ $archive->year }}</td>
                                                        <td>{{ $archive->academic_year }}</td>
            
                                                        <td>
                                                            <form action="{{ route('archives.destroy',$archive->id) }}" method="POST">
                                                                <a class="btn btn-sm btn-primary " href="{{ route('archives.show',$archive->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                                <a class="btn btn-sm btn-success" href="{{ route('archives.edit',$archive->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button> --}}
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>

        
    </section>
    <script type="text/javascript">

        $(document).ready(function(){

            $('#name').on('keyup',function () {

                var query = $(this).val();

                $.ajax({

                    url:'{{ route('search') }}',

                    type:'GET',

                    data:{'name':query},

                    success:function (data) {

                        $('#product_list').html(data);

                    }

                })

            });

            $(document).on('click', 'li', function(){

                var value = $(this).text();

                $('#name').val(value);

                $('#product_list').html("");

            });

        });

    </script>   
@endsection
