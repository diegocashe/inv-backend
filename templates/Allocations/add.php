<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Allocation $allocation
 * @var \Cake\Collection\CollectionInterface|string[] $people
 * @var \Cake\Collection\CollectionInterface|string[] $items
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Allocations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="allocations form content">
            <?= $this->Form->create($allocation) ?>
            <fieldset>
                <legend><?= __('Add Allocation') ?></legend>
                <?php
                    echo $this->Form->control('assigment_date');
                    echo $this->Form->control('dispatch_date');
                    echo $this->Form->control('ubication');
                    echo $this->Form->control('active');
                    echo $this->Form->control('assigned_people_id', ['options' => $people]);
                    echo $this->Form->control('item_id', ['options' => $items]);
                    echo $this->Form->control('assignor_user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
