window.addEventListener('load', () => {
	const form = document.querySelector("#form-nova-tarefa");
	const input = document.querySelector("#input-nova-tarefa");
	const list_el = document.querySelector("#tarefas");


	form.addEventListener('submit', (e) => {
		e.preventDefault();

		const tarefa = input.value;
		
		if (tarefa == '') {
			
			alert("Escreva uma tarefa");
			return false;
		}

		const task_el = document.createElement('div');
		task_el.classList.add('tarefa');

		const task_content_el = document.createElement('div');
		task_content_el.classList.add('content');


		task_el.appendChild(task_content_el); 
		

		const task_input_el = document.createElement('input');
		task_input_el.classList.add('text');
		task_input_el.type = 'text';
		task_input_el.value = tarefa;
		task_input_el.setAttribute('readonly', 'readonly');

		task_content_el.appendChild(task_input_el); //criação de uma nova tarefa


		const task_actions_el = document.createElement('div');
		task_actions_el.classList.add('acao');
		

		
		const task_edit_el = document.createElement('button'); //criação do botão de editar tarefa
		task_edit_el.classList.add('editar');
		task_edit_el.innerText = 'Editar';

		const task_delete_el = document.createElement('button'); //criação do botão de excluir tarefa
		task_delete_el.classList.add('excluir');
		task_delete_el.innerText = 'Excluir';
		
		const task_end_el = document.createElement('button'); //criação do botão de finalizar tarefa
		task_end_el.classList.add('finalizar');
		task_end_el.innerText = 'Finalizar';

		task_actions_el.appendChild(task_edit_el);
		task_actions_el.appendChild(task_delete_el);
		task_actions_el.appendChild(task_end_el);

		task_el.appendChild(task_actions_el);
		list_el.appendChild(task_el);

		
		const finished_list_el = document.querySelector("#tarefas-finalizadas");
	
		task_end_el.addEventListener('click', (e) => {
			
			task_actions_el.removeChild(task_edit_el);
			task_actions_el.removeChild(task_end_el);
			task_content_el.appendChild(task_input_el);
			finished_list_el.appendChild(task_el);

		});
		
		
		
		input.value = '';

		task_edit_el.addEventListener('click', (e) => {
			if (task_edit_el.innerText.toLowerCase() == "editar") {
				task_edit_el.innerText = "Salvar";
				task_input_el.removeAttribute("readonly");
				task_input_el.focus();
			} else {
				task_edit_el.innerText = "Editar";
				task_input_el.setAttribute("readonly", "readonly");
			}
		});

		task_delete_el.addEventListener('click', (e) => {

			list_el.removeChild(task_el);
			
		});
		
		task_delete_el.addEventListener('click', (e) => {

			finished_list_el.removeChild(task_el);
			
		});
		
		

		
		
		
	});
});