<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BooksGenders Controller
 *
 * @property \App\Model\Table\BooksGendersTable $BooksGenders
 * @method \App\Model\Entity\BooksGender[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksGendersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Books', 'Genders'],
        ];
        $booksGenders = $this->paginate($this->BooksGenders);

        $this->set(compact('booksGenders'));
    }

    /**
     * View method
     *
     * @param string|null $id Books Gender id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booksGender = $this->BooksGenders->get($id, [
            'contain' => ['Books', 'Genders'],
        ]);

        $this->set('booksGender', $booksGender);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $booksGender = $this->BooksGenders->newEmptyEntity();
        if ($this->request->is('post')) {
            $booksGender = $this->BooksGenders->patchEntity($booksGender, $this->request->getData());
            if ($this->BooksGenders->save($booksGender)) {
                $this->Flash->success(__('The books gender has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The books gender could not be saved. Please, try again.'));
        }
        $books = $this->BooksGenders->Books->find('list', ['limit' => 200]);
        $genders = $this->BooksGenders->Genders->find('list', ['limit' => 200]);
        $this->set(compact('booksGender', 'books', 'genders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Books Gender id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booksGender = $this->BooksGenders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booksGender = $this->BooksGenders->patchEntity($booksGender, $this->request->getData());
            if ($this->BooksGenders->save($booksGender)) {
                $this->Flash->success(__('The books gender has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The books gender could not be saved. Please, try again.'));
        }
        $books = $this->BooksGenders->Books->find('list', ['limit' => 200]);
        $genders = $this->BooksGenders->Genders->find('list', ['limit' => 200]);
        $this->set(compact('booksGender', 'books', 'genders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Books Gender id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booksGender = $this->BooksGenders->get($id);
        if ($this->BooksGenders->delete($booksGender)) {
            $this->Flash->success(__('The books gender has been deleted.'));
        } else {
            $this->Flash->error(__('The books gender could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
