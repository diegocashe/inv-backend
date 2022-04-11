<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemType $itemType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Item Type'), ['action' => 'edit', $itemType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Item Type'), ['action' => 'delete', $itemType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Item Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Item Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itemTypes view content">
            <h3><?= h($itemType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($itemType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Scope') ?></th>
                    <td><?= h($itemType->scope) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($itemType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($itemType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($itemType->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($itemType->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Models') ?></h4>
                <?php if (!empty($itemType->models)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Brand Id') ?></th>
                            <th><?= __('Item Type Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($itemType->models as $models) : ?>
                        <tr>
                            <td><?= h($models->id) ?></td>
                            <td><?= h($models->code) ?></td>
                            <td><?= h($models->brand_id) ?></td>
                            <td><?= h($models->item_type_id) ?></td>
                            <td><?= h($models->description) ?></td>
                            <td><?= h($models->created) ?></td>
                            <td><?= h($models->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Models', 'action' => 'view', $models->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Models', 'action' => 'edit', $models->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Models', 'action' => 'delete', $models->id], ['confirm' => __('Are you sure you want to delete # {0}?', $models->id)]) ?>
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
