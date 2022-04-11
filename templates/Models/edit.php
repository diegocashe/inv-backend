<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Model $model
 * @var string[]|\Cake\Collection\CollectionInterface $brands
 * @var string[]|\Cake\Collection\CollectionInterface $itemTypes
 * @var string[]|\Cake\Collection\CollectionInterface $telephony
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $model->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $model->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Models'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="models form content">
            <?= $this->Form->create($model) ?>
            <fieldset>
                <legend><?= __('Edit Model') ?></legend>
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
