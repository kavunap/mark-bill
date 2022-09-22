@extends('layouts.app')

@section('template_title')
    School
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('School') }}
                            </span>
                            @if (Auth::user()->user_role=="admin" && Auth::user()->school==null)
                                <div class="float-right">
                                    <a href="{{ route('schools.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Create New') }}
                                    </a>
                                </div>
                            @endif
                             
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>
										<th>Location</th>
                                        <th>Email</th>
                                        <th>Phone number</th>
                                        <th>Head master</th>
										<th>Type</th>
										<th>User</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schools as $school)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $school->name }}</td>
											<td>{{ $school->location }}</td>
                                            <td>{{ $school->email }}</td>
                                            <td>{{ $school->phone }}</td>
                                            <td>{{ $school->director }}</td>
											<td>{{ $school->type }}</td>
											<td>{{ $school->user->name }}</td>

                                            <td>
                                                <form action="{{ route('schools.destroy',$school->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('schools.show',$school->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('schools.edit',$school->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $schools->links() !!}
            </div>
        </div>
    </div>
@endsection
