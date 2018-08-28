<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class VagasTable extends Table {
    
    public function initialize(array $config) {

        parent::initialize($config);

        $this->setTable('vagas');
        $this->setDisplayField('vaga_id');
        $this->setPrimaryKey('vaga_id');

        $this->belongsToMany('Funcionarios', [
            'foreignKey' => 'vaga_id',
            'targetForeignKey' => 'funcionario_id',
            'joinTable' => 'funcionarios_vagas'
        ]);
    }

    public function validationDefault(Validator $validator) {
        $validator
            ->integer('vaga_id')
            ->allowEmpty('vaga_id', 'create');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 255)
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->scalar('cliente')
            ->maxLength('cliente', 255)
            ->requirePresence('cliente', 'create')
            ->notEmpty('cliente');

        $validator
            ->date('prazo_fechamento')
            ->allowEmpty('prazo_fechamento');

        $validator
            ->dateTime('data_criacao')
            ->allowEmpty('data_criacao');

        return $validator;
    }
}
