<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property string|null $nacional_identify
 * @property int|null $position_id
 * @property int $user_id
 * @property int|null $department_headquarter_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\DepartmentHeadquarter $department_headquarter
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
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'nacional_identify' => true,
        'position_id' => true,
        'user_id' => true,
        'department_headquarter_id' => true,
        'created' => true,
        'modified' => true,
        'position' => true,
        'user' => true,
        'department_headquarter' => true,
    ];
}
