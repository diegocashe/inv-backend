<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Headquarters $headquarters
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Headquarters'), ['action' => 'edit', $headquarters->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Headquarters'), ['action' => 'delete', $headquarters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $headquarters->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Headquarters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Headquarters'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="headquarters view content">
            <h3><?= h($headquarters->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($headquarters->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Acronym') ?></th>
                    <td><?= h($headquarters->acronym) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direction') ?></th>
                    <td><?= h($headquarters->direction) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($headquarters->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($headquarters->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($headquarters->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Departments') ?></h4>
                <?php if (!empty($headquarters->departments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Headquarters Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($headquarters->departments as $departments) : ?>
                        <tr>
                            <td><?= h($departments->id) ?></td>
                            <td><?= h($departments->name) ?></td>
                            <td><?= h($departments->description) ?></td>
                            <td><?= h($departments->headquarters_id) ?></td>
                            <td><?= h($departments->created) ?></td>
                            <td><?= h($departments->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Departments', 'action' => 'view', $departments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Departments', 'action' => 'edit', $departments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Departments', 'action' => 'delete', $departments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departments->id)]) ?>
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
