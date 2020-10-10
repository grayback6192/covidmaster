<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="/dashboard/">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/dashboard/battle">Battle</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Configuration
				</a>
			</li>
		</ul>
		<span class="my-lg-0" style="color: white">
			<p>Welcome, <?php echo $this->Session->read('user.Account.name') ?> | <strong><a href="/account/signout">Sign Out</a></strong></p>
		</span>
	</div>
</nav>