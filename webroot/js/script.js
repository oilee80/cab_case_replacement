var app = {
	root: '/',

	_init: function() {
		$(document).ajaxComplete(app.debug);
		$('#FindAddress').bind('click', {}, app.clients.address_search);
		$('#getTasks').bind('click', {}, app.tasks.find).addClass('selectable');
	},
	debug: function(event, XMLHttpRequest, ajaxOptions) {
		var data = JSON.parse(XMLHttpRequest.responseText);
		if('sql_logs' in data) {
			sql_logs = data.sql_logs;
			for(var i = 0; i < sql_logs.length; i++) {
				var log = sql_logs[i];
				console.log('SQL Log: '+log.summary);
				for(var z = 0; z < log.queries.length; z++) {
					console.log(log.queries[z]);
				}
			}
		}
	},
	modal: {
		open: function(content, extra_classes) {
			var modal = $('<div class="modal-wrapper '+extra_classes+'">');
			var modal_inner = $('<div class="modal" />');
			modal.append(modal_inner);
			modal_inner.append(content);
			var close = $('<a class="close_modal">Close</a>').bind('click', {modal:modal}, app.modal.remove);
			modal_inner.append(close);
			$(document.body).append(modal);
			return modal;
		},
		remove: function(ev) {
			ev.data.modal.remove();
		}
	},
	address: {
		find: function(post_code, cb) {
			var post = {Address:{post_code:post_code}};
			$.post(app.root+'addresses/find.json', post, function(data) {
				app.address.display_results(data, cb);
			}, 'json');
		},
		display_results: function(data, cb) {
			var results_table = $('<table class="restults_table" />');
			var modal = app.modal.open(results_table, 'address_results');
			var cb2 = function(ev) {
				cb(ev);
				modal.remove();
			}
			var result_rows = [];
			for(var i = 0; i < data.Addresses.length; i++) {
				var address = data.Addresses[i].Address;
				var row = $('<tr/>');
				row.append('<td>'+address.address_line_1+'</td>');
				row.append('<td>'+address.address_line_2+'</td>');
				row.append('<td>'+address.post_code+'</td>');
				row.addClass('selectable').bind('click', {Address: address}, cb2);
				results_table.append(row);
			}
		}
	},
	clients: {
		address_search: function() {
			app.address.find($('#ClientPostCode').val(), app.clients.address_load);
			return false;
		},
		find: function() {
			
		},
		display_results: function(data) {
console.log('Clients Find');
console.log(data);
		},
		address_load: function(ev) {
			var $client = $('#clients');
			$client.find('input[name$="[address_line_1]"]').val(ev.data.Address.address_line_1);
			$client.find('input[name$="[address_line_2]"]').val(ev.data.Address.address_line_2);
			$client.find('input[name$="[address_line_3]"]').val(ev.data.Address.address_line_3);
			$client.find('input[name$="[address_line_4]"]').val(ev.data.Address.address_line_4);
			$client.find('input[name$="[post_code]"]').val(ev.data.Address.post_code);
		}
	},
	enquiries: {
		_template: '<li class="{class}">{role}</li>'
	},
	enquiries_tree: {
		_template: '<li class="{class}">{role}</li>'
	},
	roles: {
		_template: '<li class="{class}">{role}</li>'
	},
	tasks: {
		find: function() {
			$.post(app.root+'tasks/assigned_tasks.json', {}, app.tasks.display);
		},
		display: function(data) {
			var $tasks = $('<ul>');
			var modal = app.modal.open($tasks, 'task_results');
			var cb = function(data) {
				app.tasks.load(data);
				modal.remove();
			}
			for(var i = 0; i < data.Tasks.length; i++) {
				var task = data.Tasks[i];
				var taskItem = $('<li />');
				var taskTitle = $('<h3 class="selectable">'+task.Task.title+'</h3>');
//				taskTitle.bind('click', {id: task.Task.id}, app.tasks.load);
				taskTitle.bind('click', task, cb);
				taskItem.append(taskTitle);
				taskItem.append('<h4>'+task.Task.state_text+'</h4>');
				taskItem.append('<pre>'+task.Task.notes+'</pre>');
				taskItem.append('<div class="input"><label>Assigned By</label>'+task.Creator.user_name+'</div>');
				taskItem.append('<div class="input"><label>Assigned To</label>'+task.Assignee.user_name+'</div>');
				$tasks.append(taskItem);
			}
		},
		load: function(ev) {
console.log('Load Task');
console.log(ev.data);
		}
	}
}
$(document).ready(app._init);