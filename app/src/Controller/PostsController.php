<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $query = TableRegistry::get('Posts')->find()
        ->where(['is_posted' => 1])
        ->order(['created' => 'DESC']);

        $posts = $this->paginate($query);
        $this->set([
            'posts' => $posts,
            '_serialize' => ['posts']
        ]);
    }


    public function drafts($id = null)
    {
        $query = TableRegistry::get('Posts')->find()
        ->where(['is_posted' => 0]);
        $posts = $this->paginate($query);

        $this->set([
            'posts' => $posts,
            '_serialize' => ['posts']
        ]);  
    }




    public function view($id)
    {
        $post = $this->Posts->get($id);
        $this->set([
            'post' => $post,
            '_serialize' => ['post']
        ]);
    }

    public function add()
    {
        $post = $this->Posts->newEntity(['is_posted' => 0]);
        if($this->Auth->user('role_id') == 1) {
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $post = $this->Posts->patchEntity($post, $data);
                if ($this->Posts->save($post)) {
                    $this->Flash->success(__('The post has been saved.'));
                    return $this->redirect(['action' => 'drafts']);
                }
                else {
                    $this->Flash->error(__('The post has not been saved.'));
                }
            }
        }
        else{
            $this->Flash->error(__('You are not authoried to complete this action'));
        }
        $this->set(compact('post'));
        $this->set('_serialize', ['post']);
    }

     /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($user)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
   

   public function attach($id = null)
   {
        if($this->Auth->user('role_id') == 2) {
            $postsTable = TableRegistry::get('Posts');
            $post = $postsTable->get($id);
            $post->is_posted = 1;
            
            if($postsTable->save($post)) {
                $this->Flash->success(__('The post is now public.'));
                return $this->redirect(['action' => 'drafts']);
            }
        }    
    }
}

