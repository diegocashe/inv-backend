<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrinterType $printerType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Printer Type'), ['action' => 'edit', $printerType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Printer Type'), ['action' => 'delete', $printerType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $printerType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Printer Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Printer Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="printerTypes view content">
            <h3><?= h($printerType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($printerType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($printerType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($printerType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($printerType->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($printerType->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Printer Models') ?></h4>
                <?php if (!empty($printerType->printer_models)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Model Id') ?></th>
                            <th><?= __('Printer Type Id') ?></th>
                            <th><?= __('Consumable Id') ?></th>
                            <th><?= __('Print Types Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($printerType->printer_models as $printerModels) : ?>
                        <tr>
                            <td><?= h($printerModels->id) ?></td>
                            <td><?= h($printerModels->model_id) ?></td>
                            <td><?= h($printerModels->printer_type_id) ?></td>
                            <td><?= h($printerModels->consumable_id) ?></td>
                            <td><?= h($printerModels->print_types_id) ?></td>
                            <td><?= h($printerModels->created) ?></td>
                            <td><?= h($printerModels->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PrinterModels', 'action' => 'view', $printerModels->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PrinterModels', 'action' => 'edit', $printerModels->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PrinterModels', 'action' => 'delete', $printerModels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $printerModels->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
