<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrintersConsumablesAssigment $printersConsumablesAssigment
 * @var \Cake\Collection\CollectionInterface|string[] $items
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Printers Consumables Assigment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="printersConsumablesAssigment form content">
            <?= $this->Form->create($printersConsumablesAssigment) ?>
            <fieldset>
                <legend><?= __('Add Printers Consumables Assigment') ?></legend>
                <?php
                    echo $this->Form->control('item_id');
                    echo $this->Form->control('consumable_assigned_id', ['options' => $items]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
