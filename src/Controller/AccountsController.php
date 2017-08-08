<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accounts Controller
 *
 * @property \App\Model\Table\AccountsTable $Accounts
 *
 * @method \App\Model\Entity\Account[] paginate($object = null, array $settings = [])
 */
class AccountsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $accounts = $this->paginate($this->Accounts);

        $forAdmin= false;

     // admin users should be able to delete
    if ($this->request->session()->read('Auth.User.role') == 'admin') {
        $forAdmin = true;
    }

    $forBoth = false;

     // admin users should be able to delete
    if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'cashier') {

        $forBoth = true;
    }


    $forCashier = false;

    // admin users should be able to delete
    if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'cashier') {

       $forCashier = true;

    }

    // if I am the super-admin, I should not be able to delete myself
  //if ($user['User']['account_type'] == 'admin' && $iAmSuperAdmin === true && $myID == $user['User']['ID']) {
    //    $canDelete = false;
    //}

        $this->set(compact('accounts','forAdmin','forBoth','forCashier'));
        $this->set('_serialize', ['accounts']);
    }

    /**
     * View method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $account = $this->Accounts->get($id, [
            'contain' => ['Users', 'Fees']
        ]);

           $forAdmin = false;
        // admin users should be able to delete
       if ($this->request->session()->read('Auth.User.role') == 'admin') {
           $forAdmin = true;
       }

       $forBoth = false;

        // admin users should be able to delete
       if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'cashier') {

           $forBoth = true;
       }


       $forCashier = false;

       // admin users should be able to delete
       if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'cashier') {

          $forCashier = true;

       }

       $this->set(compact('forBoth','forAdmin','forCashier'));

        $this->set('account', $account);
        $this->set('_serialize', ['account']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
      $account = $this->Accounts->newEntity();
      if ($this->request->is('post')) {
          $account = $this->Accounts->patchEntity($account, $this->request->getData());
          if ($this->Accounts->save($account)) {
              $this->Flash->success(__('The account has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The account could not be saved. Please, try again.'));
      }
      $this->Accounts->Users->displayField('username');
      $users = $this->Accounts->Users->find('list', ['limit' => 200]);

      $forAdmin = false;
   // admin users should be able to delete
  if ($this->request->session()->read('Auth.User.role') == 'admin') {
      $forAdmin = true;
  }

  $forBoth = false;

   // admin users should be able to delete
  if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'cashier') {

      $forBoth = true;
  }


  $forCashier = false;

  // admin users should be able to delete
  if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'cashier') {

     $forCashier = true;

  }

  $this->set(compact('forBoth','forAdmin','forCashier'));

      $this->Accounts->Fees->displayField('fee_name');
      $fees = $this->Accounts->Fees->find('list', ['limit' => 200]);
      $this->set(compact('account', 'users', 'fees'));
      $this->set('_serialize', ['account']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $account = $this->Accounts->get($id, [
            'contain' => ['Fees']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        $account = $this->Accounts->get($id, [
            'contain' => ['Users', 'Fees']
        ]);

           $forAdmin = false;
        // admin users should be able to delete
       if ($this->request->session()->read('Auth.User.role') == 'admin') {
           $forAdmin = true;
       }

       $forBoth = false;

        // admin users should be able to delete
       if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'cashier') {

           $forBoth = true;
       }


       $forCashier = false;

       // admin users should be able to delete
       if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'cashier') {

          $forCashier = true;

       }

        $this->set(compact('forBoth','forAdmin','forCashier'));

        $this->Accounts->Users->displayField('username');
        $users = $this->Accounts->Users->find('list', ['limit' => 200]);
        $this->Accounts->Fees->displayField('fee_name');
        $fees = $this->Accounts->Fees->find('list', ['limit' => 200]);

        $this->set(compact('account', 'users', 'fees'));
        $this->set('_serialize', ['account']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $account = $this->Accounts->get($id);
        if ($this->Accounts->delete($account)) {
            $this->Flash->success(__('The account has been deleted.'));
        } else {
            $this->Flash->error(__('The account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
