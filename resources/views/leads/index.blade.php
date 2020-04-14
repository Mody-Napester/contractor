@extends('_layouts.dashboard')

@section('title') Contacts @endsection

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            @if(\App\User::hasAuthority('search.leads'))
            <div class="btn-group pull-right m-t-15">
                <a class="btn btn-primary" href="#goToSearch">
                    Go To Filter <i class="fa fa-fw fa-arrow-down"></i>
                </a>
            </div>
            @endif

            <h4 class="page-title">Contacts</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">Contacts</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>
        </div>
    </div>

    @if(\App\User::hasAuthority('create.leads'))
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @if(\App\User::hasAuthority('create.leads'))
                <li class="nav-item active">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                       aria-selected="false">Create new Contact</a>
                </li>
                @endif
            </ul>
            <div class="tab-content" id="myTabContent">
                @if(\App\User::hasAuthority('create.leads'))
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @include('leads.create')
                </div>
                @endif
            </div>
        </div>
        <!-- end card-box -->
    </div>
    <!-- end row -->
    @endif

    @if(\App\User::hasAuthority('import.leads'))

    <div class="card-box">
        <h4 class="m-t-0 header-title">Import Contact</h4>
        <p class="text-muted font-14 m-b-30">Choose Excel File!. </p>

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('leads.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="selected_file" class="btn btn-secondary waves-effect waves-light" style="margin: 0">
                        <input type="file" name="selected_file" id="selected_file" style="display: none">
                        <i class="fa fa-fw fa-file"></i> Select File
                    </label>
                    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-fw fa-save"></i> Upload</button>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ url('assets/files/leads_example.xlsx') }}" class="btn btn-danger waves-effect waves-light"><i class="fa fa-fw fa-download"></i> Download Contact Excel Example</a>
            </div>
        </div>

    </div>
    <!-- end row -->
    @endif

    @if(\App\User::hasAuthority('list.leads'))
        <div class="row mb-4">
            <div class="col-md-8">
                @if(\App\User::hasAuthority('get_new.leads'))
                <a href="{{ route('leads.index', [1]) }}" class="btn btn-primary waves-effect waves-light">Get New Contacts</a>
                @endif

                @if(\App\User::hasAuthority('get_done.leads'))
                <a href="{{ route('leads.index', [2]) }}" class="btn btn-primary waves-effect waves-light">Get Done Contacts</a>
                @endif

                @if(\App\User::hasAuthority('get_duplicate.leads'))
                <a href="{{ route('leads.index', [3]) }}" class="btn btn-primary waves-effect waves-light">Get Duplicate Contacts</a>
                @endif
            </div>
            <div class="col-md-4 text-right">
                @if(\App\User::hasAuthority('make_done.leads'))
                <a href="{{ route('leads.makedone') }}" class="btn btn-success waves-effect waves-light">Check & Save</a>
                @endif
            </div>
        </div>

        <div id="life-search-tbody">
            <form action="{{ route('leads.massedit') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box ">
                            <h4 class="m-t-0 header-title">
                                <div class="row">
                                    <div class="col-md-6">All Contacts</div>
                                    <div class="col-md-6 text-right text-danger"><b>Count : ({{ $resources->count() }})</b></div>
                                </div>
                            </h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-muted font-14 m-b-30">
                                        Here you will find all the resources to make actions on them.
                                    </p>
                                </div>
                                <div class="col-md-6 text-right">
                                    @if(\App\User::hasAuthority('mass_edit.leads'))
                                        <select id="mass_class" class="btn btn-warning" name="mass_class">
                                            <option selected disabled>Change Class</option>
                                            <optgroup label="Class A">
                                                <option value="AA">AA</option>
                                                <option value="AB">AB</option>
                                                <option value="AC">AC</option>
                                                <option value="AD">AD</option>
                                            </optgroup>
                                            <optgroup label="Class B">
                                                <option value="BA">BA</option>
                                                <option value="BB">BB</option>
                                                <option value="BC">BC</option>
                                                <option value="BD">BD</option>
                                            </optgroup>
                                            <optgroup label="Class C">
                                                <option value="CA">CA</option>
                                                <option value="CB">CB</option>
                                                <option value="CC">CC</option>
                                                <option value="CD">CD</option>
                                            </optgroup>
                                            <optgroup label="Class D">
                                                <option value="DA">DA</option>
                                                <option value="DB">DB</option>
                                                <option value="DC">DC</option>
                                                <option value="DD">DD</option>
                                            </optgroup>
                                        </select>
                                        <select id="mass_users" class="btn btn-primary" name="mass_user">
                                            <option selected disabled>Transfer To</option>
                                            @foreach($sales as $user)
                                                @if($user->id != 1)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-success waves-effect waves-light"><i class="fa fa-fw fa-save"></i> Save</button>
                                    @endif
                                </div>
                            </div>


                            <table data-page-length='50' id="datatable-history-buttons" class="display nowrap table table-striped table-bordered table-sm table-responsive" cellspacing="0" width="100%">
                                <thead class="">
                                <tr>
                                    <th>Edit</th>
                                    <th><input type="checkbox" id="checkAllLeads"></th>
                                    <th>ID</th>
                                    <th>Company name</th>
                                    <th>Type</th>
                                    <th>Sub type</th>
                                    <th>Contact Name</th>
                                    <th>Title</th>
                                    @if(\App\User::hasAuthority('show_classes.leads'))
                                        <th>Class</th>
                                        <th>Sales 1</th>
                                        <th>Sales 2</th>
                                    @endif
                                    <th>Mobile 1</th>
                                    <th>Mobile 2</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Tel</th>
                                    <th>Notes</th>


                                    <th>Status</th>
                                    <th>Duplicated with</th>
                                    @if(\App\User::hasAuthority('show_sales_2.leads'))

                                    @endif
                                    <th>Transfer to</th>
                                    <th>Updated by</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Rmv</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>Edit</th>
                                    <th><input type="checkbox" id="checkAllLeads"></th>
                                    <th>ID</th>
                                    <th>Company name</th>
                                    <th>Type</th>
                                    <th>Sub type</th>
                                    <th>Contact Name</th>
                                    <th>Title</th>
                                    @if(\App\User::hasAuthority('show_classes.leads'))
                                        <th>Class</th>
                                        <th>Sales 1</th>
                                        <th>Sales 2</th>
                                    @endif
                                    <th>Mobile 1</th>
                                    <th>Mobile 2</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Tel</th>
                                    <th>Notes</th>


                                    <th>Status</th>
                                    <th>Duplicated with</th>
                                    @if(\App\User::hasAuthority('show_sales_2.leads'))

                                    @endif
                                    <th>Transfer to</th>
                                    <th>Updated by</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Rmv</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                @foreach($resources as $resource)
                                    <tr>
                                        <td>
                                            @if(\App\User::hasAuthority('edit.leads'))
                                                <a href="{{ route('leads.edit', [$resource->uuid]) }}"
                                                   class="update-modal btn btn-sm btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if(\App\User::hasAuthority('mass_edit.leads'))
                                                <input type="checkbox" name="leads[]" id="leads" value="{{ $resource->id }}">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $resource->id }}</td>

