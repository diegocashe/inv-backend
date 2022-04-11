<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExtraRow $extraRow
 * @var string[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $extraRow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $extraRow->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Extra Rows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="extraRows form content">
            <?= $this->Form->create($extraRow) ?>
            <fieldset>
                <legend><?= __('Edit Extra Row') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('item_id', ['options' => $items]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
