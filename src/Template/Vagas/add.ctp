<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vaga $vaga
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Lista de Vagas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de Funcionários'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Funcionário'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vagas form large-9 medium-8 columns content">
    <?= $this->Form->create($vaga) ?>
    <fieldset>
        <legend><?= __('Adicionar Vaga') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->control('cliente');
            echo $this->Form->control('prazo_fechamento', [
                'minYear' => date('Y'),
                'maxYear' => date('Y') + 10,
                'monthNames' => [
                    '01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04' => 'Abril',
                    '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto',
                    '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro'
                ],
                'empty' => true]);
            echo $this->Form->control('funcionarios._ids', ['options' => $funcionarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
