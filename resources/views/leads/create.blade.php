<form method="post" action="{{ route('leads.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="company_name">Company name</label>
                <input id="company_name" type="text" autocomplete="off" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('company_name') }}">

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
                    <option value="Contractor">Contractor</option>
                    <option value="Consultant">Consultant</option>
                    <option value="Owner">Owner</option>
                    <option value="Supplier">Supplier</option>
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
                    <option value="GENERAL">GENERAL</option>
                    <option value="FIRE">FIRE</option>
                    <option value="HVAC">HVAC</option>
                    <option value="INFRA">INFRA</option>
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
                <input id="contact_engineer" type="text" autocomplete="off" class="form-control{{ $errors->has('contact_engineer') ? ' is-invalid' : '' }}" name="contact_engineer" value="{{ old('contact_engineer') }}" required>

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
                    <option value="Office Engineer">Office Engineer</option>
                    <option value="Office Manager">Office Manager</option>
                    <option value="Site Engineer">Site Engineer</option>
                    <option value="Site Manager">Site Manager</option>
                </select>

                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        @if(\App\User::hasAuthority('create_classes.leads'))
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="class">Class</label>
                <select id="class" class="select2 form-control{{ $errors->has('class') ? ' is-invalid' : '' }}" name="class">
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

                @if ($errors->has('class'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('class') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @endif

        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="mobile_1">Mobile 1</label>
                <input id="mobile_1" type="tel" pattern="0[0-9]{10}" data-parsley-error-message="Please insert mobile start with 0 and 11 digits." autocomplete="off" class="form-control{{ $errors->has('mobile_1') ? ' is-invalid' : '' }}" name="mobile_1" value="{{ old('mobile_1') }}" required>

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
                <input id="mobile_2" type="tel" pattern="0[0-9]{10}" data-parsley-error-message="Please insert mobile start with 0 and 11 digits." autocomplete="off" class="form-control{{ $errors->has('mobile_2') ? ' is-invalid' : '' }}" name="mobile_2" value="{{ old('mobile_2') }}">

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
                <input id="email" type="email" autocomplete="off" data-parsley-error-message="Please insert email like email@website.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                <input id="address" type="text" autocomplete="off" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}">

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
                <input id="tel" type="tel" autocomplete="off" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}">

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
                <input id="notes" type="text" autocomplete="off" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" name="notes" value="{{ old('notes') }}">

                @if ($errors->has('notes'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('notes') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        @if(\App\User::hasAuthority('create_sales_2.leads'))
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="user">Sales 2</label>
                <select id="user" class="select2 form-control{{ $errors->has('user') ? ' is-invalid' : '' }}" name="user">
                    <option disabled selected>Choose</option>
                    @foreach($sales as $user)
                        @if($user->id != 1)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
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
        @endif

    </div>

    <div class="form-group m-b-0">
        <div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Submit
            </button>
        </div>
    </div>
</form>