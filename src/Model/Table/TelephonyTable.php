<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Telephony Model
 *
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\PhoneLinesTable&\Cake\ORM\Association\BelongsTo $PhoneLines
 * @property \App\Model\Table\ModelsTable&\Cake\ORM\Association\BelongsToMany $Models
 *
 * @method \App\Model\Entity\Telephony newEmptyEntity()
 * @method \App\Model\Entity\Telephony newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Telephony[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Telephony get($primaryKey, $options = [])
 * @method \App\Model\Entity\Telephony findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Telephony patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Telephony[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Telephony|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Telephony saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Telephony[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Telephony[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Telephony[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Telephony[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TelephonyTable extends Table
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

        $this->setTable('telephony');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PhoneLines', [
            'foreignKey' => 'phone_line_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Models', [
            'foreignKey' => 'telephony_id',
            'targetForeignKey' => 'model_id',
            'joinTable' => 'telephony_models',
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
            ->scalar('imei')
            ->maxLength('imei', 100)
            ->requirePresence('imei', 'create')
            ->notEmptyString('imei');

        $validator
            ->scalar('imei2')
            ->maxLength('imei2', 100)
            ->requirePresence('imei2', 'create')
            ->notEmptyString('imei2');

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
        $rules->add($rules->isUnique(['imei2', 'imei', 'item_id']), ['errorField' => 'imei2']);
        $rules->add($rules->existsIn('item_id', 'Items'), ['errorField' => 'item_id']);
        $rules->add($rules->existsIn('phone_line_id', 'PhoneLines'), ['errorField' => 'phone_line_id']);

        return $rules;
    }
}
