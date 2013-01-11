<div class="contactsSpcs view">
<h2><?php  echo __('Contacts Spc');?></h2>
	<dl>
		<dt><?php echo __('Enquiries'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contactsSpc['Enquiries']['title'], array('controller' => 'enquiries', 'action' => 'view', $contactsSpc['Enquiries']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Social Policy Code'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contactsSpc['SocialPolicyCode']['title'], array('controller' => 'social_policy_codes', 'action' => 'view', $contactsSpc['SocialPolicyCode']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contacts Spc'), array('action' => 'edit', $contactsSpc['ContactsSpc']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contacts Spc'), array('action' => 'delete', $contactsSpc['ContactsSpc']['id']), null, __('Are you sure you want to delete # %s?', $contactsSpc['ContactsSpc']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts Spcs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contacts Spc'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiries'), array('controller' => 'enquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiries'), array('controller' => 'enquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Policy Codes'), array('controller' => 'social_policy_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Policy Code'), array('controller' => 'social_policy_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
