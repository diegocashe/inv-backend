<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Telephony $telephony
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Telephony'), ['action' => 'edit', $telephony->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Telephony'), ['action' => 'delete', $telephony->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telephony->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Telephony'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Telephony'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="telephony view content">
            <h3><?= h($telephony->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Imei') ?></th>
                    <td><?= h($telephony->imei) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imei2') ?></th>
                    <td><?= h($telephony->imei2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $telephony->has('item') ? $this->Html->link($telephony->item->id, ['controller' => 'Items', 'action' => 'view', $telephony->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Line') ?></th>
                    <td><?= $telephony->has('phone_line') ? $this->Html->link($telephony->phone_line->id, ['controller' => 'PhoneLines', 'action' => 'view', $telephony->phone_line->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($telephony->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($telephony->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($telephony->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Models') ?></h4>
                <?php if (!empty($telephony->models)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Brand Id') ?></th>
                            <th><?= __('Item Type Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($telephony->models as $models) : ?>
                        <tr>
                            <td><?= h($models->id) ?></td>
                            <td><?= h($models->code) ?></td>
                            <td><?= h($models->brand_id) ?></td>
                            <td><?= h($models->item_type_id) ?></td>
                            <td><?= h($models->description) ?></td>
                            <td><?= h($models->created) ?></td>
                            <td><?= h($models->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Models', 'action' => 'view', $models->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Models', 'action' => 'edit', $models->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Models', 'action' => 'delete', $models->id], ['confirm' => __('Are you sure you want to delete # {0}?', $models->id)]) ?>
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
