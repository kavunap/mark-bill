@extends('layouts.app')

@section('template_title')
    Classroom
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Classroom') }}
                            </span>
                            {{-- @if (Auth::user()->user_role=="admin")
                            <div class="float-right">
                                <a href="{{ route('classrooms.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                            @endif --}}
                             
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
										<th>School</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classrooms as $classroom)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
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
                {!! $classrooms->links() !!}
            </div>
        </div>
    </div>
@endsection
