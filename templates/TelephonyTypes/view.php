<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TelephonyType $telephonyType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Telephony Type'), ['action' => 'edit', $telephonyType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Telephony Type'), ['action' => 'delete', $telephonyType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telephonyType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Telephony Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Telephony Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="telephonyTypes view content">
            <h3><?= h($telephonyType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($telephonyType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($telephonyType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($telephonyType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($telephonyType->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Telephony Models') ?></h4>
                <?php if (!empty($telephonyType->telephony_models)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Model Id') ?></th>
                            <th><?= __('Telephony Type Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($telephonyType->telephony_models as $telephonyModels) : ?>
                        <tr>
                            <td><?= h($telephonyModels->id) ?></td>
                            <td><?= h($telephonyModels->model_id) ?></td>
                            <td><?= h($telephonyModels->telephony_type_id) ?></td>
                            <td><?= h($telephonyModels->created) ?></td>
                            <td><?= h($telephonyModels->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TelephonyModels', 'action' => 'view', $telephonyModels->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TelephonyModels', 'action' => 'edit', $telephonyModels->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TelephonyModels', 'action' => 'delete', $telephonyModels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telephonyModels->id)]) ?>
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
