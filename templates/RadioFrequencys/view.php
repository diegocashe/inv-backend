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
            <?= $this->Html->link(__('Edit Radio Frequency'), ['action' => 'edit', $radioFrequency->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Radio Frequency'), ['action' => 'delete', $radioFrequency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $radioFrequency->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Radio Frequencys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Radio Frequency'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="radioFrequencys view content">
            <h3><?= h($radioFrequency->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Frequency') ?></th>
                    <td><?= h($radioFrequency->frequency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($radioFrequency->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($radioFrequency->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($radioFrequency->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($radioFrequency->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
