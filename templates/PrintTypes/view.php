<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrintType $printType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Print Type'), ['action' => 'edit', $printType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Print Type'), ['action' => 'delete', $printType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $printType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Print Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Print Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="printTypes view content">
            <h3><?= h($printType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($printType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($printType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($printType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($printType->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($printType->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
