<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trend extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'trends';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['agent', 'behaviour', 'theme', 'operation'];

}
