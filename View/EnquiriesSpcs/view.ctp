<div class="enquiriesSpcs view">
<h2><?php  echo __('Enquiries Spc');?></h2>
	<dl>
		<dt><?php echo __('Social Policy Code'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enquiriesSpc['SocialPolicyCode']['title'], array('controller' => 'social_policy_codes', 'action' => 'view', $enquiriesSpc['SocialPolicyCode']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enquiry'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enquiriesSpc['Enquiry']['title'], array('controller' => 'enquiries', 'action' => 'view', $enquiriesSpc['Enquiry']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Enquiries Spc'), array('action' => 'edit', $enquiriesSpc['EnquiriesSpc']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Enquiries Spc'), array('action' => 'delete', $enquiriesSpc['EnquiriesSpc']['id']), null, __('Are you sure you want to delete # %s?', $enquiriesSpc['EnquiriesSpc']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiries Spcs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiries Spc'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Policy Codes'), array('controller' => 'social_policy_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Policy Code'), array('controller' => 'social_policy_codes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiries'), array('controller' => 'enquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiry'), array('controller' => 'enquiries', 'action' => 'add')); ?> </li>
	</ul>
</div>
