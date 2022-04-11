<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Telephony $telephony
 * @var \Cake\Collection\CollectionInterface|string[] $items
 * @var \Cake\Collection\CollectionInterface|string[] $phoneLines
 * @var \Cake\Collection\CollectionInterface|string[] $models
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Telephony'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="telephony form content">
            <?= $this->Form->create($telephony) ?>
            <fieldset>
                <legend><?= __('Add Telephony') ?></legend>
                <?php
                    echo $this->Form->control('imei');
                    echo $this->Form->control('imei2');
                    echo $this->Form->control('item_id', ['options' => $items]);
                    echo $this->Form->control('phone_line_id', ['options' => $phoneLines]);
                    echo $this->Form->control('models._ids', ['options' => $models]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
