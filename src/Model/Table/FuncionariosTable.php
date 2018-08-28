<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class FuncionariosTable extends Table {

    public function initialize(array $config) {

        parent::initialize($config);

        $this->setTable('funcionarios');
        $this->setDisplayField('funcionario_id');
        $this->setPrimaryKey('funcionario_id');

        $this->belongsToMany('Vagas', [
            'foreignKey' => 'funcionario_id',
            'targetForeignKey' => 'vaga_id',
            'joinTable' => 'funcionarios_vagas'
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator
            ->integer('funcionario_id')
            ->allowEmpty('funcionario_id', 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->date('nascimento')
            ->requirePresence('nascimento', 'create')
            ->notEmpty('nascimento');

        $validator
            ->integer('cpf')
            ->requirePresence('cpf', 'create')
            ->notEmpty('cpf');

        $validator
            ->dateTime('data_criacao')
            ->allowEmpty('data_criacao');

        return $validator;
    }
}
