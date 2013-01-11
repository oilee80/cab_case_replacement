<div class="socialPolicyCodes view">
<h2><?php  echo __('Social Policy Code');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($socialPolicyCode['SocialPolicyCode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Social Policy Code'); ?></dt>
		<dd>
			<?php echo h($socialPolicyCode['SocialPolicyCode']['social_policy_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($socialPolicyCode['SocialPolicyCode']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($socialPolicyCode['SocialPolicyCode']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disabled'); ?></dt>
		<dd>
			<?php echo h($socialPolicyCode['SocialPolicyCode']['disabled']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Social Policy Code'), array('action' => 'edit', $socialPolicyCode['SocialPolicyCode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Social Policy Code'), array('action' => 'delete', $socialPolicyCode['SocialPolicyCode']['id']), null, __('Are you sure you want to delete # %s?', $socialPolicyCode['SocialPolicyCode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Policy Codes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Policy Code'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts Spcs'), array('controller' => 'contacts_spcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contacts Spc'), array('controller' => 'contacts_spcs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiries Spcs'), array('controller' => 'enquiries_spcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiries Spc'), array('controller' => 'enquiries_spcs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Contacts Spcs');?></h3>
	<?php if (!empty($socialPolicyCode['ContactsSpc'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Enquiries Id'); ?></th>
		<th><?php echo __('Social Policy Code Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($socialPolicyCode['ContactsSpc'] as $contactsSpc): ?>
		<tr>
			<td><?php echo $contactsSpc['enquiries_id'];?></td>
			<td><?php echo $contactsSpc['social_policy_code_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'contacts_spcs', 'action' => 'view', $contactsSpc['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'contacts_spcs', 'action' => 'edit', $contactsSpc['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contacts_spcs', 'action' => 'delete', $contactsSpc['id']), null, __('Are you sure you want to delete # %s?', $contactsSpc['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Contacts Spc'), array('controller' => 'contacts_spcs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Enquiries Spcs');?></h3>
	<?php if (!empty($socialPolicyCode['EnquiriesSpc'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Social Policy Code Id'); ?></th>
		<th><?php echo __('Enquiry Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($socialPolicyCode['EnquiriesSpc'] as $enquiriesSpc): ?>
		<tr>
			<td><?php echo $enquiriesSpc['social_policy_code_id'];?></td>
			<td><?php echo $enquiriesSpc['enquiry_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'enquiries_spcs', 'action' => 'view', $enquiriesSpc['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'enquiries_spcs', 'action' => 'edit', $enquiriesSpc['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'enquiries_spcs', 'action' => 'delete', $enquiriesSpc['id']), null, __('Are you sure you want to delete # %s?', $enquiriesSpc['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Enquiries Spc'), array('controller' => 'enquiries_spcs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
