<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ConsumableModels Model
 *
 * @property \App\Model\Table\ModelsTable&\Cake\ORM\Association\BelongsTo $Models
 * @property \App\Model\Table\ConsumableColorsTable&\Cake\ORM\Association\BelongsTo $ConsumableColors
 * @property \App\Model\Table\ConsumableTypesTable&\Cake\ORM\Association\BelongsTo $ConsumableTypes
 * @property \App\Model\Table\PrinterModelsTable&\Cake\ORM\Association\HasMany $PrinterModels
 * 
 *
 * @method \App\Model\Entity\ConsumableModel newEmptyEntity()
 * @method \App\Model\Entity\ConsumableModel newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ConsumableModel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ConsumableModel get($primaryKey, $options = [])
 * @method \App\Model\Entity\ConsumableModel findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ConsumableModel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ConsumableModel[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ConsumableModel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConsumableModel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConsumableModel[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConsumableModel[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConsumableModel[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConsumableModel[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ConsumableModelsTable extends Table
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

        $this->setTable('consumable_models');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PrinterModels', [
            'foreignKey' => 'model_id',
        ])->setDependent(false);

        $this->belongsTo('Models', [
            'foreignKey' => 'model_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ConsumableColors', [
            'foreignKey' => 'consumable_color_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ConsumableTypes', [
            'foreignKey' => 'consumable_type_id',
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
        $rules->add($rules->existsIn('consumable_color_id', 'ConsumableColors'), ['errorField' => 'consumable_color_id']);
        $rules->add($rules->existsIn('consumable_type_id', 'ConsumableTypes'), ['errorField' => 'consumable_type_id']);

        return $rules;
    }
}
