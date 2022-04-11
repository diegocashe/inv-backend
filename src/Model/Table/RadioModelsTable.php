<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RadioModels Model
 *
 * @property \App\Model\Table\ModelsTable&\Cake\ORM\Association\BelongsTo $Models
 * @property \App\Model\Table\RadioBandsTable&\Cake\ORM\Association\BelongsTo $RadioBands
 * @property \App\Model\Table\RadioFrequencysTable&\Cake\ORM\Association\BelongsTo $RadioFrequencys
 * @property \App\Model\Table\RadioTypesTable&\Cake\ORM\Association\BelongsTo $RadioTypes
 *
 * @method \App\Model\Entity\RadioModel newEmptyEntity()
 * @method \App\Model\Entity\RadioModel newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RadioModel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RadioModel get($primaryKey, $options = [])
 * @method \App\Model\Entity\RadioModel findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RadioModel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RadioModel[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RadioModel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RadioModel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RadioModel[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RadioModel[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RadioModel[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RadioModel[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RadioModelsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('radio_models');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Models', [
            'foreignKey' => 'model_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('RadioBands', [
            'foreignKey' => 'band_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RadioFrequencys', [
            'foreignKey' => 'frecuency_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RadioTypes', [
            'foreignKey' => 'radio_types_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('model_id', 'Models'), ['errorField' => 'model_id']);
        $rules->add($rules->existsIn('band_id', 'RadioBands'), ['errorField' => 'band_id']);
        $rules->add($rules->existsIn('frecuency_id', 'RadioFrequencys'), ['errorField' => 'frecuency_id']);
        $rules->add($rules->existsIn('radio_types_id', 'RadioTypes'), ['errorField' => 'radio_types_id']);

        return $rules;
    }
}
