<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 * @var \Cake\Collection\CollectionInterface|string[] $departments
 * @var \Cake\Collection\CollectionInterface|string[] $positions
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="people form content">
            <?= $this->Form->create($person) ?>
            <fieldset>
                <legend><?= __('Add Person') ?></legend>
                <?php
                    echo $this->Form->control('first_name_1');
                    echo $this->Form->control('first_name_2');
                    echo $this->Form->control('last_name_1');
                    echo $this->Form->control('last_name_2');
                    echo $this->Form->control('email');
                    echo $this->Form->control('nacional_identify');
                    echo $this->Form->control('department_id', ['options' => $departments]);
                    echo $this->Form->control('position_id', ['options' => $positions]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
