import { loadTasksRequest, createTaskRequest, editTaskRequest, deleteTaskRequest } from "./ajaxRequests.js"

$(document).ready(function() {
  loadTasks();

  $('#formCreate').submit(function(event) {
    event.preventDefault();
    let task = $('#taskInput').val().trim();
    if (task !== '') {
      createTask(task);
    }
    $('#taskInput').val('');
  });

  async function loadTasks() {
    try {
      const data = await loadTasksRequest();

      const taskList = $('#taskList');
      taskList.empty();

      if (data.length === 0) {
        taskList.append('<li class="empty">Lista vazia</li>');
      } else {
        $.each(data, function(index, task) {
          const listItem = createTaskListItem(task);
          taskList.append(listItem);
        });
      }
    }
    catch (error) {
      console.log(error);
    }
  }

  async function createTask(task) {
    try{
      await createTaskRequest(task);
      await loadTasks();
    }
    catch (error) {
      console.log(error);
    }
  }

  async function editTask(taskId, task) {
    try {
      await editTaskRequest(taskId, task);
      await loadTasks();
    }
    catch(error) {
      console.log(error);
    }
  }

  async function deleteTask(taskId) {
    try {
      await deleteTaskRequest(taskId);
      await loadTasks();
    }
    catch(error) {
      console.log(error);
    }
  }

  function createTaskListItem(task) {
    let listItem = $('<li>');
    listItem.text(task.name);

    let buttonGroup = $('<div class="button-group">');

    let editButton = $('<button class="edit-btn">Editar</button>');
    editButton.click(function() {
      openModal(task.id, task.name);
    });

    let deleteButton = $('<button class="delete-btn">Excluir</button>');
    deleteButton.click(function() {
      deleteTask(task.id);
    });

    buttonGroup.append(editButton, deleteButton);
    listItem.append(buttonGroup);

    return listItem;
  }

  function openModal(taskId, task){
    $('#taskNameInput').val(task);
    $('#modalTaskId').val(taskId);
    $('#editModal').show();
  }

  function closeModal(){
    $('#editModal').hide();
    $('#taskNameInput').val('');
    $('#modalTaskId').val();
  }

  $('#save-btn').click( function() {
    const taskId = $('#modalTaskId').val();
    const task = $('#taskNameInput').val();

    if (task !== '') {
      editTask(taskId, task)
      closeModal();
    }
  });
  
  $('#cancel-btn').click(function() {
    closeModal();
  });
});
