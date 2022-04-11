<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrintType $printType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $printType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $printType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Print Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="printTypes form content">
            <?= $this->Form->create($printType) ?>
            <fieldset>
                <legend><?= __('Edit Print Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
