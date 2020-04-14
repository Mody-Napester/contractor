<form method="post" action="{{ route('leads.update', $resource->uuid) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="row">
        {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
                {{--<label class="" for="company_name">Company name</label>--}}
                {{--<input id="company_name" type="text" autocomplete="off" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ $resource->company_name }}">--}}

                {{--@if ($errors->has('company_name'))--}}
                    {{--<span class="invalid-feedback" role="alert">--}}
                        {{--<strong>{{ $errors->first('company_name') }}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="company_name">Company name</label>

                <select id="company_name" class="select2 form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name">
                    <option disabled selected>Choose</option>
                    @foreach($companies as $company)
                        <option @if($resource->company_name == $company->id) selected @endif value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('company_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('company_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="owner">Type</label>
                <select id="owner" class="select2 form-control{{ $errors->has('owner') ? ' is-invalid' : '' }}" name="owner">
                    <option @if($resource->owner == 'Contractor') selected @endif value="Contractor">Contractor</option>
                    <option @if($resource->owner == 'Consultant') selected @endif value="Consultant">Consultant</option>
                    <option @if($resource->owner == 'Owner') selected @endif value="Owner">Owner</option>
                    <option @if($resource->owner == 'Supplier') selected @endif value="Supplier">Supplier</option>
                </select>

                @if ($errors->has('owner'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('owner') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="sub_type">Sub type</label>
                <select id="sub_type" class="select2 form-control{{ $errors->has('sub_type') ? ' is-invalid' : '' }}" name="sub_type">
                    <option @if($resource->sub_type == 'GENERAL') selected @endif value="GENERAL">GENERAL</option>
                    <option @if($resource->sub_type == 'FIRE') selected @endif value="FIRE">FIRE</option>
                    <option @if($resource->sub_type == 'HVAC') selected @endif value="HVAC">HVAC</option>
                    <option @if($resource->sub_type == 'INFRA') selected @endif value="INFRA">INFRA</option>
                </select>

                @if ($errors->has('sub_type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('sub_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="contact_engineer">Contact Name</label>
                <input id="contact_engineer" type="text" autocomplete="off" class="form-control{{ $errors->has('contact_engineer') ? ' is-invalid' : '' }}" name="contact_engineer" value="{{ $resource->contact_engineer }}" required>

                @if ($errors->has('contact_engineer'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('contact_engineer') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="title">Title</label>
                <select id="title" class="select2 form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title">
                    <option @if($resource->title == 'Office Engineer') selected @endif value="Office Engineer">Office Engineer</option>
                    <option @if($resource->title == 'Office Manager') selected @endif value="Office Manager">Office Manager</option>
                    <option @if($resource->title == 'Site Engineer') selected @endif value="Site Engineer">Site Engineer</option>
                    <option @if($resource->title == 'Site Manager') selected @endif value="Site Manager">Site Manager</option>
                </select>

                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="class">Class</label>
                <select id="class" class="select2 form-control{{ $errors->has('class') ? ' is-invalid' : '' }}" name="class">
                    <optgroup label="Class A">
                        <option @if($resource->class == 'AA') selected @endif value="AA">AA</option>
                        <option @if($resource->class == 'AB') selected @endif value="AB">AB</option>
                        <option @if($resource->class == 'AC') selected @endif value="AC">AC</option>
                        <option @if($resource->class == 'AD') selected @endif value="AD">AD</option>
                    </optgroup>
                    <optgroup label="Class B">
                        <option @if($resource->class == 'BA') selected @endif value="BA">BA</option>
                        <option @if($resource->class == 'BB') selected @endif value="BB">BB</option>
                        <option @if($resource->class == 'BC') selected @endif value="BC">BC</option>
                        <option @if($resource->class == 'BD') selected @endif value="BD">BD</option>
                    </optgroup>
                    <optgroup label="Class C">
                        <option @if($resource->class == 'CA') selected @endif value="CA">CA</option>
                        <option @if($resource->class == 'CB') selected @endif value="CB">CB</option>
                        <option @if($resource->class == 'CC') selected @endif value="CC">CC</option>
                        <option @if($resource->class == 'CD') selected @endif value="CD">CD</option>
                    </optgroup>
                    <optgroup label="Class D">
                        <option @if($resource->class == 'DA') selected @endif value="DA">DA</option>
                        <option @if($resource->class == 'DB') selected @endif value="DB">DB</option>
                        <option @if($resource->class == 'DC') selected @endif value="DC">DC</option>
                        <option @if($resource->class == 'DD') selected @endif value="DD">DD</option>
                    </optgroup>
                </select>

                @if ($errors->has('class'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('class') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="mobile_1">Mobile 1</label>
                <input id="mobile_1" type="tel" pattern="0[0-9]{10}" data-parsley-error-message="Please insert mobile start with 0 and 11 digits." autocomplete="off" class="form-control{{ $errors->has('mobile_1') ? ' is-invalid' : '' }}" name="mobile_1" value="{{ $resource->mobile_1 }}" required>

                @if ($errors->has('mobile_1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('mobile_1') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="mobile_2">Mobile 2</label>
                <input id="mobile_2" type="tel" pattern="0[0-9]{10}" data-parsley-error-message="Please insert mobile start with 0 and 11 digits." autocomplete="off" class="form-control{{ $errors->has('mobile_2') ? ' is-invalid' : '' }}" name="mobile_2" value="{{ $resource->mobile_2 }}">

                @if ($errors->has('mobile_2'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('mobile_2') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="email">Email</label>
                <input id="email" type="email" data-parsley-error-message="Please insert email like email@website.com" autocomplete="off" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $resource->email }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="address">Address</label>
                <input id="address" type="text" autocomplete="off" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $resource->address }}">

                @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="tel">Tel</label>
                <input id="tel" type="tel" autocomplete="off" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ $resource->tel }}">

                @if ($errors->has('tel'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tel') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="notes">Notes</label>
                <input id="notes" type="text" autocomplete="off" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" name="notes" value="{{ $resource->notes }}">

                @if ($errors->has('notes'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('notes') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="user">Sales 2</label>
                <select id="user" class="select2 form-control{{ $errors->has('user') ? ' is-invalid' : '' }}" name="user">
                    <option value="0">Choose</option>
                    @foreach($sales as $user)
                        @if($user->id != 1)
                            <option @if($resource->user_id == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>

                @if ($errors->has('user'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('user') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="status">Status</label>
                <select id="status" class="select2 form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                    @foreach(\App\Enums\LeadsStatuses::$statuses as $key => $status)
                        <option @if($resource->status == $key) selected @endif value="{{ $key }}">{{ $status }}</option>
                    @endforeach
                </select>

                @if ($errors->has('status'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group m-b-0">
        <div>
            <button type="submit" class="btn btn-success waves-effect waves-light">
                Update
            </button>
        </div>
    </div>
</form>