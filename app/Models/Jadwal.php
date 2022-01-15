<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\User;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';
    protected $guarded = ['updated_at', 'deleted_at'];

    public function User()
    {
        return $this->belongsTo(User::class,  'nip', 'nip',);
    }
}
