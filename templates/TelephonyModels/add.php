<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TelephonyModel $telephonyModel
 * @var \Cake\Collection\CollectionInterface|string[] $models
 * @var \Cake\Collection\CollectionInterface|string[] $telephonyTypes
 * @var \Cake\Collection\CollectionInterface|string[] $telephony
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Telephony Models'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="telephonyModels form content">
            <?= $this->Form->create($telephonyModel) ?>
            <fieldset>
                <legend><?= __('Add Telephony Model') ?></legend>
                <?php
                    echo $this->Form->control('model_id', ['options' => $models]);
                    echo $this->Form->control('telephony_type_id', ['options' => $telephonyTypes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
