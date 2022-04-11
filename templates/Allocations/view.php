<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Allocation $allocation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Allocation'), ['action' => 'edit', $allocation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Allocation'), ['action' => 'delete', $allocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $allocation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Allocations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Allocation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="allocations view content">
            <h3><?= h($allocation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ubication') ?></th>
                    <td><?= h($allocation->ubication) ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $allocation->has('person') ? $this->Html->link($allocation->person->id, ['controller' => 'People', 'action' => 'view', $allocation->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $allocation->has('item') ? $this->Html->link($allocation->item->id, ['controller' => 'Items', 'action' => 'view', $allocation->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $allocation->has('user') ? $this->Html->link($allocation->user->id, ['controller' => 'Users', 'action' => 'view', $allocation->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($allocation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigment Date') ?></th>
                    <td><?= h($allocation->assigment_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dispatch Date') ?></th>
                    <td><?= h($allocation->dispatch_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($allocation->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($allocation->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $allocation->active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Observations') ?></h4>
                <?php if (!empty($allocation->observations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Allocation Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($allocation->observations as $observations) : ?>
                        <tr>
                            <td><?= h($observations->id) ?></td>
                            <td><?= h($observations->description) ?></td>
                            <td><?= h($observations->allocation_id) ?></td>
                            <td><?= h($observations->created) ?></td>
                            <td><?= h($observations->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Observations', 'action' => 'view', $observations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Observations', 'action' => 'edit', $observations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Observations', 'action' => 'delete', $observations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $observations->id)]) ?>
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
