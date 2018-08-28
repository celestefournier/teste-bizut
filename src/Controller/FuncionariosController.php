<?php
namespace App\Controller;

class FuncionariosController extends AppController {
    
    public function index() {
        $funcionarios = $this->paginate($this->Funcionarios);
        $this->set(compact('funcionarios'));
    }
    
    public function view($id = null) {
        $funcionario = $this->Funcionarios->get($id, [
            'contain' => ['Vagas']
        ]);

        $this->set('funcionario', $funcionario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        date_default_timezone_set('America/Sao_Paulo');

        $funcionario = $this->Funcionarios->newEntity();
        $request = $this->request->getData();
        $request["data_criacao"]["year"] = date("Y");
        $request["data_criacao"]["month"] = date("m");
        $request["data_criacao"]["day"] = date("d");
        $request["data_criacao"]["hour"] = date("H");
        $request["data_criacao"]["minute"] = date("i");
        $request["data_criacao"]["second"] = date("s");

        if ($this->request->is('post')) {
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $request);
            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('Funcionário salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Ocorreu um erro, por favor, tente mais tarde."));
        }
        $vagas = $this->Funcionarios->Vagas->find('list', ['limit' => 200]);
        $this->set(compact('funcionario', 'vagas'));
    }
    
    public function edit($id = null)
    {
        $funcionario = $this->Funcionarios->get($id, [
            'contain' => ['Vagas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $this->request->getData());
            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('The funcionario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The funcionario could not be saved. Please, try again.'));
        }
        $vagas = $this->Funcionarios->Vagas->find('list', ['limit' => 200]);
        $this->set(compact('funcionario', 'vagas'));
    }
    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $funcionario = $this->Funcionarios->get($id);
        if ($this->Funcionarios->delete($funcionario)) {
            $this->Flash->success(__('The funcionario has been deleted.'));
        } else {
            $this->Flash->error(__('The funcionario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
