<div class="enquiries view">
<h2><?php  echo __('Enquiry');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($enquiry['Enquiry']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($enquiry['Enquiry']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($enquiry['Enquiry']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enquiry['Client']['id'], array('controller' => 'clients', 'action' => 'view', $enquiry['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Case Worker'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enquiry['CaseWorker']['id'], array('controller' => 'users', 'action' => 'view', $enquiry['CaseWorker']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enquiry Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enquiry['EnquiryType']['title'], array('controller' => 'enquiry_types', 'action' => 'view', $enquiry['EnquiryType']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Enquiry'), array('action' => 'edit', $enquiry['Enquiry']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Enquiry'), array('action' => 'delete', $enquiry['Enquiry']['id']), null, __('Are you sure you want to delete # %s?', $enquiry['Enquiry']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiry'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Case Worker'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiry Types'), array('controller' => 'enquiry_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiry Type'), array('controller' => 'enquiry_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Policy Codes'), array('controller' => 'social_policy_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spc'), array('controller' => 'social_policy_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Social Policy Codes');?></h3>
	<?php if (!empty($enquiry['Spc'])):?>
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
		foreach ($enquiry['Spc'] as $spc): ?>
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
