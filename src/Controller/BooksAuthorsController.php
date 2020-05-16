<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BooksAuthors Controller
 *
 * @property \App\Model\Table\BooksAuthorsTable $BooksAuthors
 * @method \App\Model\Entity\BooksAuthor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksAuthorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Authors', 'Books'],
        ];
        $booksAuthors = $this->paginate($this->BooksAuthors);

        $this->set(compact('booksAuthors'));
    }

    /**
     * View method
     *
     * @param string|null $id Books Author id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booksAuthor = $this->BooksAuthors->get($id, [
            'contain' => ['Authors', 'Books'],
        ]);

        $this->set('booksAuthor', $booksAuthor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $booksAuthor = $this->BooksAuthors->newEmptyEntity();
        if ($this->request->is('post')) {
            $booksAuthor = $this->BooksAuthors->patchEntity($booksAuthor, $this->request->getData());
            if ($this->BooksAuthors->save($booksAuthor)) {
                $this->Flash->success(__('The books author has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The books author could not be saved. Please, try again.'));
        }
        $authors = $this->BooksAuthors->Authors->find('list', ['limit' => 200]);
        $books = $this->BooksAuthors->Books->find('list', ['limit' => 200]);
        $this->set(compact('booksAuthor', 'authors', 'books'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Books Author id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booksAuthor = $this->BooksAuthors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booksAuthor = $this->BooksAuthors->patchEntity($booksAuthor, $this->request->getData());
            if ($this->BooksAuthors->save($booksAuthor)) {
                $this->Flash->success(__('The books author has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The books author could not be saved. Please, try again.'));
        }
        $authors = $this->BooksAuthors->Authors->find('list', ['limit' => 200]);
        $books = $this->BooksAuthors->Books->find('list', ['limit' => 200]);
        $this->set(compact('booksAuthor', 'authors', 'books'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Books Author id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booksAuthor = $this->BooksAuthors->get($id);
        if ($this->BooksAuthors->delete($booksAuthor)) {
            $this->Flash->success(__('The books author has been deleted.'));
        } else {
            $this->Flash->error(__('The books author could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
