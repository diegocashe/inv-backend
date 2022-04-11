<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrinterType[]|\Cake\Collection\CollectionInterface $printerTypes
 */
?>
<div class="printerTypes index content">
    <?= $this->Html->link(__('New Printer Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Printer Types') ?></h3>
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
                <?php foreach ($printerTypes as $printerType): ?>
                <tr>
                    <td><?= $this->Number->format($printerType->id) ?></td>
                    <td><?= h($printerType->name) ?></td>
                    <td><?= h($printerType->created) ?></td>
                    <td><?= h($printerType->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $printerType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $printerType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $printerType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $printerType->id)]) ?>
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
