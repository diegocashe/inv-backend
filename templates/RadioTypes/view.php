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
            <?= $this->Html->link(__('Edit Radio Type'), ['action' => 'edit', $radioType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Radio Type'), ['action' => 'delete', $radioType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $radioType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Radio Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Radio Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="radioTypes view content">
            <h3><?= h($radioType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($radioType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($radioType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($radioType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($radioType->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($radioType->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
