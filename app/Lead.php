<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'owner', 'sub_type', 'contact_engineer',
        'title', 'class', 'mobile_1', 'mobile_2', 'email','address', 'status', 'duplicated_with',
        'tel', 'notes', 'user_id', 'created_by', 'updated_by'];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) \Webpatser\Uuid\Uuid::generate(config('vars.uuid_ver'));
        });
    }

    /**
     *  Create new resource
     */
    public static function store($inputs)
    {
        return self::create($inputs);
    }

    /**
     *  Update existing resource
     */
    public static function edit($inputs, $resource)
    {
        return self::where('id', $resource)->update($inputs);
    }

    /**
     *  Delete existing resource
     */
    public static function remove($resource)
    {
        return self::where('id', $resource)->delete();
    }

    /**
     *  Get a specific resource
     */
    public static function getBy($by, $resource)
    {
        return self::where($by, $resource)->first();
    }

    /**
     *  Relationship with users
     */
    public function user()
    {
        return $this->belongsTo('App\User');

    }

    /**
     *  Relationship with users
     */
    public function transfer()
    {
        return $this->belongsTo('App\User', 'transfer_to');

    }

    /**
     *  Relationship with users
     */
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');

    }

    /**
     *  Relationship with users
     */
    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by');

    }

    /**
     *  Relationship with company
     */
    public function company()
    {
        return $this->belongsTo('App\Company', 'company_name');

    }

    /**
     *  Relationship with roles
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user');
    }
}
