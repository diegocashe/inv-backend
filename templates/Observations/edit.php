<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Observation $observation
 * @var string[]|\Cake\Collection\CollectionInterface $allocations
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $observation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $observation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Observations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="observations form content">
            <?= $this->Form->create($observation) ?>
            <fieldset>
                <legend><?= __('Edit Observation') ?></legend>
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
