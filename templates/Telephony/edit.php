<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Telephony $telephony
 * @var string[]|\Cake\Collection\CollectionInterface $items
 * @var string[]|\Cake\Collection\CollectionInterface $phoneLines
 * @var string[]|\Cake\Collection\CollectionInterface $models
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $telephony->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $telephony->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Telephony'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="telephony form content">
            <?= $this->Form->create($telephony) ?>
            <fieldset>
                <legend><?= __('Edit Telephony') ?></legend>
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
