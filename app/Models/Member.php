<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $fillable = ['memberName', 'memberSchoolId', 'memberEmail'];
}
