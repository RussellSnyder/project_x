<html>
    <head>
<!-- bootstrap styles -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- font awesome -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<!-- my styles -->
        <link rel="stylesheet" href="/style.css" type="text/css" media="all">

<!-- jquery -->
<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<!-- bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>
		<div class="container">
			<nav class="navbar navbar-default">
			        <div class="container-fluid">
			          <div class="navbar-header">
			            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			              <span class="sr-only">Toggle navigation</span>
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
			            </button>
			            <a class="navbar-brand" href="list.html">Project X</a>
			          </div>
			          <div id="navbar" class="navbar-collapse collapse">
			            <ul class="nav navbar-nav">
			              <li class=""><a href="list.html">list</a></li>
  						  <li><a href="#" data-toggle="modal" data-target="#notesModal">notes</a></li>
  						  <li><a href="static/test.htm">staic page</a></li>

			            </ul>
			          </div><!--/.nav-collapse -->
			        </div><!--/.container-fluid -->
			      </nav>

		</div>
		<div class="container">

			<div class="col-md-10 col-md-offset-1">			
		        <?= $routeOutput; ?>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="notesModal" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Russell's Notes</h4>
						</div>
						<div class="modal-body">
							<p>JQuery is used on buttons and forms to reduce overall clutter and help the user focus on the information at hand.</p>
 							<p>Plain strings will be output if you enter <b>string:</b> at the start of the url</p>
 							<p>Static files can be used and by putting files into the static folder and using a '.htm' suffix on file names</p>


#### advanced specific assignment

* If the list has more than X entries it gets somewhat confusing, add the possibility to page through the list.
* Add the possibility to specify a sorting order in the orders list

### general assignment

* Enhance the project X Framework so that plain strings can be returned by a arbitrary route
* Enhance the project X Framework to also accept htm files as routing directives
* Enhance the project X Framework to be able to show only the route's content without a base template</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>

				</div>
			</div>

		</div>
<!-- custom js -->
        <script src="/script.js"></script>
    </body>
</html>