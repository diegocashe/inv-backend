<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List People'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="people view content">
            <h3><?= h($person->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name 1') ?></th>
                    <td><?= h($person->first_name_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name 2') ?></th>
                    <td><?= h($person->first_name_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name 1') ?></th>
                    <td><?= h($person->last_name_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name 2') ?></th>
                    <td><?= h($person->last_name_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($person->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nacional Identify') ?></th>
                    <td><?= h($person->nacional_identify) ?></td>
                </tr>
                <tr>
                    <th><?= __('Department') ?></th>
                    <td><?= $person->has('department') ? $this->Html->link($person->department->name, ['controller' => 'Departments', 'action' => 'view', $person->department->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= $person->has('position') ? $this->Html->link($person->position->name, ['controller' => 'Positions', 'action' => 'view', $person->position->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($person->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($person->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($person->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
