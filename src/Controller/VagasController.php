<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vagas Controller
 *
 * @property \App\Model\Table\VagasTable $Vagas
 *
 * @method \App\Model\Entity\Vaga[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VagasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $vagas = $this->paginate($this->Vagas);

        $this->set(compact('vagas'));
    }

    /**
     * View method
     *
     * @param string|null $id Vaga id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vaga = $this->Vagas->get($id, [
            'contain' => ['Funcionarios']
        ]);

        $this->set('vaga', $vaga);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        date_default_timezone_set('America/Sao_Paulo');

        $vaga = $this->Vagas->newEntity();
        $request = $this->request->getData();
        $request["data_criacao"]["year"] = date("Y");
        $request["data_criacao"]["month"] = date("m");
        $request["data_criacao"]["day"] = date("d");
        $request["data_criacao"]["hour"] = date("H");
        $request["data_criacao"]["minute"] = date("i");
        $request["data_criacao"]["second"] = date("s");

        if ($this->request->is('post')) {
            $vaga = $this->Vagas->patchEntity($vaga, $request);
            if ($this->Vagas->save($vaga)) {
                $this->Flash->success(__('Vaga salva com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocorreu um erro, por favor, tente mais tarde.'));
        }
        $funcionarios = $this->Vagas->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('vaga', 'funcionarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vaga id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vaga = $this->Vagas->get($id, [
            'contain' => ['Funcionarios']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vaga = $this->Vagas->patchEntity($vaga, $this->request->getData());
            if ($this->Vagas->save($vaga)) {
                $this->Flash->success(__('The vaga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vaga could not be saved. Please, try again.'));
        }
        $funcionarios = $this->Vagas->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('vaga', 'funcionarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vaga id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vaga = $this->Vagas->get($id);
        if ($this->Vagas->delete($vaga)) {
            $this->Flash->success(__('The vaga has been deleted.'));
        } else {
            $this->Flash->error(__('The vaga could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
