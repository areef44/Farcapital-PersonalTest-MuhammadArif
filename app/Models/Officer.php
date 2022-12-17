<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Officer extends Model
{
    use HasFactory;

    public $guarded = ["id"];
    protected $table = "officers";

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Officer $pengguna) {
            $pengguna->password = Hash::make($pengguna->password);
        });

        static::updating(function (Officer $pengguna) {
            if ($pengguna->isDirty(["password"])) {
                $pengguna->password = Hash::make($pengguna->password);
            }
        });
    }
}
