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
			              <li><a href="test.html">Test</a></li>
			            </ul>
			            <ul class="nav navbar-nav navbar-right">
			              <li class=""><a href="#">Add New Order</a></li>
			              <li class=""><a href="#">Add New Order Position</a></li>
			            </ul>
			          </div><!--/.nav-collapse -->
			        </div><!--/.container-fluid -->
			      </nav>

		</div>
		<div class="container"> 
			<div class="col-md-10 col-md-offset-1">			
		        <?= $routeOutput; ?>
			</div>
		</div>
<!-- custom js -->
        <script src="/script.js"></script>
    </body>
</html>