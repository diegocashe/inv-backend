<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrintersConsumablesAssigment Model
 *
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\PrintersConsumablesAssigment newEmptyEntity()
 * @method \App\Model\Entity\PrintersConsumablesAssigment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PrintersConsumablesAssigment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrintersConsumablesAssigment get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrintersConsumablesAssigment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PrintersConsumablesAssigment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrintersConsumablesAssigment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrintersConsumablesAssigment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrintersConsumablesAssigment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrintersConsumablesAssigment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrintersConsumablesAssigment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrintersConsumablesAssigment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrintersConsumablesAssigment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrintersConsumablesAssigmentTable extends Table
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

        $this->setTable('printers_consumables_assigment');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'consumable_assigned_id',
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
        $rules->add($rules->existsIn('consumable_assigned_id', 'Items'), ['errorField' => 'consumable_assigned_id']);
        $rules->add($rules->existsIn('item_id', 'Items'), ['errorField' => 'item_id']);

        return $rules;
    }
}
