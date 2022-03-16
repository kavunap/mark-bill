@extends('layouts.app')

@section('template_title')
    Mark
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Mark') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('marks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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
                                        
										<th>Marks</th>
										<th>Term</th>
										<th>Type</th>
										<th>Student Id</th>
										<th>Course Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($marks as $mark)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $mark->marks }}</td>
											<td>{{ $mark->term }}</td>
											<td>{{ $mark->type }}</td>
											<td>{{ $mark->student_id }}</td>
											<td>{{ $mark->course_id }}</td>

                                            <td>
                                                <form action="{{ route('marks.destroy',$mark->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('marks.show',$mark->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('marks.edit',$mark->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $marks->links() !!}
            </div>
        </div>
    </div>
@endsection
