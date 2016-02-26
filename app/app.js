var taskMan = angular.module('taskMan', []);

taskMan.controller('tasksController', function($scope, $http){
	
	displayTasks();
	function displayTasks(){
		$http.post('server/displayTasks.php').success(function(data){
			$scope.tasks = data;
		});
	};

	$scope.addTask = function(task){
		$http.post("server/addTask.php?task="+ task ).success(function(){
			displayTasks();
			$scope.newTask = "";
		});
	};

	$scope.deleteTask = function(task){
		if(confirm('Are you sure you want to delete this task?')){
			$http.post("server/deleteTask.php?taskID="+ task).success(function(){
				displayTasks();
			});
		};
	};

	$scope.updateTask = function(id,status){
		if(status == '0'){
		 	status = 1;
		 }else{
		   	status = 0;
		}

		$http.post('server/updateTask.php?id='+ id + '&status='+ status).success(function(){
			displayTasks();
		});
	};
});