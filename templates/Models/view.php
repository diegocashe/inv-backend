<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Model $model
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Model'), ['action' => 'edit', $model->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Model'), ['action' => 'delete', $model->id], ['confirm' => __('Are you sure you want to delete # {0}?', $model->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Models'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Model'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="models view content">
            <h3><?= h($model->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($model->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Brand') ?></th>
                    <td><?= $model->has('brand') ? $this->Html->link($model->brand->name, ['controller' => 'Brands', 'action' => 'view', $model->brand->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Item Type') ?></th>
                    <td><?= $model->has('item_type') ? $this->Html->link($model->item_type->name, ['controller' => 'ItemTypes', 'action' => 'view', $model->item_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($model->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($model->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($model->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($model->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Telephony') ?></h4>
                <?php if (!empty($model->telephony)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Imei') ?></th>
                            <th><?= __('Imei2') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('Phone Line Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($model->telephony as $telephony) : ?>
                        <tr>
                            <td><?= h($telephony->id) ?></td>
                            <td><?= h($telephony->imei) ?></td>
                            <td><?= h($telephony->imei2) ?></td>
                            <td><?= h($telephony->item_id) ?></td>
                            <td><?= h($telephony->phone_line_id) ?></td>
                            <td><?= h($telephony->created) ?></td>
                            <td><?= h($telephony->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Telephony', 'action' => 'view', $telephony->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Telephony', 'action' => 'edit', $telephony->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Telephony', 'action' => 'delete', $telephony->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telephony->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Consumable Models') ?></h4>
                <?php if (!empty($model->consumable_models)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Model Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Consumable Color Id') ?></th>
                            <th><?= __('Consumable Type Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($model->consumable_models as $consumableModels) : ?>
                        <tr>
                            <td><?= h($consumableModels->id) ?></td>
                            <td><?= h($consumableModels->model_id) ?></td>
                            <td><?= h($consumableModels->code) ?></td>
                            <td><?= h($consumableModels->consumable_color_id) ?></td>
                            <td><?= h($consumableModels->consumable_type_id) ?></td>
                            <td><?= h($consumableModels->created) ?></td>
                            <td><?= h($consumableModels->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ConsumableModels', 'action' => 'view', $consumableModels->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ConsumableModels', 'action' => 'edit', $consumableModels->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ConsumableModels', 'action' => 'delete', $consumableModels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consumableModels->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Items') ?></h4>
                <?php if (!empty($model->items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Serial') ?></th>
                            <th><?= __('Active Code') ?></th>
                            <th><?= __('Model Id') ?></th>
                            <th><?= __('State Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($model->items as $items) : ?>
                        <tr>
                            <td><?= h($items->id) ?></td>
                            <td><?= h($items->serial) ?></td>
                            <td><?= h($items->active_code) ?></td>
                            <td><?= h($items->model_id) ?></td>
                            <td><?= h($items->state_id) ?></td>
                            <td><?= h($items->created) ?></td>
                            <td><?= h($items->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Printer Models') ?></h4>
                <?php if (!empty($model->printer_models)) : ?>
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
                        <?php foreach ($model->printer_models as $printerModels) : ?>
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
            <div class="related">
                <h4><?= __('Related Radio Models') ?></h4>
                <?php if (!empty($model->radio_models)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Model Id') ?></th>
                            <th><?= __('Band Id') ?></th>
                            <th><?= __('Frecuency Id') ?></th>
                            <th><?= __('Radio Types Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($model->radio_models as $radioModels) : ?>
                        <tr>
                            <td><?= h($radioModels->id) ?></td>
                            <td><?= h($radioModels->model_id) ?></td>
                            <td><?= h($radioModels->band_id) ?></td>
                            <td><?= h($radioModels->frecuency_id) ?></td>
                            <td><?= h($radioModels->radio_types_id) ?></td>
                            <td><?= h($radioModels->created) ?></td>
                            <td><?= h($radioModels->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'RadioModels', 'action' => 'view', $radioModels->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'RadioModels', 'action' => 'edit', $radioModels->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RadioModels', 'action' => 'delete', $radioModels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $radioModels->id)]) ?>
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
