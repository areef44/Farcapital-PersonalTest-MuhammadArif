<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    public $guarded = ['id'];
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->belongsTo('App\Models\Users', 'user_id');
    }
}
