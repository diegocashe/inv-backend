<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Telephony Entity
 *
 * @property int $id
 * @property string $imei
 * @property string $imei2
 * @property int $item_id
 * @property int $phone_line_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\PhoneLine $phone_line
 * @property \App\Model\Entity\Model[] $models
 */
class Telephony extends Entity
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
        'imei' => true,
        'imei2' => true,
        'item_id' => true,
        'phone_line_id' => true,
        'created' => true,
        'modified' => true,
        'item' => true,
        'phone_line' => true,
        'models' => true,
    ];
}
