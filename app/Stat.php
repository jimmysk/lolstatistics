<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Champ_ID
 * @property float $ArmorPerLevel
 * @property float $AttackDamage
 * @property float $MpPerLevel
 * @property float $AttackSpeedOffset
 * @property float $MP
 * @property float $Armor
 * @property float $HP
 * @property float $HPRegenPerLevel
 * @property float $AttackSpeedPerLevel
 * @property float $AttackRange
 * @property float $Movespeed
 * @property float $AttackDamagePerLevel
 * @property float $MPRegenPerLevel
 * @property float $CritPerLevel
 * @property float $SpellBlockPerLevel
 * @property float $Crit
 * @property float $MPRegen
 * @property float $SpellBlock
 * @property float $HPRegen
 * @property float $HPPerLevel
 */
class Stat extends Model
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
    protected $fillable = ['ArmorPerLevel', 'AttackDamage', 'MpPerLevel', 'AttackSpeedOffset', 'MP', 'Armor', 'HP', 'HPRegenPerLevel', 'AttackSpeedPerLevel', 'AttackRange', 'Movespeed', 'AttackDamagePerLevel', 'MPRegenPerLevel', 'CritPerLevel', 'SpellBlockPerLevel', 'Crit', 'MPRegen', 'SpellBlock', 'HPRegen', 'HPPerLevel'];

}
