<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Observation $observation
 * @var \Cake\Collection\CollectionInterface|string[] $allocations
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Observations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="observations form content">
            <?= $this->Form->create($observation) ?>
            <fieldset>
                <legend><?= __('Add Observation') ?></legend>
                <?php
                    echo $this->Form->control('description');
                    echo $this->Form->control('allocation_id', ['options' => $allocations]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
