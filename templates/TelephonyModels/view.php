<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TelephonyModel $telephonyModel
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Telephony Model'), ['action' => 'edit', $telephonyModel->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Telephony Model'), ['action' => 'delete', $telephonyModel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telephonyModel->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Telephony Models'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Telephony Model'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="telephonyModels view content">
            <h3><?= h($telephonyModel->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Model') ?></th>
                    <td><?= $telephonyModel->has('model') ? $this->Html->link($telephonyModel->model->id, ['controller' => 'Models', 'action' => 'view', $telephonyModel->model->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Telephony Type') ?></th>
                    <td><?= $telephonyModel->has('telephony_type') ? $this->Html->link($telephonyModel->telephony_type->name, ['controller' => 'TelephonyTypes', 'action' => 'view', $telephonyModel->telephony_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($telephonyModel->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($telephonyModel->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($telephonyModel->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
