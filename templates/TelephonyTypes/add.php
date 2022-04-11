<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TelephonyType $telephonyType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Telephony Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="telephonyTypes form content">
            <?= $this->Form->create($telephonyType) ?>
            <fieldset>
                <legend><?= __('Add Telephony Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
