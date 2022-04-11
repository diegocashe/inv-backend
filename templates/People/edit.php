<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 * @var string[]|\Cake\Collection\CollectionInterface $departments
 * @var string[]|\Cake\Collection\CollectionInterface $positions
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $person->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="people form content">
            <?= $this->Form->create($person) ?>
            <fieldset>
                <legend><?= __('Edit Person') ?></legend>
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
