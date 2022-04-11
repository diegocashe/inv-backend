<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TelephonyModels Model
 *
 * @property \App\Model\Table\ModelsTable&\Cake\ORM\Association\BelongsTo $Models
 * @property \App\Model\Table\TelephonyTypesTable&\Cake\ORM\Association\BelongsTo $TelephonyTypes
 *
 * @method \App\Model\Entity\TelephonyModel newEmptyEntity()
 * @method \App\Model\Entity\TelephonyModel newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TelephonyModel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TelephonyModel get($primaryKey, $options = [])
 * @method \App\Model\Entity\TelephonyModel findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TelephonyModel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TelephonyModel[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TelephonyModel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TelephonyModel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TelephonyModel[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TelephonyModel[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TelephonyModel[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TelephonyModel[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TelephonyModelsTable extends Table
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

        $this->setTable('telephony_models');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Models', [
            'foreignKey' => 'model_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('TelephonyTypes', [
            'foreignKey' => 'telephony_type_id',
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
        $rules->add($rules->existsIn('telephony_type_id', 'TelephonyTypes'), ['errorField' => 'telephony_type_id']);

        return $rules;
    }
}
