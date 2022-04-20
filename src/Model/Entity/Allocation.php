<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Allocation Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $assigment_date
 * @property \Cake\I18n\FrozenTime|null $dispatch_date
 * @property string $ubication
 * @property bool $active
 * @property int $item_id
 * @property int|null $assigned_people_id
 * @property int|null $assignor_people_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Observation[] $observations
 */
class Allocation extends Entity
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
        'assigment_date' => true,
        'dispatch_date' => true,
        'ubication' => true,
        'active' => true,
        'item_id' => true,
        'assigned_people_id' => true,
        'assignor_people_id' => true,
        'created' => true,
        'modified' => true,
        'item' => true,
        'person' => true,
        'observations' => true,
    ];
}
