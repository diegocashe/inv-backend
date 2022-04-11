<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RadioType $radioType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $radioType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $radioType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Radio Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="radioTypes form content">
            <?= $this->Form->create($radioType) ?>
            <fieldset>
                <legend><?= __('Edit Radio Type') ?></legend>
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
