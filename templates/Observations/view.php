<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Observation $observation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Observation'), ['action' => 'edit', $observation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Observation'), ['action' => 'delete', $observation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $observation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Observations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Observation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="observations view content">
            <h3><?= h($observation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Allocation') ?></th>
                    <td><?= $observation->has('allocation') ? $this->Html->link($observation->allocation->id, ['controller' => 'Allocations', 'action' => 'view', $observation->allocation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($observation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($observation->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($observation->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($observation->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
