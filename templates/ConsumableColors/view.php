<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConsumableColor $consumableColor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Consumable Color'), ['action' => 'edit', $consumableColor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Consumable Color'), ['action' => 'delete', $consumableColor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consumableColor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Consumable Colors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Consumable Color'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="consumableColors view content">
            <h3><?= h($consumableColor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Colors') ?></th>
                    <td><?= h($consumableColor->colors) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($consumableColor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($consumableColor->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($consumableColor->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Consumable Models') ?></h4>
                <?php if (!empty($consumableColor->consumable_models)) : ?>
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
                        <?php foreach ($consumableColor->consumable_models as $consumableModels) : ?>
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
