<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vkr extends Model
{

    //
    protected $table = 'vkr';
    static $polls;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name_file',
        'family',
        'name',
        'otchestvo',
        'id_fakultet',
        'napravlenie_podgotovki',
        'profile',
        'tema',
        'dt',];
}
