<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lexicon extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lexicons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cn_character', 'phonetic_element', 'rhyme_element', 'reconstruction_wl', 'reconstruction_lfg', 
                           'reconstruction_byp', 'reconstruction_byps', 'reconstruction_zzsf', 'traditional_pronunciation', 
                           'rhythm_status', 'guangyun_position', 'modern_pronunciation'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
