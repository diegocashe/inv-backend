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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $radioFrequency->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $radioFrequency->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Radio Frequencys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="radioFrequencys form content">
            <?= $this->Form->create($radioFrequency) ?>
            <fieldset>
                <legend><?= __('Edit Radio Frequency') ?></legend>
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
