

<table class="table table-condensed table-striped">
	<thead>
		<th>#</th>
		<?php echo $this->BootstrapPaginator->sortTableHeader('address_line_1', null, array('model' => 'Address')); ?>
		<?php echo $this->BootstrapPaginator->sortTableHeader('address_line_2', null, array('model' => 'Address')); ?>
		<?php echo $this->BootstrapPaginator->sortTableHeader('address_line_4', null, array('model' => 'Address')); ?>
		<?php echo $this->BootstrapPaginator->sortTableHeader('post_code', null, array('model' => 'Address')); ?>
		<th>Actions</th>
	</thead>
	<tbody>
		<?php foreach($addresses As $i => $address): ?>
			<tr>
				<td><?php echo $i + 1; ?></td>
				<td><?php echo $address['Address']['address_line_1']; ?></td>
				<td><?php echo $address['Address']['address_line_2']; ?></td>
				<td><?php echo $address['Address']['address_line_4']; ?></td>
				<td><a href="#<?php echo $address['Address']['id']; ?>" data-toggle="modal"><?php echo $address['Address']['post_code']; ?></a></td>
				<td>
<?php
	echo $this->Html->link(__('Edit'), array('action' => 'edit', $address['Address']['id']));
?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php
	echo $this->BootstrapPaginator->counter('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}');
?>

	<div class="pagination">
		<ul>
	<?php
		echo $this->BootstrapPaginator->prev('< ' . __d('cake', 'previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->BootstrapPaginator->numbers(array('separator' => ''));
		echo $this->BootstrapPaginator->next(__d('cake', 'next') .' >', array(), null, array('class' => 'next disabled'));
	?>
		</ul>
	</div>

<?php foreach($addresses As $i => $address): ?>

<div class="modal hide fade" id="<?php echo $address['Address']['id']; ?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3><?php echo $address['Address']['post_code']; ?></h3>
	</div>
	<div class="modal-body">
		<address>
			<?php echo $address['Address']['address_line_1']; ?><br />
			<?php echo $address['Address']['address_line_2']; ?><br />
			<?php echo $address['Address']['address_line_3']; ?><br />
			<?php echo $address['Address']['address_line_4']; ?><br />
			<?php echo $address['Address']['post_code']; ?>
		</address>
	</div>
</div>

<?php endforeach; ?>