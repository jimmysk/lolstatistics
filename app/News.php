<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $Title
 * @property string $Composer
 * @property string $Summary
 * @property string $Description
 * @property string $Image
 * @property string $updated_at
 * @property string $created_at
 */
class News extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['Title', 'Composer', 'Summary', 'Description', 'Image', 'updated_at', 'created_at'];

}
