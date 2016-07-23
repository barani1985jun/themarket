/*
* Angular controller script  
* Created On : Apr 14 2016
*/

app.controller('employeesController', function($scope,$http, API_URL) {
	$scope.path=API_URL;
	//console.log($scope.path);
	$http.get(API_URL + 'employees')
	.then (function (response) {
		$scope.employees = response.data;
	}, function (reason) {
		alert('File No t Found');
	});
		
	$scope.toggle = function (modalstate, id) {
		$scope.modalstate = modalstate;
		$scope.id = id;
		switch (modalstate) {
			case 'add':
				$scope.title = "Add New Employee";
				break;
			case 'edit':
				$scope.title = "Employee Detail";
				$http.get(API_URL + 'employees/' + id)
				.success (function (response) {
					console.log(response);
					$scope.employee = response;
				})
				.error (function (reason) {
					alert ('Try Again its not working');
				});
				break;
			default:
				break;
		}
		console.log(id);
		$("#myModal").modal('show');
	}

	$scope.save = function (modalstate, id) {
		
		var url = API_URL + 'employees';
		if ((modalstate === 'edit') && (id > 0)) {
			url += "/" + id;
		}

		$http ({
			method: "POST",
			url: url,
			//params: {id:$routeParams.id}
			params: $.param($scope.employee),
			header: {'Content-Type' : 'application/x-www-form-urlencoded'}
		})
		.success( function(response) {
			console.log($scope.employee);
			console.log(url);
			console.log(response);
			//location.reload();
		})
		.error (function (reason) {
			console.log($scope.employee);
			console.log(url);
			alert ('Try Again');
		});
	}
});