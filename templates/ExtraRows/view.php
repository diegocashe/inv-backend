<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExtraRow $extraRow
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Extra Row'), ['action' => 'edit', $extraRow->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Extra Row'), ['action' => 'delete', $extraRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extraRow->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Extra Rows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Extra Row'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="extraRows view content">
            <h3><?= h($extraRow->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($extraRow->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $extraRow->has('item') ? $this->Html->link($extraRow->item->id, ['controller' => 'Items', 'action' => 'view', $extraRow->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($extraRow->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($extraRow->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($extraRow->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($extraRow->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
