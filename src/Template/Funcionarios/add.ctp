<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Lista de Funcionários'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de Vagas'), ['controller' => 'Vagas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nova Vaga'), ['controller' => 'Vagas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionarios form large-9 medium-8 columns content">
    <?= $this->Form->create($funcionario) ?>
    <fieldset>
        <legend><?= __('Adicionar Funcionario') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('nascimento', [
                'minYear' => date('Y') - 100,
                'maxYear' => date('Y'),
                'monthNames' => [
                    '01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04' => 'Abril',
                    '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto',
                    '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro'
                ],
                'empty' => true]);
            echo $this->Form->control('cpf');
            echo $this->Form->control('vagas._ids', ['options' => $vagas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
