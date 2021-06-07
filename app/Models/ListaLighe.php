<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaLighe extends Model
{
    use HasFactory;
    protected $table = 'lista_lighe';
    protected $fillable = ["id_lega","name","country_id","scores","created_at","updated_at"];

}
