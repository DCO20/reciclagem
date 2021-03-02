<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable =[
        'client_id',
        'material_id',
        'qntd',
        'total_points',
        'total_receive',
    ];

     public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
