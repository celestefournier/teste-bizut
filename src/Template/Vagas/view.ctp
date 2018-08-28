<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vaga $vaga
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Editar Vaga'), ['action' => 'edit', $vaga->vaga_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Vaga'), ['action' => 'delete', $vaga->vaga_id], ['confirm' => __('Are you sure you want to delete # {0}?', $vaga->vaga_id)]) ?> </li>
        <li><?= $this->Html->link(__('Lista de Vagas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nova Vaga'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista de Funcionários'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Funcionário'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vagas view large-9 medium-8 columns content">
    <h3><?= h($vaga->vaga_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Título') ?></th>
            <td><?= h($vaga->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= h($vaga->cliente) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($vaga->vaga_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prazo de Fechamento') ?></th>
            <td><?= h($vaga->prazo_fechamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data de Criação') ?></th>
            <td><?= h($vaga->data_criacao) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Funcionários Responsáveis') ?></h4>
        <?php if (!empty($vaga->funcionarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ID') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Nascimento') ?></th>
                <th scope="col"><?= __('CPF') ?></th>
                <th scope="col"><?= __('Data Criação') ?></th>
                <th scope="col" class="actions"><?= __('Menu') ?></th>
            </tr>
            <?php foreach ($vaga->funcionarios as $funcionarios): ?>
            <tr>
                <td><?= h($funcionarios->funcionario_id) ?></td>
                <td><?= h($funcionarios->nome) ?></td>
                <td><?= h($funcionarios->nascimento) ?></td>
                <td><?= h($funcionarios->cpf) ?></td>
                <td><?= h($funcionarios->data_criacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'Funcionarios', 'action' => 'view', $funcionarios->funcionario_id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Funcionarios', 'action' => 'edit', $funcionarios->funcionario_id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Funcionarios', 'action' => 'delete', $funcionarios->funcionario_id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionarios->funcionario_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
