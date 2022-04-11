<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RadioBand[]|\Cake\Collection\CollectionInterface $radioBands
 */
?>
<div class="radioBands index content">
    <?= $this->Html->link(__('New Radio Band'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Radio Bands') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($radioBands as $radioBand): ?>
                <tr>
                    <td><?= $this->Number->format($radioBand->id) ?></td>
                    <td><?= h($radioBand->name) ?></td>
                    <td><?= h($radioBand->created) ?></td>
                    <td><?= h($radioBand->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $radioBand->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $radioBand->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $radioBand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $radioBand->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
