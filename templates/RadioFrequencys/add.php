<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RadioFrequency $radioFrequency
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Radio Frequencys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="radioFrequencys form content">
            <?= $this->Form->create($radioFrequency) ?>
            <fieldset>
                <legend><?= __('Add Radio Frequency') ?></legend>
                <?php
                    echo $this->Form->control('frequency');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
