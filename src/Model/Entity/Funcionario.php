<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Funcionario Entity
 *
 * @property int $funcionario_id
 * @property string $nome
 * @property \Cake\I18n\FrozenTime $nascimento
 * @property int $cpf
 * @property \Cake\I18n\FrozenTime $data_criacao
 *
 * @property \App\Model\Entity\Vaga[] $vagas
 */
class Funcionario extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'nascimento' => true,
        'cpf' => true,
        'data_criacao' => true,
        'vagas' => true
    ];
}
