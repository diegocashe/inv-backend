<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PrinterModel Entity
 *
 * @property int $id
 * @property int $model_id
 * @property int $printer_type_id
 * @property int $consumable_id
 * @property int $print_types_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\PrinterType $printer_type
 * @property \App\Model\Entity\ConsumableModel $consumable_model
 * @property \App\Model\Entity\PrintType $print_type
 */
class PrinterModel extends Entity
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
        'model_id' => true,
        'printer_type_id' => true,
        'consumable_id' => true,
        'print_types_id' => true,
        'created' => true,
        'modified' => true,
        'model' => true,
        'printer_type' => true,
        'consumable_model' => true,
        'print_type' => true,
    ];
}
