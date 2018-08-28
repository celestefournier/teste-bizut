<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Editar Funcionário'), ['action' => 'edit', $funcionario->funcionario_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Funcionário'), ['action' => 'delete', $funcionario->funcionario_id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->funcionario_id)]) ?> </li>
        <li><?= $this->Html->link(__('Lista de Funcionarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Funcionário'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista de Vagas'), ['controller' => 'Vagas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nova Vaga'), ['controller' => 'Vagas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="funcionarios view large-9 medium-8 columns content">
    <h3><?= h($funcionario->funcionario_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($funcionario->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($funcionario->funcionario_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CPF') ?></th>
            <td><?= $this->Number->format($funcionario->cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nascimento') ?></th>
            <td><?= h($funcionario->nascimento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data de Criação') ?></th>
            <td><?= h($funcionario->data_criacao) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Vagas relacionadas') ?></h4>
        <?php if (!empty($funcionario->vagas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ID') ?></th>
                <th scope="col"><?= __('Título') ?></th>
                <th scope="col"><?= __('Cliente') ?></th>
                <th scope="col"><?= __('Prazo Fechamento') ?></th>
                <th scope="col"><?= __('Data Criacao') ?></th>
                <th scope="col" class="actions"><?= __('Menu') ?></th>
            </tr>
            <?php foreach ($funcionario->vagas as $vagas): ?>
            <tr>
                <td><?= h($vagas->vaga_id) ?></td>
                <td><?= h($vagas->titulo) ?></td>
                <td><?= h($vagas->cliente) ?></td>
                <td><?= h($vagas->prazo_fechamento) ?></td>
                <td><?= h($vagas->data_criacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'Vagas', 'action' => 'view', $vagas->vaga_id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Vagas', 'action' => 'edit', $vagas->vaga_id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Vagas', 'action' => 'delete', $vagas->vaga_id], ['confirm' => __('Are you sure you want to delete # {0}?', $vagas->vaga_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
