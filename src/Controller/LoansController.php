<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Loans Controller
 *
 * @property \App\Model\Table\LoansTable $Loans
 * @method \App\Model\Entity\Loan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoansController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Books'],
        ];
        $loans = $this->paginate($this->Loans);

        $this->set(compact('loans'));
    }

    /**
     * View method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => ['Customers', 'Books'],
        ]);

        $this->set('loan', $loan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        
     
        $loan = $this->Loans->newEmptyEntity();
        if ($this->request->is('post')) {
            $loan = $this->Loans->patchEntity($loan, $this->request->getData());
            $loans = $this->Loans->find('all', [
                'conditions' => [
                    'customer_id' => $loan->customer_id,
                    'active' => true
                ]
            ]);
            $quantity = sizeof($loans->toArray());
            if($quantity<5){
                if ($this->Loans->save($loan)) {
                    $this->Flash->success(__('The loan has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
            }else{
                $this->Flash->error(__('Esta pessoa já possui 5 empréstimos ativos em seu nome'));
            }
            
        }
        $customers = $this->Loans->Customers->find('list', ['limit' => 200]);
        $books = $this->Loans->Books->find('list', ['limit' => 200]);
        $this->set(compact('loan', 'customers', 'books'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loan = $this->Loans->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loan = $this->Loans->patchEntity($loan, $this->request->getData());
            if ($this->Loans->save($loan)) {
                $this->Flash->success(__('The loan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loan could not be saved. Please, try again.'));
        }
        $customers = $this->Loans->Customers->find('list', ['limit' => 200]);
        $books = $this->Loans->Books->find('list', ['limit' => 200]);
        $this->set(compact('loan', 'customers', 'books'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Loan id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loan = $this->Loans->get($id);
        if ($this->Loans->delete($loan)) {
            $this->Flash->success(__('The loan has been deleted.'));
        } else {
            $this->Flash->error(__('The loan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
