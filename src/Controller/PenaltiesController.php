<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Penalty;

/**
 * Penalties Controller
 *
 * @property \App\Model\Table\PenaltiesTable $Penalties
 * @method \App\Model\Entity\Penalty[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PenaltiesController extends AppController
{


    public function initialize(): void
    {
        parent::initialize();
    
        $this->loadComponent('Search.Search', [
            // This is default config. You can modify "actions" as needed to make
            // the Search component work only for specified methods.
            'actions' => ['index', 'lookup'],
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        
        $now = \Cake\I18n\Time::now();
        $loans = $this->Penalties->Loans->find('all',[
            'fields' => [
                'Loans.id',
                'Loans.customer_id',
                'Loans.date',
                'Loans.prazo',
                'Loans.book_id',
                'Loans.active'
            ]
        ])->toArray();
        $atrasos = [];
        $i=0;
        $entregues = [];
        $j=0;

        foreach ($loans as $loan){
            if($loan->prazo < $now and $loan->active){
                $atrasos[$i] = $loan;
                $i++;
            }else if(!$loan->active){
                $entregues[$j]=$loan->id;
            }
        }
        $penalties = $this->paginate($this->Penalties);

        $loanIds = [];
        $multas = [];
            $i=0;
            foreach ($penalties as $penalty){
                $multas[$i] = $penalty;
                $loanIds[$i] = $penalty->loan_id;
                $i++;
            }
        
        foreach($atrasos as $atraso){
            if(empty($loanIds)==false){
                if(in_array($atraso->id, $loanIds)){
                    $key = array_search($atraso->id, $loanIds);
                    if($multas[$key]->payed==false){

                        $prazo = $atraso->prazo;
                        $datediff = date_diff($prazo, $now)->days;

                        $value = $datediff*0.25;
                        $multas[$key]->value = $value;
                        $id = $multas[$key]->id;
                        $penalty = $this->Penalties->get($id);
                        $penalty->value = $value;
                        $this->Penalties->save($penalty);
                    }
                }else{
                    $prazo = $atraso->prazo;
                    $datediff = date_diff($prazo, $now)->days;
                    $value = $datediff*0.25;
                    $customer_id = $atraso->customer_id;
                    $loan_id = $atraso->id;

                    $array = [];
                    $penalty = new Penalty;
                    $penalty->value = $value;

                    $penalty->value = $value;
                    $penalty->customer_id = $customer_id;
                    $penalty->loan_id = $loan_id;
            
                    if ($this->Penalties->save($penalty)) {
                        $this->Flash->success(__('Success'));
                    }
                }

            }else{
                $prazo = $atraso->prazo;
                $datediff = date_diff($prazo, $now)->days;
                $value = $datediff*0.25;
                $customer_id = $atraso->customer_id;
                $loan_id = $atraso->id;

                $array = [];
                $penalty = new Penalty;
                $penalty->value = $value;

                $penalty->value = $value;
                $penalty->customer_id = $customer_id;
                $penalty->loan_id = $loan_id;
        
                if ($this->Penalties->save($penalty)) {
                    $this->Flash->success(__('Success'));
                }
            }

        }

        foreach($penalties as $penalty){
            if(in_array($penalty->loan_id, $entregues)){
                $id = $penalty->id;
                $p = $this->Penalties->get($id);
                $p->payed = true;
                $this->Penalties->save($p);
            }
        }

        $this->paginate = [
            'order' => [
                'Penalties.id' => 'DESC'
            ],
            'limit' => 25
          ];

          
        $query = $this->Penalties->find('search', ['search' => $this->request->getQueryParams()]);
        $this->set('penalties', $this->paginate($query));
    }


    /**
     * active method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function active()
    {
        
        $now = \Cake\I18n\Time::now();
        $now->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
        $now = $now->i18nFormat('yyyy-MM-dd');

        //debug($now); die();
        $loans = $this->Penalties->Loans->find('all',[
            'fields' => [
                'Loans.id',
                'Loans.customer_id',
                'Loans.date',
                'Loans.prazo',
                'Loans.book_id',
            ]
        ])->toArray();

        $atrasos = [];
        $i=0;
        $entregues = [];
        $j=0;
        foreach ($loans as $loan){
            if($loan->prazo < $now and $loan->active){
                $atrasos[$i] = $loan;
                $i++;
            }else if(!$loan->active){
                $entregues[$j]=$loan->id;
            }

        }
        $penalties = $this->paginate($this->Penalties);
        //debug($penalties);
        $loanIds = [];
        $multas = [];
            $i=0;
            foreach ($penalties as $penalty){
                //debug($penalty);
                $multas[$i] = $penalty;
                $loanIds[$i] = $penalty->loan_id;
                $i++;
            }
            //die();
             //debug($loanIds); die();
        
        foreach($atrasos as $atraso){
            if(empty($loanIds)==false){
                if(in_array($atraso->id, $loanIds)){
                    $key = array_search($atraso->id, $loanIds);
                    if($multas[$key]->payed==false){
                        //debug($multas[$key]); die();
                       // debug($now); die();
                        
                        //debug($now); die();
                        $now = date_create($now);
                        
                        $prazo = $atraso->prazo->i18nFormat('yyyy-MM-dd');
                        
                        $prazo = date_create($prazo);
                        $datediff = date_diff($prazo, $now);
                        $datediff = $datediff->days;
                        $value = $datediff*0.25;
                        $multas[$key]->value = $value;
                        $id = $multas[$key]->id;
                        $penalty = $this->Penalties->get($id);
                        $penalty->value = $value;
                        //debug($penalty); die();
                        $this->Penalties->save($penalty);
                    }
                }else{
                    //debug($atraso); die();
                    //debug("else"); die();
                    $now = $now->i18nFormat('yyyy-MM-dd');
                    // debug($now);
                    $now = date_create($now);
                    $prazo = $atraso->prazo->i18nFormat('yyyy-MM-dd');
                    $prazo = date_create($prazo);
                    // debug($atraso->prazo);
                    $datediff = date_diff($prazo, $now);
                    
                    $datediff = $datediff->days;
                    // debug($datediff);
                    $value = $datediff*0.25;
                    $customer_id = $atraso->customer_id;
                    $loan_id = $atraso->id;

                    $array = [];
                    $penalty = new Penalty;
                    $penalty->value = $value;

                    $penalty->value = $value;
                    $penalty->customer_id = $customer_id;
                    $penalty->loan_id = $loan_id;
            
                    if ($this->Penalties->save($penalty)) {
                        $this->Flash->success(__('Success'));
                    }
                }
//                debug($penalties); die();

            }else{
                    $now = $now->i18nFormat('yyyy-MM-dd');
                    // debug($now);
                    $now = date_create($now);
                    $prazo = $atraso->prazo->i18nFormat('yyyy-MM-dd');
                    $prazo = date_create($prazo);
                    // debug($atraso->prazo);
                    $datediff = date_diff($prazo, $now);
                    
                    $datediff = $datediff->days;
                    // debug($datediff);
                    $value = $datediff*0.25;
                    $customer_id = $atraso->customer_id;
                    $loan_id = $atraso->id;

                    // debug("value ".$value);
                    // debug("customer id ".$customer_id);
                    // debug("loan ".$loan_id);
                    $array = [];
                    //$penalty = $this->Penalties->newEmptyEntity();
                    $penalty = new Penalty;
                    debug($penalty);
                    $penalty->value = $value;
                    debug($penalty->value);
                    //$penalty = $this->Penalties->patchEntity($penalty, $this->request->getData());
                    $penalty->value = $value;
                    $penalty->customer_id = $customer_id;
                    $penalty->loan_id = $loan_id;
            
                    if ($this->Penalties->save($penalty)) {
                        $this->Flash->success(__('Success'));
                    }


            }

        }

        foreach($penalties as $penalty){
            if(in_array($penalty->loan_id, $entregues)){
                $id = $penalty->id;
                $p = $this->Penalties->get($id);
                $p->payed = true;
                //debug($penalty); die();
                $this->Penalties->save($p);
            }
        }

    
        //$penalties = $this->paginate($this->Penalties);
        //debug($penalties); die();
        $this->paginate = [
            'order' => [
                'Penalties.id' => 'DESC'
            ],
            'conditions' => [
                'Penalties.payed' => false
            ],
            'limit' => 25
          ];

          
        $query = $this->Penalties->find('search', ['search' => $this->request->getQueryParams()]);
        //debug($query); die();
        $this->set('penalties', $this->paginate($query));
        //$this->set(compact('penalties'));
    }




    /**
     * View method
     *
     * @param string|null $id Penalty id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $penalty = $this->Penalties->get($id, [
            'contain' => [],
        ]);

        $this->set('penalty', $penalty);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $penalty = $this->Penalties->newEmptyEntity();
        if ($this->request->is('post')) {
            $penalty = $this->Penalties->patchEntity($penalty, $this->request->getData());
            if ($this->Penalties->save($penalty)) {
                $this->Flash->success(__('The penalty has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The penalty could not be saved. Please, try again.'));
        }
        $this->set(compact('penalty'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Penalty id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $penalty = $this->Penalties->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $penalty = $this->Penalties->patchEntity($penalty, $this->request->getData());
            if ($this->Penalties->save($penalty)) {
                $this->Flash->success(__('The penalty has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The penalty could not be saved. Please, try again.'));
        }
        $this->set(compact('penalty'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Penalty id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $penalty = $this->Penalties->get($id);
        if ($this->Penalties->delete($penalty)) {
            $this->Flash->success(__('The penalty has been deleted.'));
        } else {
            $this->Flash->error(__('The penalty could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
