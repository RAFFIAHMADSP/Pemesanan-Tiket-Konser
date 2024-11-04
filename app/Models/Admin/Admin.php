<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    
    protected $table = 'admin';

    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'username',
        'password',
        'nama_admin',
        'foto',
    ];

    protected $hidden = [
        'password'
    ];

}
