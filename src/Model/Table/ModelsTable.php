<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Models Model
 *
 * @property \App\Model\Table\BrandsTable&\Cake\ORM\Association\BelongsTo $Brands
 * @property \App\Model\Table\ItemTypesTable&\Cake\ORM\Association\BelongsTo $ItemTypes
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\HasMany $Items
 * @property \App\Model\Table\ConsumableModelsTable&\Cake\ORM\Association\HasOne $ConsumableModels
 * @property \App\Model\Table\PrinterModelsTable&\Cake\ORM\Association\HasOne $PrinterModels
 * @property \App\Model\Table\RadioModelsTable&\Cake\ORM\Association\HasOne $RadioModels
 * @property \App\Model\Table\TelephonyModelsTable&\Cake\ORM\Association\HasOne $TelephonyModels
 *
 * @method \App\Model\Entity\Model newEmptyEntity()
 * @method \App\Model\Entity\Model newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Model[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Model get($primaryKey, $options = [])
 * @method \App\Model\Entity\Model findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Model patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Model[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Model|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Model saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ModelsTable extends Table
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

        $this->setTable('models');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Brands', [
            'foreignKey' => 'brand_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ItemTypes', [
            'foreignKey' => 'item_type_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'model_id',
        ]);
        $this->hasOne('ConsumableModels', [
            'foreignKey' => 'model_id',
        ])->setDependent(true);
        $this->hasOne('PrinterModels', [
            'foreignKey' => 'model_id',
        ])->setDependent(true);
        $this->hasOne('RadioModels', [
            'foreignKey' => 'model_id',
        ])->setDependent(true);
        $this->hasOne('TelephonyModels', [
            'foreignKey' => 'model_id',
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
            ->scalar('code')
            ->maxLength('code', 100)
            ->requirePresence('code', 'create')
            ->notEmptyString('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

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
        $rules->add($rules->isUnique(['code']), ['errorField' => 'code']);
        $rules->add($rules->existsIn('brand_id', 'Brands'), ['errorField' => 'brand_id']);
        $rules->add($rules->existsIn('item_type_id', 'ItemTypes'), ['errorField' => 'item_type_id']);

        return $rules;
    }
}
