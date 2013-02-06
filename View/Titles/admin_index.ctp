<table class="table table-condensed table-striped">
	<thead>
		<th>#</th>
		<?php echo $this->BootstrapPaginator->sortTableHeader('title', null, array('model' => 'Title')); ?>
		<th>Actions</th>
	</thead>
	<tbody>
		<?php foreach($titles As $i => $title): ?>
			<tr class="<?php echo ($title['Title']['disabled']) ? 'error' : ''; ?>">
				<td><?php echo $i + 1; ?></td>
				<td><?php echo $title['Title']['title']; ?></td>
				<td>
<?php
	echo $this->Html->link(__('Edit'), array('action' => 'edit', $title['Title']['id']));
?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>