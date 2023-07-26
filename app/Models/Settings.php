<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'logo_path', 'fav_icon','company_name','company_email','company_phone',
        'instagram_link','facebook_link','linkedin_link'
    ];
}
