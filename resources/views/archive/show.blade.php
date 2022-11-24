@extends('layouts.app')

@section('template_title')
    {{ $archive->name ?? 'Show Archive' }}
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
     @endif
     @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Archive</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('schools.show',$archive->school_id) }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Year:</strong>
                            {{ $archive->year }}
                        </div>
                        <div class="form-group">
                            <strong>Academic Year:</strong>
                            {{ $archive->academic_year }}
                        </div>
                        <div class="form-group">
                            <strong>School:</strong>
                            {{ $archive->school->name }}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <h3>Add Class</h3>
                <form action="{{ route('classrooms.store') }}" method="POST">
                    @csrf
                    {{-- <input type="text" name="name" id="name" placeholder="Class Name" required> --}}
                    @include('classroom.form')

                    {{-- <input type="submit"> --}}
                </form>
            </div>
            <div class="col-sm-4">
                <h3>{{ $archive->classrooms->count() }} <strong>Classses</strong><br></h3> 

                {{-- <div class="form-group">

                    <label for="name">Search by name</label>

                    <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                    <button type="submit">Search</button>

                </div> --}}
                <form method="GET" action="{{ route('archives.show',$archive->id) }}">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Search">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

                <div id="product_list"></div>
                {{-- @foreach ($classrooms as $class )
                    <div class="form-group">
                        
                        <a href="{{ route('classrooms.show',$class->id) }}"><strong>{{ $class->name }}</strong></a> 
                        <strong>Students:</strong> {{ $class->students->count() }}
                        <strong>Courses:</strong>  {{ $class->courses->count() }}
                    </div>
                @endforeach --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    
                                    <th>Name</th>
                                    <th>School</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classrooms as $classroom)
                                    <tr>
                                        
                                        <td>{{ $classroom->name }}</td>
                                        <td>{{ $classroom->archive->school->name }}</td>

                                        <td>
                                            <form action="{{ route('classrooms.destroy',$classroom->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('classrooms.show',$classroom->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                @if (Auth::user()->user_role=="admin")
                                                    <a class="btn btn-sm btn-success" href="{{ route('classrooms.edit',$classroom->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                @endif
                                                
                                                @csrf
                                                @method('DELETE')
                                                @if (Auth::user()->user_role=="admin")
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                @endif
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
