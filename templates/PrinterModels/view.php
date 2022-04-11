<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrinterModel $printerModel
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Printer Model'), ['action' => 'edit', $printerModel->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Printer Model'), ['action' => 'delete', $printerModel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $printerModel->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Printer Models'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Printer Model'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="printerModels view content">
            <h3><?= h($printerModel->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Model') ?></th>
                    <td><?= $printerModel->has('model') ? $this->Html->link($printerModel->model->id, ['controller' => 'Models', 'action' => 'view', $printerModel->model->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Printer Type') ?></th>
                    <td><?= $printerModel->has('printer_type') ? $this->Html->link($printerModel->printer_type->name, ['controller' => 'PrinterTypes', 'action' => 'view', $printerModel->printer_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Consumable Model') ?></th>
                    <td><?= $printerModel->has('consumable_model') ? $this->Html->link($printerModel->consumable_model->id, ['controller' => 'ConsumableModels', 'action' => 'view', $printerModel->consumable_model->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Print Type') ?></th>
                    <td><?= $printerModel->has('print_type') ? $this->Html->link($printerModel->print_type->name, ['controller' => 'PrintTypes', 'action' => 'view', $printerModel->print_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($printerModel->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($printerModel->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($printerModel->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
