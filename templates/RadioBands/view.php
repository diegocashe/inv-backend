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
            <?= $this->Html->link(__('Edit Radio Band'), ['action' => 'edit', $radioBand->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Radio Band'), ['action' => 'delete', $radioBand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $radioBand->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Radio Bands'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Radio Band'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="radioBands view content">
            <h3><?= h($radioBand->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($radioBand->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($radioBand->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($radioBand->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($radioBand->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($radioBand->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
