<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Champ_ID
 * @property int $Difficulty
 * @property int $Attack
 * @property int $Defense
 * @property int $Magic
 */
class Info extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Champ_ID';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    protected $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['Difficulty', 'Attack', 'Defense', 'Magic'];

}
