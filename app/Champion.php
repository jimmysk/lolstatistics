<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property string $Name
 * @property string $ChampKey
 * @property string $Title
 * @property string $Image
 * @property string $Tags
 */
class Champion extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    protected $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['Name', 'ChampKey', 'Title', 'Image', 'Tags'];

}
