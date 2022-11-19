@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>

    <script>$.fn.poshytip={defaults:null}</script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Teachers') }}
                            </span>

                             <div class="float-right">
                                <form method="GET" action="{{ route('users.teacher') }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{request('search')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
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
                                        
										<th>Name</th>
										<th>Email</th>
										<th>Status</th>
										<th>User Role</th>
										<th>Profile</th>
										<th>Signature</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											{{-- <td>{{ $user->name }}</td> --}}
                                            <td>

                                                <a href="" class="update" data-name="name" data-type="text" data-pk="{{ $user->id }}" data-title="Enter name">{{ $user->name }}</a>
                        
                                            </td>
											{{-- <td>{{ $user->email }}</td> --}}
                                            <td>

                                                <a href="" class="update" data-name="email" data-type="text" data-pk="{{ $user->id }}" data-title="Enter email">{{ $user->email }}</a>
                        
                                            </td>
											{{-- <td>{{ $user->status }}</td> --}}
                                            <td>

                                                <a href="" class="update" data-name="status" data-type="text" data-pk="{{ $user->id }}" data-title="Enter Status">{{ $user->status }}</a>
                        
                                            </td>
											<td>{{ $user->user_role }}</td>
                                            
											<td>{{ $user->profile }}</td>
											<td>{{ $user->signature }}</td>

                                            <td>
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> Change profile</a>
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
                {!! $users->links() !!}
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $.fn.editable.defaults.mode = 'inline';
    
      
    
        $.ajaxSetup({
    
            headers: {
    
                'X-CSRF-TOKEN': '{{csrf_token()}}'
    
            }
    
        }); 
    
      
    
        $('.update').editable({
    
               url: "{{ route('users.inline_update') }}",
    
               type: 'text',
    
               pk: 1,
    
               name: 'name',
    
               title: 'Enter name'
    
        });
    
    </script>
@endsection
