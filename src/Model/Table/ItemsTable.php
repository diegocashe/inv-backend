<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \App\Model\Table\ModelsTable&\Cake\ORM\Association\BelongsTo $Models
 * @property \App\Model\Table\StatesTable&\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\ExtraRowsTable&\Cake\ORM\Association\HasMany $ExtraRows
 * @property \App\Model\Table\PrintersConsumablesAssigmentTable&\Cake\ORM\Association\HasMany $PrintersConsumablesAssigment
 * @property \App\Model\Table\AllocationsTable&\Cake\ORM\Association\HasOne $Allocations
 * @property \App\Model\Table\PhoneLinesTable&\Cake\ORM\Association\HasOne $PhoneLines
 * @property \App\Model\Table\TelephonyTable&\Cake\ORM\Association\HasOne $Telephony
 *
 * @method \App\Model\Entity\Item newEmptyEntity()
 * @method \App\Model\Entity\Item newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItemsTable extends Table
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

        $this->setTable('items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Models', [
            'foreignKey' => 'model_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ExtraRows', [
            'foreignKey' => 'item_id',
        ])->setDependent(true);
        $this->hasMany('PrintersConsumablesAssigment', [
            'foreignKey' => 'item_id',
        ]);
        $this->hasOne('Allocations', [
            'foreignKey' => 'item_id',
        ])->setDependent(true);
        $this->hasOne('PhoneLines', [
            'foreignKey' => 'item_id',
        ])->setDependent(true);
        $this->hasOne('Telephony', [
            'foreignKey' => 'item_id',
        ])->setDependent(true);
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

        $validator
            ->scalar('serial')
            ->maxLength('serial', 100)
            ->requirePresence('serial', 'create')
            ->notEmptyString('serial');

        $validator
            ->scalar('active_code')
            ->maxLength('active_code', 100)
            ->requirePresence('active_code', 'create')
            ->notEmptyString('active_code');

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
        $rules->add($rules->isUnique(['active_code', 'serial']), ['errorField' => 'active_code']);
        $rules->add($rules->existsIn('model_id', 'Models'), ['errorField' => 'model_id']);
        $rules->add($rules->existsIn('state_id', 'States'), ['errorField' => 'state_id']);

        return $rules;
    }
}
