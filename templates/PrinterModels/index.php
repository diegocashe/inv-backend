<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrinterModel[]|\Cake\Collection\CollectionInterface $printerModels
 */
?>
<div class="printerModels index content">
    <?= $this->Html->link(__('New Printer Model'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Printer Models') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('model_id') ?></th>
                    <th><?= $this->Paginator->sort('printer_type_id') ?></th>
                    <th><?= $this->Paginator->sort('consumable_id') ?></th>
                    <th><?= $this->Paginator->sort('print_types_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($printerModels as $printerModel): ?>
                <tr>
                    <td><?= $this->Number->format($printerModel->id) ?></td>
                    <td><?= $printerModel->has('model') ? $this->Html->link($printerModel->model->id, ['controller' => 'Models', 'action' => 'view', $printerModel->model->id]) : '' ?></td>
                    <td><?= $printerModel->has('printer_type') ? $this->Html->link($printerModel->printer_type->name, ['controller' => 'PrinterTypes', 'action' => 'view', $printerModel->printer_type->id]) : '' ?></td>
                    <td><?= $printerModel->has('consumable_model') ? $this->Html->link($printerModel->consumable_model->id, ['controller' => 'ConsumableModels', 'action' => 'view', $printerModel->consumable_model->id]) : '' ?></td>
                    <td><?= $printerModel->has('print_type') ? $this->Html->link($printerModel->print_type->name, ['controller' => 'PrintTypes', 'action' => 'view', $printerModel->print_type->id]) : '' ?></td>
                    <td><?= h($printerModel->created) ?></td>
                    <td><?= h($printerModel->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $printerModel->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $printerModel->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $printerModel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $printerModel->id)]) ?>
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
