<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/cool_stuff">Cool Stuff</a>
                </li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#assignments" role="button" aria-expanded="false">Assignments<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/assign01">Assign 01</a>
                        </li>
                        <li><a href="/php_survey/">PHP Survey</a>
                        </li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="team" rol="button" aria-expanded="false">Class Activities<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/activity1">Post Method</a>
                        </li>
                        <li><a href="/activity2">Cookies</a>
                        </li>
                        <li><a href="/activity4">Scripture DB</a>
                        </li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="projects" rol="button" aria-expanded="false">Projects<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/valient_11">Valient 11</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
		        <?php 
			        if (isset($_SESSION["firstname"]))
			        {
			        	echo "<li role='presentation' class='dropdown'>
							     <a class='dropdown-toggle' data-toggle='dropdown' href='#classes' role='button' aria-expanded='false'>" . $_SESSION["firstname"] . "<b class='caret'></b></a>
							<ul class='dropdown-menu' role='menu'>
								<li><a href='#'>My Account</a></li>";
								if(isset($_SESSION["admin"]) || isset($_SESSION["student"]))
									echo "<li><a href='/valient_11'>Valient 11</a></li>";
							echo "<li><a href='/logout.php'>Logout</a></li>
							</ul>
						</li>";
			        }
			        else
			        {
			        	echo "<li><a href='/login'>Login</a></li>";
					}
		        ?>
		      </ul>
        </div>
    </div>
</nav>