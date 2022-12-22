<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Donor;
use Illuminate\Support\Facades\Hash;


class Users extends Model
{
    use HasFactory;

    public $guarded = ["id"];
    protected $table = "users";

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Users $pengguna) {
            $pengguna->password = Hash::make($pengguna->password);
        });

        static::updating(function (Users $pengguna) {
            if ($pengguna->isDirty(["password"])) {
                $pengguna->password = Hash::make($pengguna->password);
            }
        });
    }

    public function donor()
    {
        return $this->hasOne('use App\Models\Donor', 'user_id');
    }
}
