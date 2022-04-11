<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Brand $brand
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Brand'), ['action' => 'edit', $brand->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Brand'), ['action' => 'delete', $brand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brand->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Brands'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Brand'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="brands view content">
            <h3><?= h($brand->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($brand->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Website') ?></th>
                    <td><?= h($brand->website) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($brand->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($brand->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($brand->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Models') ?></h4>
                <?php if (!empty($brand->models)) : ?>
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
                        <?php foreach ($brand->models as $models) : ?>
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
