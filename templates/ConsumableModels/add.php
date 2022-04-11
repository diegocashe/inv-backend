<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConsumableModel $consumableModel
 * @var \Cake\Collection\CollectionInterface|string[] $models
 * @var \Cake\Collection\CollectionInterface|string[] $consumableColors
 * @var \Cake\Collection\CollectionInterface|string[] $consumableTypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Consumable Models'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="consumableModels form content">
            <?= $this->Form->create($consumableModel) ?>
            <fieldset>
                <legend><?= __('Add Consumable Model') ?></legend>
                <?php
                    echo $this->Form->control('model_id', ['options' => $models]);
                    echo $this->Form->control('code');
                    echo $this->Form->control('consumable_color_id', ['options' => $consumableColors]);
                    echo $this->Form->control('consumable_type_id', ['options' => $consumableTypes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
