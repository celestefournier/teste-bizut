<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vaga[]|\Cake\Collection\CollectionInterface $vagas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Nova Vaga'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Funcionários'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Funcionário'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vagas index large-9 medium-8 columns content">
    <h3><?= __('Vagas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('vaga_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prazo_fechamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_criacao') ?></th>
                <th scope="col" class="actions"><?= __('Menu') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vagas as $vaga): ?>
            <tr>
                <td><?= $this->Number->format($vaga->vaga_id) ?></td>
                <td><?= h($vaga->titulo) ?></td>
                <td><?= h($vaga->cliente) ?></td>
                <td><?= h($vaga->prazo_fechamento) ?></td>
                <td><?= h($vaga->data_criacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $vaga->vaga_id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $vaga->vaga_id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $vaga->vaga_id], ['confirm' => __('Are you sure you want to delete # {0}?', $vaga->vaga_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, exibindo {{current}} de {{count}}.')]) ?></p>
    </div>
</div>
