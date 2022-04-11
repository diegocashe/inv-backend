<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $people
 */
?>
<div class="people index content">
    <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('People') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name_1') ?></th>
                    <th><?= $this->Paginator->sort('first_name_2') ?></th>
                    <th><?= $this->Paginator->sort('last_name_1') ?></th>
                    <th><?= $this->Paginator->sort('last_name_2') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('nacional_identify') ?></th>
                    <th><?= $this->Paginator->sort('department_id') ?></th>
                    <th><?= $this->Paginator->sort('position_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $person): ?>
                <tr>
                    <td><?= $this->Number->format($person->id) ?></td>
                    <td><?= h($person->first_name_1) ?></td>
                    <td><?= h($person->first_name_2) ?></td>
                    <td><?= h($person->last_name_1) ?></td>
                    <td><?= h($person->last_name_2) ?></td>
                    <td><?= h($person->email) ?></td>
                    <td><?= h($person->nacional_identify) ?></td>
                    <td><?= $person->has('department') ? $this->Html->link($person->department->name, ['controller' => 'Departments', 'action' => 'view', $person->department->id]) : '' ?></td>
                    <td><?= $person->has('position') ? $this->Html->link($person->position->name, ['controller' => 'Positions', 'action' => 'view', $person->position->id]) : '' ?></td>
                    <td><?= h($person->created) ?></td>
                    <td><?= h($person->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $person->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?>
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
