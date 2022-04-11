<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RadioModel $radioModel
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Radio Model'), ['action' => 'edit', $radioModel->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Radio Model'), ['action' => 'delete', $radioModel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $radioModel->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Radio Models'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Radio Model'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="radioModels view content">
            <h3><?= h($radioModel->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Model') ?></th>
                    <td><?= $radioModel->has('model') ? $this->Html->link($radioModel->model->id, ['controller' => 'Models', 'action' => 'view', $radioModel->model->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Radio Band') ?></th>
                    <td><?= $radioModel->has('radio_band') ? $this->Html->link($radioModel->radio_band->name, ['controller' => 'RadioBands', 'action' => 'view', $radioModel->radio_band->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Radio Frequency') ?></th>
                    <td><?= $radioModel->has('radio_frequency') ? $this->Html->link($radioModel->radio_frequency->id, ['controller' => 'RadioFrequencys', 'action' => 'view', $radioModel->radio_frequency->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Radio Type') ?></th>
                    <td><?= $radioModel->has('radio_type') ? $this->Html->link($radioModel->radio_type->name, ['controller' => 'RadioTypes', 'action' => 'view', $radioModel->radio_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($radioModel->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($radioModel->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($radioModel->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
