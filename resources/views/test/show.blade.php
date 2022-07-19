@extends('layouts.app')

@section('template_title')
    {{ $test->name ?? 'Show Test' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Test</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tests.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Done On:</strong>
                            {{ $test->done_on }}
                        </div>
                        <div class="form-group">
                            <strong>Term:</strong>
                            {{ $test->term }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $test->type }}
                        </div>
                        <div class="form-group">
                            <strong>Course title:</strong>
                            {{ $test->course->title }}
                        </div>

                        <div class="form-group">
                            <strong>Max:</strong>
                            {{ $test->max }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>




    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 id="h1">List of students in {{ $test->course->classroom->name }} </h2>
            </div>
            <div class="pull-right pl-5">
                <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                    data-attr="{{ route('tests.edit',$test->id) }}" title="Edit test"> <i class="fas fa-edit"></i>
                </a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                    data-attr="{{ route('students.create') }}" title="Create a student"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    @if($errors)
        @foreach ($errors->all() as $message) 
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endforeach
    @endif
    
        
    

    <table class="table table-bordered table-responsive-lg table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col" >Number</th>
                <th scope="col" >Marks recorded</th>
                <th scope="col" >Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td scope="row">{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->st_code }}</td>
                    <td>{{ $student->marks->count() }}</td>
                    <td class="form-inline">
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">

                            

                            <a data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                data-attr="{{ route('students.show', $student->id) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>

                            <a class="text-secondary" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                data-attr="{{ route('students.edit', $student->id) }}">
                                <i class="fas fa-edit text-gray-300"></i>
                            </a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>
                            </button>
                        </form>

                        <a data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                            data-attr="{{ route('marks.create') }}" title="Record Marks" data-st-id="{{ $student->id }}" data-t-id="{{ $test->id }}">
                            <i class="fas fa-book text-success  fa-lg"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- small modal -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- medium modal -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            let st = $(this).attr('data-st-id');
            let t = $(this).attr('data-t-id');
            // $('#st').html('js id');
            // $('#c').html('js course');
            // $.ajax({
            // url: "?rr=profile",
            // }).success(function(response) {
            // $('#st').html('Your new content');
            // });

            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                    $('#st').val(st);
                    $('#test').val(t);
                },
                complete: function() {
                    $('#loader').hide();
                    // $('#st').val("");
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

    </script>
@endsection
