<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operator $operator
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $operator->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operator->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Operators'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="operators form content">
            <?= $this->Form->create($operator) ?>
            <fieldset>
                <legend><?= __('Edit Operator') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('suffix');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
