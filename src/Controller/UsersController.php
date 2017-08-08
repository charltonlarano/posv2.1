<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Validation\Validation;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{




  public function beforeFilter(Event $event)
  {
      parent::beforeFilter($event);
      // Allow users to register and logout.
      // You should not add the "login" action to allow list. Doing so would
      // cause problems with normal functioning of AuthComponent.
      $this->Auth->allow(['add', 'logout']);
  }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fees']
        ];
        $users = $this->paginate($this->Users);

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

        $this->set(compact('users','forAdmin','forBoth','forCashier'));
        $this->set('_serialize', ['users']);
    }

    public function login()
      {
          if ($this->request->is('post')) {

              if (Validation::email($this->request->data['username'])) {
                  $this->Auth->config('authenticate', [
                      'Form' => [
                          'fields' => ['username' => 'email']
                      ]
                  ]);
                  $this->Auth->constructAuthenticate();
                  $this->request->data['email'] = $this->request->data['username'];
                  unset($this->request->data['username']);
              }

              $user = $this->Auth->identify();

              if ($user) {
                  $this->Auth->setUser($user);
                  return $this->redirect($this->Auth->redirectUrl());
              }

              $this->Flash->error(__('Invalid username or password, try again'));
          }
      }

  public function logout()
  {
      return $this->redirect($this->Auth->logout());
  }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Fees', 'Accounts']
        ]);


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
        $this->set(compact('forBoth','forAdmin','forCashier'));
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $fees = $this->Users->Fees->find('list', ['limit' => 200]);
        $this->set(compact('user', 'fees'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->Users->Fees->displayField('fee_name');
        $fees = $this->Users->Fees->find('list', ['limit' => 200]);
        $this->set(compact('user', 'fees'));
        $this->set('_serialize', ['user']);
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
