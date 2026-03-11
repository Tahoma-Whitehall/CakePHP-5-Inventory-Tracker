<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $product
 */
?>
<div class="column column-80">
        <div class="product form content">
            <?= $this->Form->create($product) ?>
            <fieldset>
                <?php
                    $options=['out' => 'out stock' , 'low' => 'low stock' , 'in' => 'in stock'];
                    echo $this->Form->control('name_search');
                    echo $this->Form->select('filter' , $options, ['empty' => true]);
                    echo $this->Form->control('delete_flagged',['type' => 'checkbox']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
</div>

<div class="product index content">
    <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Product') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('flag') ?></th>
                    <th><?= $this->Paginator->sort('last_updated') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($product as $product): ?>
                <tr>
                    <td><?= h($product->name) ?></td>
                    <td><?= $this->Number->format($product->quantity) ?></td>
                    <td><?= $this->Number->format($product->price) ?></td>
                    <td><?= h($product->status) ?></td>
                    <td><?= $this->Number->format($product->flag) ?></td>
                    <td><?= h($product->last_updated) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $product->id],
                            [
                                'method' => 'post',
                                'confirm' => __('Are you sure you want to delete # {0}?', $product->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>