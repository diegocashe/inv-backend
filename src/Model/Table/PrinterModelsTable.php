<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrinterModels Model
 *
 * @property \App\Model\Table\ModelsTable&\Cake\ORM\Association\BelongsTo $Models
 * @property \App\Model\Table\PrinterTypesTable&\Cake\ORM\Association\BelongsTo $PrinterTypes
 * @property \App\Model\Table\ConsumableModelsTable&\Cake\ORM\Association\BelongsTo $ConsumableModels
 * @property \App\Model\Table\PrintTypesTable&\Cake\ORM\Association\BelongsTo $PrintTypes
 *
 * @method \App\Model\Entity\PrinterModel newEmptyEntity()
 * @method \App\Model\Entity\PrinterModel newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PrinterModel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrinterModel get($primaryKey, $options = [])
 * @method \App\Model\Entity\PrinterModel findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PrinterModel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PrinterModel[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrinterModel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrinterModel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PrinterModel[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrinterModel[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrinterModel[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PrinterModel[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrinterModelsTable extends Table
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

        $this->setTable('printer_models');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Models', [
            'foreignKey' => 'model_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PrinterTypes', [
            'foreignKey' => 'printer_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ConsumableModels', [
            'foreignKey' => 'consumable_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PrintTypes', [
            'foreignKey' => 'print_types_id',
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
        $rules->add($rules->existsIn('printer_type_id', 'PrinterTypes'), ['errorField' => 'printer_type_id']);
        $rules->add($rules->existsIn('consumable_id', 'ConsumableModels'), ['errorField' => 'consumable_id']);
        $rules->add($rules->existsIn('print_types_id', 'PrintTypes'), ['errorField' => 'print_types_id']);

        return $rules;
    }
}
