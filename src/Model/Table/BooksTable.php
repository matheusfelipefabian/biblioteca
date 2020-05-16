<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Books Model
 *
 * @property \App\Model\Table\LoansTable&\Cake\ORM\Association\HasMany $Loans
 * @property \App\Model\Table\AuthorsTable&\Cake\ORM\Association\BelongsToMany $Authors
 * @property \App\Model\Table\GendersTable&\Cake\ORM\Association\BelongsToMany $Genders
 *
 * @method \App\Model\Entity\Book newEmptyEntity()
 * @method \App\Model\Entity\Book newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Book[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book get($primaryKey, $options = [])
 * @method \App\Model\Entity\Book findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Book[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BooksTable extends Table
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


        $this->setTable('books');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');


        $this->addBehavior('Search.Search');


        $this->hasMany('Loans', [
            'foreignKey' => 'book_id',
        ]);
        $this->belongsToMany('Authors', [
            'foreignKey' => 'book_id',
            'targetForeignKey' => 'author_id',
            'joinTable' => 'books_authors',
        ]);
        $this->belongsToMany('Genders', [
            'foreignKey' => 'book_id',
            'targetForeignKey' => 'gender_id',
            'joinTable' => 'books_genders',
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
                'fields' => [
                    'title'
                ],
                'comparison' => 'ILIKE'
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
            ->scalar('title')
            ->maxLength('title', 50)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        return $validator;
    }
}
