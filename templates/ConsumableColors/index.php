<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConsumableColor[]|\Cake\Collection\CollectionInterface $consumableColors
 */
?>
<div class="consumableColors index content">
    <?= $this->Html->link(__('New Consumable Color'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Consumable Colors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('colors') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consumableColors as $consumableColor): ?>
                <tr>
                    <td><?= $this->Number->format($consumableColor->id) ?></td>
                    <td><?= h($consumableColor->colors) ?></td>
                    <td><?= h($consumableColor->created) ?></td>
                    <td><?= h($consumableColor->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $consumableColor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $consumableColor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $consumableColor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consumableColor->id)]) ?>
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
