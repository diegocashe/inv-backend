<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="items view content">
            <h3><?= h($item->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Serial') ?></th>
                    <td><?= h($item->serial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active Code') ?></th>
                    <td><?= h($item->active_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Model') ?></th>
                    <td><?= $item->has('model') ? $this->Html->link($item->model->id, ['controller' => 'Models', 'action' => 'view', $item->model->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= $item->has('state') ? $this->Html->link($item->state->name, ['controller' => 'States', 'action' => 'view', $item->state->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($item->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($item->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($item->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Allocations') ?></h4>
                <?php if (!empty($item->allocations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Assigment Date') ?></th>
                            <th><?= __('Dispatch Date') ?></th>
                            <th><?= __('Ubication') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Assigned People Id') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('Assignor User Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($item->allocations as $allocations) : ?>
                        <tr>
                            <td><?= h($allocations->id) ?></td>
                            <td><?= h($allocations->assigment_date) ?></td>
                            <td><?= h($allocations->dispatch_date) ?></td>
                            <td><?= h($allocations->ubication) ?></td>
                            <td><?= h($allocations->active) ?></td>
                            <td><?= h($allocations->assigned_people_id) ?></td>
                            <td><?= h($allocations->item_id) ?></td>
                            <td><?= h($allocations->assignor_user_id) ?></td>
                            <td><?= h($allocations->created) ?></td>
                            <td><?= h($allocations->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Allocations', 'action' => 'view', $allocations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Allocations', 'action' => 'edit', $allocations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Allocations', 'action' => 'delete', $allocations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $allocations->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Extra Rows') ?></h4>
                <?php if (!empty($item->extra_rows)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($item->extra_rows as $extraRows) : ?>
                        <tr>
                            <td><?= h($extraRows->id) ?></td>
                            <td><?= h($extraRows->name) ?></td>
                            <td><?= h($extraRows->description) ?></td>
                            <td><?= h($extraRows->item_id) ?></td>
                            <td><?= h($extraRows->created) ?></td>
                            <td><?= h($extraRows->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ExtraRows', 'action' => 'view', $extraRows->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ExtraRows', 'action' => 'edit', $extraRows->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExtraRows', 'action' => 'delete', $extraRows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extraRows->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Phone Lines') ?></h4>
                <?php if (!empty($item->phone_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Number') ?></th>
                            <th><?= __('Imsi') ?></th>
                            <th><?= __('Sim Card') ?></th>
                            <th><?= __('Operator Id') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($item->phone_lines as $phoneLines) : ?>
                        <tr>
                            <td><?= h($phoneLines->id) ?></td>
                            <td><?= h($phoneLines->number) ?></td>
                            <td><?= h($phoneLines->imsi) ?></td>
                            <td><?= h($phoneLines->sim_card) ?></td>
                            <td><?= h($phoneLines->operator_id) ?></td>
                            <td><?= h($phoneLines->item_id) ?></td>
                            <td><?= h($phoneLines->created) ?></td>
                            <td><?= h($phoneLines->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PhoneLines', 'action' => 'view', $phoneLines->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PhoneLines', 'action' => 'edit', $phoneLines->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PhoneLines', 'action' => 'delete', $phoneLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phoneLines->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Printers Consumables Assigment') ?></h4>
                <?php if (!empty($item->printers_consumables_assigment)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('Consumable Assigned Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($item->printers_consumables_assigment as $printersConsumablesAssigment) : ?>
                        <tr>
                            <td><?= h($printersConsumablesAssigment->id) ?></td>
                            <td><?= h($printersConsumablesAssigment->item_id) ?></td>
                            <td><?= h($printersConsumablesAssigment->consumable_assigned_id) ?></td>
                            <td><?= h($printersConsumablesAssigment->created) ?></td>
                            <td><?= h($printersConsumablesAssigment->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PrintersConsumablesAssigment', 'action' => 'view', $printersConsumablesAssigment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PrintersConsumablesAssigment', 'action' => 'edit', $printersConsumablesAssigment->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PrintersConsumablesAssigment', 'action' => 'delete', $printersConsumablesAssigment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $printersConsumablesAssigment->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Telephony') ?></h4>
                <?php if (!empty($item->telephony)) : ?>
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
                        <?php foreach ($item->telephony as $telephony) : ?>
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
        </div>
    </div>
</div>