{{--                                        <td>{{ ($resource->company)? $resource->company->name : $resource->company_name }}</td>--}}
                                        <td>{{ ($resource->company)? $resource->company->name : '' }}</td>
                                        <td>{{ $resource->owner }}</td>
                                        <td>{{ $resource->sub_type }}</td>
                                        <td>{{ $resource->contact_engineer }}</td>
                                        <td>{{ $resource->title }}</td>
                                        @if(\App\User::hasAuthority('show_classes.leads'))
                                            <td>
                                                {{ $resource->class }}
                                            </td>
                                            <td>{{ $resource->createdBy->name }}</td>
                                        @endif
                                        @if(\App\User::hasAuthority('show_sales_2.leads'))
                                            <td>
                                                {{ ($resource->user)? $resource->user->name : '-' }}
                                            </td>
                                        @endif
                                        <td>{{ $resource->mobile_1 }}</td>
                                        <td>{{ $resource->mobile_2 }}</td>
                                        <td>{{ $resource->email }}</td>
                                        <td>{{ $resource->address }}</td>
                                        <td>{{ $resource->tel }}</td>
                                        <td>{{ $resource->notes }}</td>

                                        <td>{{ (key_exists($resource->status, \App\Enums\LeadsStatuses::$statuses))? \App\Enums\LeadsStatuses::$statuses[$resource->status] : '-' }}</td>
                                        <td>{{ $resource->duplicated_with }}</td>

                                        <td>{{ ($resource->transfer)? $resource->transfer->name : '-'}}</td>
                                        <td>{{ ($resource->updatedBy)? $resource->updatedBy->name : '-' }}</td>
                                        <td>{{ $resource->created_at }}</td>
                                        <td>{{ $resource->updated_at }}</td>
                                        <td>
                                            @if(\App\User::hasAuthority('delete.leads'))
                                                <a href="{{ route('leads.destroy', [$resource->uuid]) }}"
                                                   class="confirm-delete btn btn-sm btn-danger">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center">
                            {{ $resources->links() }}
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </form>
        </div>
    @endif


    @if(\App\User::hasAuthority('search.leads'))
        <div class="row" id="goToSearch">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    @if(\App\User::hasAuthority('search.leads'))
                        <li class="nav-item active">
                            <a class="nav-link " id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home2"
                               aria-selected="true">Filter</a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content" id="myTabContent2">
                    @if(\App\User::hasAuthority('search.leads'))
                        <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                            @include('leads.search')
                        </div>
                    @endif
                </div>
            </div>
            <!-- end card-box -->
        </div>
        <!-- end row -->
    @endif


