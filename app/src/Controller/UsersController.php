<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize(){
        $this->loadComponent('Flash');
        $this->loadComponent('Auth',[
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' =>'Users',
                'action' => 'login'
            ]
        ]);
    }

    public function beforeFilter(Event $event)
    {
       $this->Auth->allow(['index']);

    }



    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->session()->read('Auth.User')) {
            $this->set('auth', true);
            $this->set('role',$this->Auth->user('role_id'));
        } else {
            $this->set('auth', false);
        }
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
            'contain' => ['Roles', 'Posts']
        ]);
        $this->set('user', $user);
    }

    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'users', 'action' => 'index']);
                
            }
            $this->Flash->error(__('These credentials do not match our records'));
        }
    }

    public function logout(){
        $this->Auth->logout();
        return $this->redirect(['controller' => 'users', 'action' => 'index']);
    }

}