<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Checkout;
use Auth;

class Camp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title", "price"
    ];

    public function getIsRegisteredAttribute()
    {
        // Apakah user sudah login atau belum, jika belum maka akan return false
        if(!Auth::check()){
            return false;
        }

        // Akan check apakah camp dan user sudah melakukan checkout
        // Tambah: Kondisi apakah Checkout sudah dibayar atau belum
        return Checkout::whereCampId($this->id)->whereUserId(Auth::id())->exists();
        // ->whereIsPaid(true)
    }
}
