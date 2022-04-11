<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Model Entity
 *
 * @property int $id
 * @property string $code
 * @property int $brand_id
 * @property int $item_type_id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\ItemType $item_type
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\ConsumableModel $consumable_model
 * @property \App\Model\Entity\PrinterModel $printer_model
 * @property \App\Model\Entity\RadioModel $radio_model
 * @property \App\Model\Entity\Telephony $telephony_model
 */
class Model extends Entity
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
        'code' => true,
        'brand_id' => true,
        'item_type_id' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'brand' => true,
        'item_type' => true,
        'items' => true,
        'consumable_model' => true,
        'printer_model' => true,
        'radio_model' => true,
        'telephony_model' => true,
    ];
}
