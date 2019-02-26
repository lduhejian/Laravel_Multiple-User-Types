<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['preferred_pharmacy'];
    
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
