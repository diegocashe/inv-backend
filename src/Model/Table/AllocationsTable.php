<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Allocations Model
 *
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\PeopleTable&\Cake\ORM\Association\BelongsTo $People
 * @property \App\Model\Table\PeopleTable&\Cake\ORM\Association\BelongsTo $People
 * @property \App\Model\Table\ObservationsTable&\Cake\ORM\Association\HasMany $Observations
 *
 * @method \App\Model\Entity\Allocation newEmptyEntity()
 * @method \App\Model\Entity\Allocation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Allocation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Allocation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Allocation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Allocation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Allocation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Allocation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Allocation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Allocation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Allocation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Allocation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Allocation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AllocationsTable extends Table
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

        $this->setTable('allocations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('People', [
            'foreignKey' => 'assigned_people_id',
        ]);
        $this->belongsTo('People', [
            'foreignKey' => 'assignor_people_id',
        ]);
        $this->hasMany('Observations', [
            'foreignKey' => 'allocation_id',
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

        $validator
            ->dateTime('assigment_date')
            ->allowEmptyDateTime('assigment_date');

        $validator
            ->dateTime('dispatch_date')
            ->allowEmptyDateTime('dispatch_date');

        $validator
            ->scalar('ubication')
            ->maxLength('ubication', 255)
            ->requirePresence('ubication', 'create')
            ->notEmptyString('ubication');

        $validator
            ->boolean('active')
            ->notEmptyString('active');

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
        $rules->add($rules->existsIn('item_id', 'Items'), ['errorField' => 'item_id']);
        $rules->add($rules->existsIn('assigned_people_id', 'People'), ['errorField' => 'assigned_people_id']);
        $rules->add($rules->existsIn('assignor_people_id', 'People'), ['errorField' => 'assignor_people_id']);

        return $rules;
    }
}
