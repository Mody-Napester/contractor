@extends('_layouts.dashboard')

@section('title') Users @endsection

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <h4 class="page-title">Users</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>

        </div>
    </div>

    @if(\App\User::hasAuthority('create.users'))
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <!-- Create new -->
                    <h4 class="m-t-0 header-title">Create new users</h4>
                    <p class="text-muted font-14 m-b-30">
                        Create new resource from here.
                    </p>

                    @include('users.create')
                </div>
            </div>
            <!-- end card-box -->
        </div>
        <!-- end row -->
    @endif

    @if(\App\User::hasAuthority('list.users'))
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">All Users</h4>
                <p class="text-muted font-14 m-b-30">
                    Here you will find all the resources to make actions on them.
                </p>

                <table data-page-length='50' id="datatable-users-buttons" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Roles</th>
                            <th>Created by</th>
                            <th>Updated by</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Control</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($resources as $resource)
                            <tr>
                                <td>{{ $resource->id }}</td>
                                <td>{{ $resource->name }}</td>
                                <td>{{ $resource->email }}</td>
                                <td>
                                    @foreach($resource->roles as $role)
                                        <span class="label {{ $role->class }}">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ ($resource->createdBy)? $resource->createdBy->name : '-'}}</td>
                                <td>{{ ($resource->updatedBy)? $resource->updatedBy->name : '-' }}</td>
                                <td>{{ $resource->created_at }}</td>
                                <td>{{ $resource->updated_at }}</td>
                                <td>
                                    @if(\App\User::hasAuthority('edit.users'))
                                    <a href="{{ route('users.edit', [$resource->uuid]) }}" class="update-modal btn btn-sm btn-success" title="Update user">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(\App\User::hasAuthority('delete.users'))
                                    <a href="{{ route('users.destroy', [$resource->uuid]) }}" class="confirm-delete btn btn-sm btn-danger" title="Delete user">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end row -->
    @endif

@endsection

@section('scripts')
    <script>
        @if(\App\User::hasAuthority('list.users'))
        var tableDTUsers = $('#datatable-users-buttons').DataTable({
                lengthChange: false,
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    }
                ],
            });
        tableDTUsers.buttons().container().appendTo('#datatable-users-buttons_wrapper .col-md-6:eq(0)');
        @endif
    </script>
@endsection
