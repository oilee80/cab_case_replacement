

<table class="table table-condensed table-striped">
	<thead>
		<th>#</th>
		<?php echo $this->BootstrapPaginator->sortTableHeader('title', null, array('model' => 'EnquiryType')); ?>
		<th>Actions</th>
	</thead>
	<tbody>
		<?php foreach($enquiryTypes As $i => $type): ?>
			<tr class="<?php echo ($type['EnquiryType']['disabled']) ? 'error' : ''; ?>">
				<td><?php echo $i + 1; ?></td>
				<td><a href="#<?php echo $type['EnquiryType']['id']; ?>" data-toggle="modal"><?php echo $type['EnquiryType']['title']; ?></a></td>
				<td>
<?php
	echo $this->Html->link(__('Edit'), array('action' => 'edit', $type['EnquiryType']['id']));
?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php foreach($enquiryTypes As $i => $type): ?>

<div class="modal hide fade" id="<?php echo $type['EnquiryType']['id']; ?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3><?php echo $type['EnquiryType']['title']; ?></h3>
	</div>
	<div class="modal-body">
		content
	</div>
</div>

<?php endforeach; ?>