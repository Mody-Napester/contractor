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


                <table data-page-length='50' id="datatable-history-buttons" class="nowrap table table-striped table-bordered table-sm table-responsive" cellspacing="0" width="100%">
                    <thead>
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