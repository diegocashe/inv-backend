<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PrintersConsumablesAssigment Entity
 *
 * @property int $id
 * @property int $item_id
 * @property int $consumable_assigned_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Item $item
 */
class PrintersConsumablesAssigment extends Entity
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
        'item_id' => true,
        'consumable_assigned_id' => true,
        'created' => true,
        'modified' => true,
        'item' => true,
    ];
}
