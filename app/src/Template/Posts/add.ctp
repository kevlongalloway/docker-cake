<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($post); ?>
    <fieldset>
        <legend><?= __('Add Post'); ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body',['type' => 'textarea']);
        ?>
        <input type="hidden" name="is_posted" value="0" />
    </fieldset>
    <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end(); ?>
</div>