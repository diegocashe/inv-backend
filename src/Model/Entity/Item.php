<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $serial
 * @property string $active_code
 * @property int $model_id
 * @property int $state_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Allocation $allocation
 * @property \App\Model\Entity\ExtraRow[] $extra_rows
 * @property \App\Model\Entity\PhoneLine $phone_line
 * @property \App\Model\Entity\PrintersConsumablesAssigment[] $printers_consumables_assigment
 * @property \App\Model\Entity\Telephony $telephony
 */
class Item extends Entity
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
        'serial' => true,
        'active_code' => true,
        'model_id' => true,
        'state_id' => true,
        'created' => true,
        'modified' => true,
        'model' => true,
        'state' => true,
        'extra_rows' => true,
        'printers_consumables_assigment' => true,
        'allocation' => true,
        'phone_line' => true,
        'telephony' => true,
    ];
}
