@extends('layouts.app')

@section('template_title')
    Archive
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Archive') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('archives.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Year</th>
										<th>Academic Year</th>
										<th>School Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archives as $archive)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $archive->year }}</td>
											<td>{{ $archive->academic_year }}</td>
											<td>{{ $archive->school_id }}</td>

                                            <td>
                                                <form action="{{ route('archives.destroy',$archive->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('archives.show',$archive->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('archives.edit',$archive->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $archives->links() !!}
            </div>
        </div>
    </div>
@endsection
