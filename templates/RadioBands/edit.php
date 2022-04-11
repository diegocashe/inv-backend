<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RadioBand $radioBand
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $radioBand->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $radioBand->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Radio Bands'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="radioBands form content">
            <?= $this->Form->create($radioBand) ?>
            <fieldset>
                <legend><?= __('Edit Radio Band') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
