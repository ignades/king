<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lighe extends Model
{
    use HasFactory;
    protected $table = 'lighe';
    protected $fillable = ['id','name','is_real','leagues','scores','federation_id','federation_name','national_team','created_at','updated_at'];
}
