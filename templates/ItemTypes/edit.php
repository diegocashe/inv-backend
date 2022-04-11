<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemType $itemType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $itemType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itemType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Item Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itemTypes form content">
            <?= $this->Form->create($itemType) ?>
            <fieldset>
                <legend><?= __('Edit Item Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('scope');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
