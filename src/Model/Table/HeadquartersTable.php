<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Headquarters Model
 *
 * @property \App\Model\Table\DepartmentsTable&\Cake\ORM\Association\HasMany $Departments
 *
 * @method \App\Model\Entity\Headquarters newEmptyEntity()
 * @method \App\Model\Entity\Headquarters newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Headquarters[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Headquarters get($primaryKey, $options = [])
 * @method \App\Model\Entity\Headquarters findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Headquarters patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Headquarters[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Headquarters|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Headquarters saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Headquarters[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Headquarters[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Headquarters[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Headquarters[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HeadquartersTable extends Table
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

        $this->setTable('headquarters');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Departments', [
            'foreignKey' => 'headquarters_id',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('acronym')
            ->maxLength('acronym', 10)
            ->requirePresence('acronym', 'create')
            ->notEmptyString('acronym');

        $validator
            ->scalar('direction')
            ->maxLength('direction', 255)
            ->requirePresence('direction', 'create')
            ->notEmptyString('direction');

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
        $rules->add($rules->isUnique(['name', 'acronym']), ['errorField' => 'name']);

        return $rules;
    }
}
