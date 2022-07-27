@extends('user dashboard.dashboard')
@section('content')
<div class="nk-content-body">
    <div class="components-preview wide-md mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">{{ $users->count() }} Users</h4>
                </div>
            </div>
            <div class="card card-preview">
                <div class="card-inner">
                    <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </th>
                                <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">email</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Role</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">STATUS</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-right">
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($users as $user)
                            <tr class="nk-tb-item">
                            <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="{{ $user->id }}">
                                    <label class="custom-control-label" for="{{ $user->id }}"></label>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                        <span><img src="{{ asset('profiles/'.$user->profile) }}" alt=""> </span>
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">{{ $user->name }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                        </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                <span class="tb-amount">{{ $user->email }} </span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $user->user_role }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                @if ($user->status=="active")
                                <span class="tb-status text-success">Active</span>  
                                @else
                                <span class="tb-status text-danger">Disactive</span>  
                                @endif
                                
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{route('users.show', $user->id)}} "><em class="icon ni ni-eye"></em><span>Show</span></a></li>
                                                    <li><a href="{{ route('users.edit', $user->id)}}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                    <li><a href="{{route('users.destroy', $user->id)}} "><em class="icon ni ni-na"></em><span>Delete</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr><!-- .nk-tb-item  --> 
                            @empty
                            <td colspan="7" class="text-center my-4">No Users available <a href="{{ route('users.create') }}">Add User</a></td>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div><!-- .card-preview -->
        </div> <!-- nk-block -->
    </div><!-- .components-preview -->
</div>
@endsection
                        