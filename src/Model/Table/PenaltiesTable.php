<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Penalties Model
 *
 * @method \App\Model\Entity\Penalty newEmptyEntity()
 * @method \App\Model\Entity\Penalty newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Penalty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Penalty get($primaryKey, $options = [])
 * @method \App\Model\Entity\Penalty findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Penalty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Penalty[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Penalty|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Penalty saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Penalty[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Penalty[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Penalty[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Penalty[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PenaltiesTable extends Table
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

        $this->setTable('penalties');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Search.Search');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Loans', [
            'foreignKey' => 'loan_id',
            'joinType' => 'INNER',
        ]);
    }


    /**
     * Configure how you want the search plugin to work with this table class.
     *
     * @return \Search\Manager
     */
    public function searchManager()
    {
        $search = $this->behaviors()->Search->searchManager();
        $search
            ->like('q', [
                'before' => true,
                'after' => true,
                'fieldMode' => 'OR',
                'filterEmpty' => [
                    'payed',
                    'value'
                ],
                'comparison' => 'Boolean'
            ]);

        return $search;
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
            ->numeric('value')
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        $validator
            ->boolean('payed')
            ->notEmptyString('payed');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['loan_id'], 'Loans'));

        return $rules;
    }
}
