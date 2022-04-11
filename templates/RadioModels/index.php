<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RadioModel[]|\Cake\Collection\CollectionInterface $radioModels
 */
?>
<div class="radioModels index content">
    <?= $this->Html->link(__('New Radio Model'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Radio Models') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('model_id') ?></th>
                    <th><?= $this->Paginator->sort('band_id') ?></th>
                    <th><?= $this->Paginator->sort('frecuency_id') ?></th>
                    <th><?= $this->Paginator->sort('radio_types_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($radioModels as $radioModel): ?>
                <tr>
                    <td><?= $this->Number->format($radioModel->id) ?></td>
                    <td><?= $radioModel->has('model') ? $this->Html->link($radioModel->model->id, ['controller' => 'Models', 'action' => 'view', $radioModel->model->id]) : '' ?></td>
                    <td><?= $radioModel->has('radio_band') ? $this->Html->link($radioModel->radio_band->name, ['controller' => 'RadioBands', 'action' => 'view', $radioModel->radio_band->id]) : '' ?></td>
                    <td><?= $radioModel->has('radio_frequency') ? $this->Html->link($radioModel->radio_frequency->id, ['controller' => 'RadioFrequencys', 'action' => 'view', $radioModel->radio_frequency->id]) : '' ?></td>
                    <td><?= $radioModel->has('radio_type') ? $this->Html->link($radioModel->radio_type->name, ['controller' => 'RadioTypes', 'action' => 'view', $radioModel->radio_type->id]) : '' ?></td>
                    <td><?= h($radioModel->created) ?></td>
                    <td><?= h($radioModel->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $radioModel->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $radioModel->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $radioModel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $radioModel->id)]) ?>
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
