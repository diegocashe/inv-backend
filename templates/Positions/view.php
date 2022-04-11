<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Position $position
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Position'), ['action' => 'edit', $position->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Position'), ['action' => 'delete', $position->id], ['confirm' => __('Are you sure you want to delete # {0}?', $position->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Positions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Position'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="positions view content">
            <h3><?= h($position->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($position->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($position->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($position->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($position->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($position->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related People') ?></h4>
                <?php if (!empty($position->people)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('First Name 1') ?></th>
                            <th><?= __('First Name 2') ?></th>
                            <th><?= __('Last Name 1') ?></th>
                            <th><?= __('Last Name 2') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Nacional Identify') ?></th>
                            <th><?= __('Department Id') ?></th>
                            <th><?= __('Position Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($position->people as $people) : ?>
                        <tr>
                            <td><?= h($people->id) ?></td>
                            <td><?= h($people->first_name_1) ?></td>
                            <td><?= h($people->first_name_2) ?></td>
                            <td><?= h($people->last_name_1) ?></td>
                            <td><?= h($people->last_name_2) ?></td>
                            <td><?= h($people->email) ?></td>
                            <td><?= h($people->nacional_identify) ?></td>
                            <td><?= h($people->department_id) ?></td>
                            <td><?= h($people->position_id) ?></td>
                            <td><?= h($people->created) ?></td>
                            <td><?= h($people->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'People', 'action' => 'view', $people->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'People', 'action' => 'edit', $people->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'People', 'action' => 'delete', $people->id], ['confirm' => __('Are you sure you want to delete # {0}?', $people->id)]) ?>
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
