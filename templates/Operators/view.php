<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operator $operator
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Operator'), ['action' => 'edit', $operator->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Operator'), ['action' => 'delete', $operator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operator->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Operators'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Operator'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="operators view content">
            <h3><?= h($operator->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($operator->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Suffix') ?></th>
                    <td><?= h($operator->suffix) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($operator->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($operator->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($operator->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Phone Lines') ?></h4>
                <?php if (!empty($operator->phone_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Number') ?></th>
                            <th><?= __('Imsi') ?></th>
                            <th><?= __('Sim Card') ?></th>
                            <th><?= __('Operator Id') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($operator->phone_lines as $phoneLines) : ?>
                        <tr>
                            <td><?= h($phoneLines->id) ?></td>
                            <td><?= h($phoneLines->number) ?></td>
                            <td><?= h($phoneLines->imsi) ?></td>
                            <td><?= h($phoneLines->sim_card) ?></td>
                            <td><?= h($phoneLines->operator_id) ?></td>
                            <td><?= h($phoneLines->item_id) ?></td>
                            <td><?= h($phoneLines->created) ?></td>
                            <td><?= h($phoneLines->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PhoneLines', 'action' => 'view', $phoneLines->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PhoneLines', 'action' => 'edit', $phoneLines->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PhoneLines', 'action' => 'delete', $phoneLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phoneLines->id)]) ?>
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
