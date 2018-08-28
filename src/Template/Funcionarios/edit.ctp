<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $funcionario->funcionario_id],
                ['confirm' => __('Você está certo que deseja excluir # {0}?', $funcionario->funcionario_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista de Funcionários'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de Vagas'), ['controller' => 'Vagas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nova Vaga'), ['controller' => 'Vagas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionarios form large-9 medium-8 columns content">
    <?= $this->Form->create($funcionario) ?>
    <fieldset>
        <legend><?= __('Editar Funcionário') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('nascimento');
            echo $this->Form->control('cpf');
            echo $this->Form->control('vagas._ids', ['options' => $vagas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
