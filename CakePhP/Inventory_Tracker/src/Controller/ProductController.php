<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Product Controller
 *
 * @property \App\Model\Table\ProductTable $Product
 */
class ProductController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @return string $name
     * @return string $filter 
     */
    public function index()
    {   
        $name="";
        $filter="";

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $name=$data['name_search'];
            $filter=$data['filter'];

            if($data['delete_flagged'] == 1){
                $this->Product->deleteAll(['Product.flag LIKE' => 1]);
            }
        }
        $query = $this->Product->find('all', conditions: ['Product.name LIKE' => '%'.$name.'%' ,
            'Product.status LIKE' => '%'.$filter.'%']);
        
        $product = $this->paginate($query);

        $this->set(compact('product'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Product->get($id, contain: []);
        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Product->newEmptyEntity();
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();

            $data['flag'] = 0; 
            $data['last_updated'] = date("d-m-Y H:i:s ") . date_default_timezone_get(); 

            if($data['quantity'] > 10){
                $data['status'] = 'in stock'; 
            }
            if($data['quantity'] > 0 && $data['quantity'] <= 10){
                $data['status'] = 'low stock'; 
            }
            if($data['quantity'] == 0){
                $data['status'] = 'out stock'; 
            }
            
            $product = $this->Product->patchEntity($product, $data);
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Product->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            $data['last_updated'] = date("d-m-Y H:i:s ") . date_default_timezone_get(); 

            if($data['quantity'] > 10){
                $data['status'] = 'in stock'; 
            }
            if($data['quantity'] > 0 && $data['quantity'] <= 10){
                $data['status'] = 'low stock'; 
            }
            if($data['quantity'] == 0){
                $data['status'] = 'out stock'; 
            }
            
            $product = $this->Product->patchEntity($product, $data);
            
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Product->get($id, contain: []);
        $data['flag'] = 1;
        $data['last_updated'] = date("d-m-Y H:i:s ") . date_default_timezone_get(); 
        $product = $this->Product->patchEntity($product, $data);
        if ($this->Product->save($product)) {
            $this->Flash->success(__('The product has been flagged for deletetion.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
