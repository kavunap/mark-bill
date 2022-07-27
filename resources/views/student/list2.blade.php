@extends('user dashboard.dashboard')
@section('content')
<div class="nk-content-body">
    <div class="components-preview wide-md mx-auto">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">{{ $students->count() }} Students</h4>
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
                                <th class="nk-tb-col tb-col-mb"><span class="sub-text">Code</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Parent phone number</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Class</span></th>
                                <th class="nk-tb-col nk-tb-col-tools text-right">
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($students as $student)
                            <tr class="nk-tb-item">
                            <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="{{ $student->id }}">
                                    <label class="custom-control-label" for="{{ $student->id }}"></label>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                <div class="student-card">
                                    <div class="student-avatar bg-dim-primary d-none d-sm-flex">
                                        <span><img src="{{ asset('images/'.$student->avatar) }}" alt=""> </span>
                                    </div>
                                    <div class="student-info">
                                        <span class="tb-lead">{{ $student->name }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                        </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                <span class="tb-amount">{{ $student->st_code }} </span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $student->parent_phone }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                
                                <span>{{ $student->classroom->name }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{route('students.show', $student->id)}} "><em class="icon ni ni-eye"></em><span>Show</span></a></li>
                                                    <li><a href="{{ route('students.edit', $student->id)}}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                    <li><a href="{{route('students.destroy', $student->id)}} "><em class="icon ni ni-na"></em><span>Delete</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr><!-- .nk-tb-item  --> 
                            @empty
                            <td colspan="7" class="text-center my-4">No Students available <a href="{{ route('students.create') }}">Add student</a></td>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                {!! $students->links('vendor.pagination.bootstrap-4') !!}
            </div><!-- .card-preview -->
        </div> <!-- nk-block -->
    </div><!-- .components-preview -->
</div>
@endsection
                        