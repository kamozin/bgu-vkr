<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model {

	//

    protected $table = 'year';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['year'];

}
