let baseURL = '../controllers';

function loadTasksRequest() {
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: baseURL,
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        resolve(response);
      },
      error: function(error) {
        reject(error);
      }
    });
  });
}

function createTaskRequest(task) {
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: baseURL,
      type: 'POST',
      data: { task: task },
      success: function(response) {
        resolve(response);
      },
      error: function(error) {
        reject(error);
      }
    });
  });
}

function editTaskRequest(taskId, editedTask) {
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: baseURL,
      type: 'PUT',
      data: { id: taskId, task: editedTask },
      success: function(response) {
        resolve(response);
      },
      error: function(error) {
        reject(error);
      }
    });
  });
}

function deleteTaskRequest(taskId) {
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: baseURL,
      type: 'DELETE',
      data: { id: taskId },
      success: function(response) {
        resolve(response);
      },
      error: function(error) {
        reject(error);
      }
    });
  });
}




export { loadTasksRequest, createTaskRequest, editTaskRequest, deleteTaskRequest }