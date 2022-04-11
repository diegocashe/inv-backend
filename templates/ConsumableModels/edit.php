<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConsumableModel $consumableModel
 * @var string[]|\Cake\Collection\CollectionInterface $models
 * @var string[]|\Cake\Collection\CollectionInterface $consumableColors
 * @var string[]|\Cake\Collection\CollectionInterface $consumableTypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $consumableModel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $consumableModel->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Consumable Models'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="consumableModels form content">
            <?= $this->Form->create($consumableModel) ?>
            <fieldset>
                <legend><?= __('Edit Consumable Model') ?></legend>
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
