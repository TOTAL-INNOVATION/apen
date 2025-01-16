<?php

namespace App\Models;

use App\Traits\SearchFilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasUlids, SearchFilter;

    protected $fillable = ['email'];
}
