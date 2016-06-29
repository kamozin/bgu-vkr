<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Facultets extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fakultet';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name_fakultet', 'url_fakultet', 'dt'];


}
