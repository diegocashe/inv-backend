<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Model $model
 * @var \Cake\Collection\CollectionInterface|string[] $brands
 * @var \Cake\Collection\CollectionInterface|string[] $itemTypes
 * @var \Cake\Collection\CollectionInterface|string[] $telephony
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Models'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="models form content">
            <?= $this->Form->create($model) ?>
            <fieldset>
                <legend><?= __('Add Model') ?></legend>
                <?php
                    echo $this->Form->control('code');
                    echo $this->Form->control('brand_id', ['options' => $brands]);
                    echo $this->Form->control('item_type_id', ['options' => $itemTypes]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('telephony._ids', ['options' => $telephony]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
