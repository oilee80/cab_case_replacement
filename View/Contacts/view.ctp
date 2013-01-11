<div class="contacts view">
<h2><?php  echo __('Contact');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contact['ContactType']['title'], array('controller' => 'contact_types', 'action' => 'view', $contact['ContactType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contact['User']['id'], array('controller' => 'users', 'action' => 'view', $contact['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contact'), array('action' => 'edit', $contact['Contact']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contact'), array('action' => 'delete', $contact['Contact']['id']), null, __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contact Types'), array('controller' => 'contact_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact Type'), array('controller' => 'contact_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Policy Codes'), array('controller' => 'social_policy_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spc'), array('controller' => 'social_policy_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Social Policy Codes');?></h3>
	<?php if (!empty($contact['Spc'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Social Policy Code'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Disabled'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($contact['Spc'] as $spc): ?>
		<tr>
			<td><?php echo $spc['id'];?></td>
			<td><?php echo $spc['social_policy_code'];?></td>
			<td><?php echo $spc['title'];?></td>
			<td><?php echo $spc['description'];?></td>
			<td><?php echo $spc['disabled'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'social_policy_codes', 'action' => 'view', $spc['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'social_policy_codes', 'action' => 'edit', $spc['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'social_policy_codes', 'action' => 'delete', $spc['id']), null, __('Are you sure you want to delete # %s?', $spc['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Spc'), array('controller' => 'social_policy_codes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