@endsection

@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        @if(\App\User::hasAuthority('list.leads'))
        var tableDTUsers = $('#datatable-history-buttons').DataTable({
            lengthChange: false,
            paging: false,
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {

                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                    }
                }
            ],
        });
        tableDTUsers.buttons().container().appendTo('#datatable-history-buttons_wrapper .col-md-6:eq(0)');
        @endif

        $(document).ready(function(){
            // Select All
            $(document).on('click', "#checkAllLeads",function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });

        $(document).on('blur change', '.life-search-input', function () {
            addLoader();

            $(this).parents('.col-md-4').css({
                backgroundColor : '#cccccc',
            });

            var lifeSearchForm = $("#life-search-form")[0];
            var fd = new FormData(lifeSearchForm);

            console.log(fd);
            $.ajax({
                url: "{{ route('leads.search') }}",
                type: "POST",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
                    $('#life-search-tbody').html(data.view);
                    var tableDTUsers = $('#datatable-history-buttons').DataTable({
                        lengthChange: false,
                        paging: false,
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {

                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                                }
                            }
                        ],
                    });
                    tableDTUsers.buttons().container().appendTo('#datatable-history-buttons_wrapper .col-md-6:eq(0)');
                    console.log(data.view);
                    removeLoarder();
                },
                error: function (e) {

                }
            });

        });

        $(document).on('click', "#resetSearch",function(e){
            e.preventDefault();
            addLoader();

            $.ajax({
                url: "{{ route('leads.search.get') }}",
                type: "GET",
                data: {},
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
                    $('#home2').html(data.view);
                    $('.select2').select2();
                    removeLoarder();
                },
                error: function (e) {

                }
            });

            var lifeSearchForm = $("#life-search-form")[0];
            var fd = new FormData(lifeSearchForm);

            $.ajax({
                url: "{{ route('leads.index') }}",
                type: "GET",
                data: {},
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
                    $('#life-search-tbody').html(data.view);
                    var tableDTUsers = $('#datatable-history-buttons').DataTable({
                        lengthChange: false,
                        paging: false,
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {

                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                                }
                            }
                        ],
                    });
                    tableDTUsers.buttons().container().appendTo('#datatable-history-buttons_wrapper .col-md-6:eq(0)');
                    console.log(data.view);
                    removeLoarder();
                },
                error: function (e) {

                }
            });
        });
    </script>
@endsection