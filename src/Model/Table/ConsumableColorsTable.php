<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ConsumableColors Model
 *
 * @property \App\Model\Table\ConsumableModelsTable&\Cake\ORM\Association\HasMany $ConsumableModels
 *
 * @method \App\Model\Entity\ConsumableColor newEmptyEntity()
 * @method \App\Model\Entity\ConsumableColor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ConsumableColor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ConsumableColor get($primaryKey, $options = [])
 * @method \App\Model\Entity\ConsumableColor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ConsumableColor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ConsumableColor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ConsumableColor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConsumableColor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConsumableColor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConsumableColor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConsumableColor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ConsumableColor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ConsumableColorsTable extends Table
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

        $this->setTable('consumable_colors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ConsumableModels', [
            'foreignKey' => 'consumable_color_id',
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
            ->scalar('colors')
            ->maxLength('colors', 255)
            ->requirePresence('colors', 'create')
            ->notEmptyString('colors');

        return $validator;
    }
}
