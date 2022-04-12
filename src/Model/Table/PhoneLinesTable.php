<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PhoneLines Model
 *
 * @property \App\Model\Table\OperatorsTable&\Cake\ORM\Association\BelongsTo $Operators
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\TelephonyTable&\Cake\ORM\Association\hasOne $Telephony
 *
 * @method \App\Model\Entity\PhoneLine newEmptyEntity()
 * @method \App\Model\Entity\PhoneLine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PhoneLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PhoneLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\PhoneLine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PhoneLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PhoneLine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PhoneLine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhoneLine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhoneLine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PhoneLine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PhoneLine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PhoneLine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PhoneLinesTable extends Table
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

        $this->setTable('phone_lines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Operators', [
            'foreignKey' => 'operator_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER',
        ]);
        $this->hasOne('Telephony', [
            'foreignKey' => 'phone_line_id',
        ])->setDependent(false);
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
            ->scalar('number')
            ->maxLength('number', 100)
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->scalar('imsi')
            ->maxLength('imsi', 100)
            ->requirePresence('imsi', 'create')
            ->notEmptyString('imsi');

        $validator
            ->scalar('sim_card')
            ->maxLength('sim_card', 100)
            ->requirePresence('sim_card', 'create')
            ->notEmptyString('sim_card');

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
        $rules->add($rules->isUnique(['sim_card', 'imsi', 'number', 'item_id']), ['errorField' => 'sim_card']);
        $rules->add($rules->existsIn('operator_id', 'Operators'), ['errorField' => 'operator_id']);
        $rules->add($rules->existsIn('item_id', 'Items'), ['errorField' => 'item_id']);

        return $rules;
    }
}
