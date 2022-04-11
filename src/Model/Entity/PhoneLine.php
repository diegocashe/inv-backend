<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PhoneLine Entity
 *
 * @property int $id
 * @property string $number
 * @property string $imsi
 * @property string $sim_card
 * @property int $operator_id
 * @property int $item_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Operator $operator
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\Telephony $telephony
 */
class PhoneLine extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'number' => true,
        'imsi' => true,
        'sim_card' => true,
        'operator_id' => true,
        'item_id' => true,
        'created' => true,
        'modified' => true,
        'operator' => true,
        'item' => true,
        'telephony' => true,
    ];
}
