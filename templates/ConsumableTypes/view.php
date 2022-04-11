<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConsumableType $consumableType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Consumable Type'), ['action' => 'edit', $consumableType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Consumable Type'), ['action' => 'delete', $consumableType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consumableType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Consumable Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Consumable Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="consumableTypes view content">
            <h3><?= h($consumableType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($consumableType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($consumableType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($consumableType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($consumableType->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($consumableType->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Consumable Models') ?></h4>
                <?php if (!empty($consumableType->consumable_models)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Model Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Consumable Color Id') ?></th>
                            <th><?= __('Consumable Type Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($consumableType->consumable_models as $consumableModels) : ?>
                        <tr>
                            <td><?= h($consumableModels->id) ?></td>
                            <td><?= h($consumableModels->model_id) ?></td>
                            <td><?= h($consumableModels->code) ?></td>
                            <td><?= h($consumableModels->consumable_color_id) ?></td>
                            <td><?= h($consumableModels->consumable_type_id) ?></td>
                            <td><?= h($consumableModels->created) ?></td>
                            <td><?= h($consumableModels->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ConsumableModels', 'action' => 'view', $consumableModels->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ConsumableModels', 'action' => 'edit', $consumableModels->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ConsumableModels', 'action' => 'delete', $consumableModels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consumableModels->id)]) ?>
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
