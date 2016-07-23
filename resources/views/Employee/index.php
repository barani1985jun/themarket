<!DOCTYPE html>
<html lang="en-US" ng-app="employeeRecords">
	<head>
		<title> Angular Js CRUD </title>
		<link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
		<!-- Javascript Libraries ( Angular JS, JQuery, Bootstrap) -->
		<script src="<?= asset('app/lib/angular/angular.js') ?>"></script>
		<script src="<?= asset('js/jquery.js') ?>"></script>
		<script src="<?= asset('js/bootstrap.min.js') ?>"></script>

		<!-- Angular for employeeRecords Application -->
		<script src= "<?= asset('app/app.js') ?>"></script>
		<script src= "<?= asset('app/controllers/employees.js') ?>"></script>
	</head>

	<body>
		<h2> Employees Database </h2>

		<div ng-controller="employeesController">

			<!-- Table to load the data part -->
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Contact</th>
						<th>Position</th>
						<th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add',0)">Add New Employee</button></th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="employee in employees">
						<td>{{employee.id}}</td>
						<td>{{employee.name}}</td>
						<td>{{employee.email}}</td>
						<td>{{employee.contact_number}}</td>
						<td>{{employee.position}}</td>
						<td><button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit',employee.id)">Edit</button></td>
						<td><button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(employee.id)">Delete</button></td>
					</tr>
				</tbody>
			</table>
			<!-- End of table  -->

			<!-- Form for Add and Edit options -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				 <div class="modal-dialog">
                    <div class="modal-content">
                    	<div class="modal-header">
                    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="
                    			">×</span></button>
                    		<h4 class="modal-title" id="myModalLabel">{{title}}</h4>
                    		<div class="modal-body">

                    			<!-- Form Begins -->
                    			<form name="frmEmployees" class="form-horizontal" novalidate="">
                    				<div class="form-group error">
                                    	<label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    	<div class="col-sm-9">
                                    		<input type="text" class="form-control has error" id="name" name="name" placeholder="Fullname" value="{{name}}" ng-model="employee.name" ng-required="true">
                                        	<span class="help-inline" ng-show="frmEmployees.name.$invalid && frmEmployees.name.$touched"> Name field is required</span>                                        
                                   		 </div>
                                	</div>

                                	<div class="form-group">
	                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
	                                    <div class="col-sm-9">
	                                    	<input type="email" name="email" id="email" value="{{email}}" ng-model="employee.email" required email >
	                                    	<span class="help-inline" ng-show="frmEmployees.email.$invalid && frmEmployee.email.$touched" >
	                                    		<span ng-show="frmEmployees.email.$error.required">Enter email ID</span>
	                                    		<span ng-show="frmEmployees.email.$error.email">Enter valid email ID</span>
	                                    	</span>
	                                    </div>
	                                </div>
	                                 <div class="form-group">
                                    	<label for="inputEmail3" class="col-sm-3 control-label">Contact Number</label>
                                    	<div class="col-sm-9">
                                    		<input type="text" name="contact_number" id="contact_number" value="{{contact_number}}" ng-model="employee.contact_number" placeholder="Contact Number" required >
                                    		<span class="help-inline" ng-show="frmEmployees.email.$invalid && frmEmployee.email.$touched" > Enter valid Phone number </span>
                                    	</div>
                                    </div>

                                    <div class="form-group">
	                                    <label for="inputEmail3" class="col-sm-3 control-label">Position</label>
		                                <div class="col-sm-9">
	                                        <input type="text" class="form-control" id="position" name="position" placeholder="Position" value="{{position}}" 
	                                        ng-model="employee.position" ng-required="true">
	                                    	<span class="help-inline" 
	                                        ng-show="frmEmployees.position.$invalid && frmEmployees.position.$touched">Position field is required</span>
		                                </div>
                                	</div>
                    			</form>
                    			<!-- Form Ends -->

                    		</div>
                    		<div class="modal-footer">
                            	<button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</button>
                       		</div>
                    	</div>
                    </div>
                </div>
			</div>
		
		

	</body>
</html>