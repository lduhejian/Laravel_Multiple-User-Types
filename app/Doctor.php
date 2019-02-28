<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $fillable = ['specialty'];
    
    protected $hidden = ['id', 'created_at', 'updated_at'];
    
    public function user()
    {
        return $this->morphOne('User', 'typeable');
    }
}
