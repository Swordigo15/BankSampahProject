<?php

namespace App\Models;

use App\Models\Sampah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sampahs(){
        return $this->belongsToMany(Sampah::class, 'member_sampah')->withPivot('jumlah');
    }
}
