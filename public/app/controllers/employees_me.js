/*
* Angular controller script  
* Created On : Apr 14 2016
*/

app. controller ('employeeController', function ($scope, $http, API_URL) {
		
		var errorMsg = '';
		var successCallback = function (response) {
			$scope.employees = response.data;
		};

		var errorCallback = function (reason, msg) {
			errorMsg = 'File Not Found Try Again !';
			$scope.error = errorMsg;
			//$scope.error = reason.data;
		};

		/*	Retrive Employees List from server */		
		$http ({
			method:'get',
			url: API_URL })
		.then(successCallback,errorCallback);

		
		/*	Show Modal Form */

		
		/* Save or Update employee Record */
		$scope.save = function (modelstate ,id){

			var url = API_ULR + 'employees';
			var methodUsed = 'POST';
			if(modelstate === 'edit') {
				url = "/" + id;
				methodUsed = 'PUT';
			}
			$http ({
				method: methodUsed,
				url: url,
				data: $.param($scope.employee),
				headers: { 'Content-Type' : 'application/x-www-form-urlencode'}
			}) .
			   success( function (response) {
			   		console.log = response;
			   		location.reload();
			   }) .
			   error (function (reason) {
			   		console.log = response;
			   		alert('Oops error occured Try Again !');
			   });
		}


		/* Delete a employee record */		
		$scope. confirmDelete = function (id) {
			var isconfirmDelete = confirm ( 'Are you sure to delete this record ? ');
			errorMsg = ' Unable to delete Try Again '; 
			if (isconfirmDelete) {
				$http({
					method: 'DELETE',
					url: API_URL + 'employees/' + id
				}) . 
					success (function (response) {
						console.log(response);
						location.reload ();
					}) .
					error (function (response) {
						console.log(response);
						alert('Unable to delete Try Again');
					});
			} else {
				return false;
			}
		}
});