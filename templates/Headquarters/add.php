<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Headquarters $headquarters
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Headquarters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="headquarters form content">
            <?= $this->Form->create($headquarters) ?>
            <fieldset>
                <legend><?= __('Add Headquarters') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('acronym');
                    echo $this->Form->control('direction');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
