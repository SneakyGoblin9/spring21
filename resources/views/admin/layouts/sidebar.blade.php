<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

	<div class="c-sidebar-brand d-lg-down-none">

		<div class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
			{{-- <img src="#" height="50" alt="Logo"> --}}
			<h3 class="text-success">21SpringMM</h3>
		</div>
		<div class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
			{{-- <img src="#" height="50" alt="Logo"> --}}
			<h5 class="text-success">21SM</h5>
		</div>

	</div>

	<ul class="c-sidebar-nav">


		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{ route('home') }}">
				<i class="c-sidebar-nav-icon cil-speedometer"></i> Dashboard
			</a>
		</li>
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="/admin/posts">
				<i class="c-sidebar-nav-icon fas fa-blog"></i> Posts
			</a>
		</li>

		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{ route('categories.index') }}">
				<i class="c-sidebar-nav-icon fas fa-layer-group"></i> Category
			</a>
		</li>

		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{ route('images.index') }}">
				<i class="c-sidebar-nav-icon fa fa-images"></i> Gallery
			</a>
		</li>

		{{-- <li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{ route('donations.index') }}">
		<i class="c-sidebar-nav-icon fa fa-donate"></i> Donation
		</a>
		</li> --}}

		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{ route('contact.index') }}">
				<i class="c-sidebar-nav-icon far fa-envelope"></i> Contact
			</a>
		</li>

		<li class="c-sidebar-nav-title">Settings</li>

		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{ route('users.index') }}">
				<i class="c-sidebar-nav-icon far fa-user"></i> User
			</a>
		</li>

		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{ route('roles.index') }}">
				<i class="c-sidebar-nav-icon cil-shield-alt"></i> Roles
			</a>
		</li>


	</ul>
	<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
		data-class="c-sidebar-minimized"></button>
</div>