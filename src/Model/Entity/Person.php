<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $first_name_1
 * @property string $first_name_2
 * @property string $last_name_1
 * @property string $last_name_2
 * @property string $email
 * @property string $nacional_identify
 * @property int $department_id
 * @property int $position_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Position $position
 */
class Person extends Entity
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
        'first_name_1' => true,
        'first_name_2' => true,
        'last_name_1' => true,
        'last_name_2' => true,
        'email' => true,
        'nacional_identify' => true,
        'department_id' => true,
        'position_id' => true,
        'created' => true,
        'modified' => true,
        'department' => true,
        'position' => true,
    ];
}
