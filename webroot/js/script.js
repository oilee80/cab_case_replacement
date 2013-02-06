var app = {
	root: '/',

	_init: function() {
		$(document).ajaxComplete(app.debug);
		$('#FindAddress').bind('click', {}, app.clients.address_search);
		$('#getTasks').bind('click', {}, app.tasks.find).addClass('selectable');
		$('#findClient').bind('click', {}, app.clients.find);
		$('#ClientAnnonymous').bind('click change', {}, app.clients.annonymous);
		$('#findEnquiries').bind('click', {}, app.enquiries.find);
	},
	debug: function(event, XMLHttpRequest, ajaxOptions) {
		var data = JSON.parse(XMLHttpRequest.responseText);
		var sql_wrapper = $('.cake-sql-log-wrapper');

		if('sql_logs' in data) {
			sql_logs = data.sql_logs;
			for(var i = 0; i < sql_logs.length; i++) {
				var log = sql_logs[i];
//				console.log('SQL Log: '+log.summary);
				var table = $('<table class="cake-sql-log" cellspacing="0" summary="Cake SQL Log" />');
				table.append('<caption>SQL Log: '+log.summary+'</caption>');
				table.append('<thead><tr><th>Nr</th><th>Query</th><th>Error</th><th>Affected</th><th>Num. rows</th><th>Took (ms)</th></tr></thead>');
				for(var z = 0; z < log.queries.length; z++) {
//					console.log(log.queries[z]);
					table.append('<tr><td>'+(z+1)+'</td><td>'+log.queries[z].query+'</td><td>'+log.queries[z].error+'</td><td style="text-align: right">'+log.queries[z].affected+'</td><td style="text-align: right">'+log.queries[z].numRows+'</td><td style="text-align: right">'+log.queries[z].took+'</td></tr>');
				}
				sql_wrapper.append(table);
			}
		}
		if('name' in data) {
			alert(data.name);
		}
	},
	modal: {
		open: function(content, header, extra_classes, footer) {
			var header = (header) ? '<h3>'+header+'</h3>' : '';
			var modal = $('<div class="modal hide fade '+extra_classes+'">');
			modal.append('<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+header+'</div>');
			var modal_body = $('<div class="modal-body" />').append(content);
			modal.append(modal_body);
			if(footer) {
				modal.append(footer);
			}
			$(document.body).append(modal);
			console.log(modal);
			modal.modal();
			return modal;

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
			var results_table = $('<table class="table table-condensed table-striped results_table" />');
			var modal = app.modal.open(results_table, 'Address Search Results', 'address_results');
			var cb2 = function(ev) {
				cb(ev);
//				modal.remove();
			}
			var result_rows = [];
			for(var i = 0; i < data.Addresses.length; i++) {
				var address = data.Addresses[i].Address;
				var row = $('<tr/>');
				row.append('<td>'+address.address_line_1+'</td>');
				row.append('<td>'+address.address_line_2+'</td>');
				row.append('<td>'+address.post_code+'</td>');
				row.addClass('selectable').attr('data-dismiss', 'modal').bind('click', {Address: address}, cb2);
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
			var $client = $('#clients');
			$.ajax({
				type: 'POST',
				url: app.root+'clients/find.json',
				data: $client.serialize(),
				success: app.clients.display_results
			});
			return false;
		},
		annonymous: function() {
			$('#ClientTitle, #ClientLastName, #ClientDateOfBirthMonth, #ClientDateOfBirthDay, #ClientDateOfBirthYear, #ClientFlatNameNumber, #ClientHouseNameNumber, #ClientAddressLine1, #ClientAddressLine2, #ClientAddressLine3, #ClientAddressLine4, #ClientPostCode, #ClientPhone1, #ClientPhone2, #ClientEmail1, #ClientEmail2').prop('disabled', this.checked);
		},
		display_results: function(data) {
			var results_table = $('<table class="table table-condensed table-striped results_table" />');
			results_table.append('<thead><tr><th>First Name</th><th>Last Name</th><th>DoB</th><th>Post Code</th></tr></thead>');
			var model = app.modal.open(results_table, 'Client Search Results', 'client_results');
			for(var i = 0; i < data.Clients.length; i++) {
				var client = data.Clients[i];
				var row = $('<tr />');
				row.append('<td>'+client.Client.first_name+'</td>');
				if(client.last_name === null)
					row.append('<td class="annon">Annonymous</td>');
				else
					row.append('<td>'+client.Client.last_name+'</td>');
				
				if(client.date_of_birth === null)
					row.append('<td class="annon">Annonymous</td>');
				else
					row.append('<td>'+client.Client.date_of_birth+'</td>');
				
				if(client.post_code === null)
					row.append('<td class="annon">Annonymous</td>');
				else
					row.append('<td>'+client.Client.post_code+'</td>');

				row.addClass('selectable').attr('data-dismiss', 'modal').bind('click', {data: client}, app.clients.client_load);
				results_table.append(row);
			}
		},
		client_load: function(ev) {
			console.log(ev);
			console.log(ev.data.Client);
			$('#ClientId').val(ev.data.data.Client.id);
			$('#ClientTitle').val(ev.data.data.Client.title_id);
			$('#ClientExistingTitle').text(ev.data.data.Title.title);
			$('#ClientFirstName').val(ev.data.data.Client.first_name);
			$('#ClientLastName').val(ev.data.data.Client.last_name);
			$('#ClientAnnonymous')[0].checked = ev.data.data.Client.annonymous;
			$('#ClientDateOfBirthMonth').val(ev.data.data.Client.date_of_birth.split('-')[1]);
			$('#ClientDateOfBirthDay').val(ev.data.data.Client.date_of_birth.split('-')[2]);
			$('#ClientDateOfBirthYear').val(ev.data.data.Client.date_of_birth.split('-')[0]);
			$('#ClientFlatNameNumber').val(ev.data.data.Client.flat_name_number);
			$('#ClientHouseNameNumber').val(ev.data.data.Client.house_name_number);
			$('#ClientAddressLine1').val(ev.data.data.Client.address_line_1);
			$('#ClientAddressLine2').val(ev.data.data.Client.address_line_2);
			$('#ClientAddressLine3').val(ev.data.data.Client.address_line_3);
			$('#ClientAddressLine4').val(ev.data.data.Client.address_line_4);
			$('#ClientPostCode').val(ev.data.data.Client.post_code);
			$('#ClientPhone1').val(ev.data.data.Client.phone_1);
			$('#ClientPhone2').val(ev.data.data.Client.phone_2);
			$('#ClientEmail1').val(ev.data.data.Client.email_1);
			$('#ClientEmail2').val(ev.data.data.Client.email_2);
			var tree_node = $('#enquiries-tree #client_'+ev.data.data.Client.id);
			if(tree_node.length < 1) {
				var tree_node = $('<li id="client_'+ev.data.data.Client.id+'">'+ev.data.data.Title.title+' '+ev.data.data.Client.first_name+' '+ev.data.data.Client.last_name+'</li>')
				$('#enquiries-tree ul').append(tree_node);
			}
		},
		address_load: function(ev) {
			var $client = $('#clients');
			$client.find('input[name$="[address_line_1]"]').val(ev.data.Address.address_line_1);
			$client.find('input[name$="[address_line_2]"]').val(ev.data.Address.address_line_2);
			$client.find('input[name$="[address_line_3]"]').val(ev.data.Address.address_line_3);
			$client.find('input[name$="[address_line_4]"]').val(ev.data.Address.address_line_4);
			$client.find('input[name$="[post_code]"]').val(ev.data.Address.post_code);
			$client.find('input[name$="[flat_name_number]"]').focus();
		}
	},
	enquiries: {
		find: function() {
			var client_id = $('#ClientId').val();
			if(client_id.length < 36) {
				alert('Client Not Loaded');
				return;
			}
			$.post(app.root+'enquiries/client_enquiries.json', {Enquiries: {client_id: client_id}}, app.enquiries.pupulate_enquiry_tree);
			return false;
		},
		pupulate_enquiry_tree: function(data) {
			console.log(data);
			var enquiries = data.Enquiries;
			var enqiry_list = $('<ul />');
			for(var i = 0; i < enquiries.length; i++) {
				var enquiry = enquiries[i];
				var enquiry_node = $('<li title="Created: '+enquiry.Enquiry.created+'" class="selectable '+enquiry.EnquiryType.class+'">'+enquiry.Enquiry.title+' ('+enquiry.EnquiryType.title+')</li>');
				enquiry_node.bind('click', {enquiry_id: enquiry.Enquiry.id}, app.enquiries.load);
				enqiry_list.append(enquiry_node);
			}
			var client_node = $('#enquiries-tree ul #client_'+enquiry.Enquiry.client_id);
			client_node.find('ul').remove();
			client_node.append(enqiry_list);
		},
		load: function(ev) {
			var id = ev.data.enquiry_id;
		}
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