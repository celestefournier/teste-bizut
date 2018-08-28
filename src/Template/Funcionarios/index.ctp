<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario[]|\Cake\Collection\CollectionInterface $funcionarios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Novo Funcionário'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Vagas'), ['controller' => 'Vagas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nova Vaga'), ['controller' => 'Vagas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionarios index large-9 medium-8 columns content">
    <h3><?= __('Funcionários') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('funcionario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nascimento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_criacao') ?></th>
                <th scope="col" class="actions"><?= __('Menu') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $funcionario): ?>
            <tr>
                <td><?= $this->Number->format($funcionario->funcionario_id) ?></td>
                <td><?= h($funcionario->nome) ?></td>
                <td><?= h($funcionario->nascimento) ?></td>
                <td><?= $this->Number->format($funcionario->cpf) ?></td>
                <td><?= h($funcionario->data_criacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $funcionario->funcionario_id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $funcionario->funcionario_id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $funcionario->funcionario_id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->funcionario_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próximo') . ' >') ?>
            <?= $this->Paginator->last(__('Último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, exibindo {{current}} de {{count}}.')]) ?></p>
    </div>
</div>
