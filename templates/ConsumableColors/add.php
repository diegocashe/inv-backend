<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConsumableColor $consumableColor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Consumable Colors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="consumableColors form content">
            <?= $this->Form->create($consumableColor) ?>
            <fieldset>
                <legend><?= __('Add Consumable Color') ?></legend>
                <?php
                    echo $this->Form->control('colors');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
