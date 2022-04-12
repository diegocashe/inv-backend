<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DepartmentHeadquarter Model
 *
 * @property \App\Model\Table\DepartmentsTable&\Cake\ORM\Association\BelongsTo $Departments
 * @property \App\Model\Table\HeadquartersTable&\Cake\ORM\Association\BelongsTo $Headquarters
 * @property \App\Model\Table\PeopleTable&\Cake\ORM\Association\HasMany $People
 *
 * @method \App\Model\Entity\DepartmentHeadquarter newEmptyEntity()
 * @method \App\Model\Entity\DepartmentHeadquarter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentHeadquarter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentHeadquarter get($primaryKey, $options = [])
 * @method \App\Model\Entity\DepartmentHeadquarter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DepartmentHeadquarter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentHeadquarter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentHeadquarter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentHeadquarter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentHeadquarter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DepartmentHeadquarter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DepartmentHeadquarter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DepartmentHeadquarter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DepartmentHeadquarterTable extends Table
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

        $this->setTable('department_headquarter');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
        ]);
        $this->belongsTo('Headquarters', [
            'foreignKey' => 'headquarters_id',
        ]);
        $this->hasMany('People', [
            'foreignKey' => 'department_headquarter_id',
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
        $rules->add($rules->existsIn('department_id', 'Departments'), ['errorField' => 'department_id']);
        $rules->add($rules->existsIn('headquarters_id', 'Headquarters'), ['errorField' => 'headquarters_id']);

        return $rules;
    }
}
