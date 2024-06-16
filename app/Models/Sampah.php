<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sampah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function members(){
        return $this->belongsToMany(Member::class, 'member_sampah')->withPivot('jumlah');
    }
}
