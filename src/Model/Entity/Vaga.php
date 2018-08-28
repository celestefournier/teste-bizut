<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vaga Entity
 *
 * @property int $vaga_id
 * @property string $titulo
 * @property string $cliente
 * @property \Cake\I18n\FrozenTime $prazo_fechamento
 * @property \Cake\I18n\FrozenTime $data_criacao
 *
 * @property \App\Model\Entity\Funcionario[] $funcionarios
 */
class Vaga extends Entity
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
        'titulo' => true,
        'cliente' => true,
        'prazo_fechamento' => true,
        'data_criacao' => true,
        'funcionarios' => true
    ];
}
