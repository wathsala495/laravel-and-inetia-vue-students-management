<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory;
    protected $fillable=['name','email','class_id','sections_id'];

    public function class()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function section(){
        return $this->belongsTo(Sections::class);
    }
}
