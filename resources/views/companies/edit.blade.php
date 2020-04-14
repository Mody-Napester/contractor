<form method="post" action="{{ route('companies.update', $resource->uuid) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="name">Name</label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $resource->name }}" required>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Is Active</label>
                <select name="is_active" id="is_active" class="select2" data-placeholder="Choose ..." tabindex="-1" aria-hidden="true" required>
                    <option @if($resource->is_active == 1) selected @endif value="1">Active</option>
                    <option @if($resource->is_active == 0) selected @endif value="0">Not Active</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group m-b-0">
        <div>
            <button type="submit" class="btn btn-success waves-effect waves-light">
                <i class="fa fa-fe fa-edit"></i> Update
            </button>
        </div>
    </div>
</form>
