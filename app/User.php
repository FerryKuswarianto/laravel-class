<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract{

    use Authenticatable;

	protected $fillable = ['name', 'email', 'password'];

    public function groups() {
        return $this->belongsToMany('App\Group');
    }
}
