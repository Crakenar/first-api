<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    const NOT_ALLOWED_GET = 1;
    const NOT_ALLOWED_UPDATE = 2;
    const NOT_ALLOWED_POST = 3;
    const NOT_ALLOWED_DELETE = 4;
    const NOT_ALLOWED_CREATE = 5;
}
