<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RadioModel Entity
 *
 * @property int $id
 * @property int $model_id
 * @property int $band_id
 * @property int $frecuency_id
 * @property int $radio_types_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\RadioBand $radio_band
 * @property \App\Model\Entity\RadioFrequency $radio_frequency
 * @property \App\Model\Entity\RadioType $radio_type
 */
class RadioModel extends Entity
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
        'band_id' => true,
        'frecuency_id' => true,
        'radio_types_id' => true,
        'created' => true,
        'modified' => true,
        'model' => true,
        'radio_band' => true,
        'radio_frequency' => true,
        'radio_type' => true,
    ];
}
