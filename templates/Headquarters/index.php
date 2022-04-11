<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Headquarters[]|\Cake\Collection\CollectionInterface $headquarters
 */
?>
<div class="headquarters index content">
    <?= $this->Html->link(__('New Headquarters'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Headquarters') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('acronym') ?></th>
                    <th><?= $this->Paginator->sort('direction') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($headquarters as $headquarters): ?>
                <tr>
                    <td><?= $this->Number->format($headquarters->id) ?></td>
                    <td><?= h($headquarters->name) ?></td>
                    <td><?= h($headquarters->acronym) ?></td>
                    <td><?= h($headquarters->direction) ?></td>
                    <td><?= h($headquarters->created) ?></td>
                    <td><?= h($headquarters->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $headquarters->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $headquarters->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $headquarters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $headquarters->id)]) ?>
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
