<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PhoneLine $phoneLine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Phone Line'), ['action' => 'edit', $phoneLine->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Phone Line'), ['action' => 'delete', $phoneLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phoneLine->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Phone Lines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Phone Line'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="phoneLines view content">
            <h3><?= h($phoneLine->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= h($phoneLine->number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imsi') ?></th>
                    <td><?= h($phoneLine->imsi) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sim Card') ?></th>
                    <td><?= h($phoneLine->sim_card) ?></td>
                </tr>
                <tr>
                    <th><?= __('Operator') ?></th>
                    <td><?= $phoneLine->has('operator') ? $this->Html->link($phoneLine->operator->name, ['controller' => 'Operators', 'action' => 'view', $phoneLine->operator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $phoneLine->has('item') ? $this->Html->link($phoneLine->item->id, ['controller' => 'Items', 'action' => 'view', $phoneLine->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($phoneLine->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($phoneLine->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($phoneLine->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Telephony') ?></h4>
                <?php if (!empty($phoneLine->telephony)) : ?>
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
                        <?php foreach ($phoneLine->telephony as $telephony) : ?>
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
