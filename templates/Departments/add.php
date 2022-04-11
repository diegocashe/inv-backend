<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 * @var \Cake\Collection\CollectionInterface|string[] $headquarters
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Departments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="departments form content">
            <?= $this->Form->create($department) ?>
            <fieldset>
                <legend><?= __('Add Department') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('headquarters_id', ['options' => $headquarters]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
