<head>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>

<header>  
	<nav class="navbar navbar-default nav-header">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo" href="/"><img src="/image/logo/fotonesia.png" alt="logo"></a>		
			</div>

			<div class="collapse navbar-collapse" id="main-navbar">
				<form class="navbar-form navbar-left main-form search" method="get" id="search-form">
					<div class="input-group input-search">
						<input type="text" class="form-control search-field search " placeholder="Cari Fotografer" id="q" name="q">
						<span class="input-group-btn btn-search">
							<button class="btn btn-default search_button search" type="submit">
								<div class="search">
									<i class="fa fa-search"></i>
								</div>
							</button>
						</span>    
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					@if (auth()->check())
						<li>
							<a href="{{ auth()->user()->role == 'vendor' 
								? route('vendor.profil') 
								: route('member.profil') }}"> Hi, {{ !empty(auth()->user()->first_name)
								? auth()->user()->first_name
								: auth()->user()->metas->where('key', 'name_vendor')->first()['value']
							}}</a>

							{{-- <a href="{{ auth()->user()->role == 'vendor' 
								? route('vendor.profil') 
								: route('member.profil') }}"
							>
								<i class="fa fa-btn fa-user"></i>
								<strong>Profil</strong>
							</a> --}}
						</li>
						<li><a href=" {{ route('vendor.inbox') }} "><i class="fa fa-btn fa-envelope-o" aria-hidden="true"></i></a></li>
						<li><a href="{{ route('logout') }}"><i class="fa fa-btn fa-sign-out"></i><strong> Logout</strong></a></li>
					@else
						<li><a href="{{ route('login') }}"><strong> Daftar / Masuk</strong></a></li>

					@endif
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav>
</header>


<script src="{{ asset('/js/jquery-3.2.0.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
	
	$(function()
	{
		$( "#q" ).autocomplete({
			source: "{{ route('vendor.getAll') }}",
			minLength: 3,
			select: function(event, ui) {
				$('#q').val(ui.item.value);
				window.location.href = '/vendors/profil/' + ui.item.id;
			}
		});

		$('#q').data( "ui-autocomplete")._renderItem = function(ul, item)
		{
			var $li = $("<li style='width:650px; margin-left:8px; margin-bottom:5px; margin-top:5px' >"),
			$img = $("<img style='width:10%'> ");

			$img.attr({
				src: '{{ asset('/uploads/avatars') }}' + '/' + item.avatar,
				alt: item.avatar
			});

			$li.attr('data-value', item.value);
			$li.append("");
			$li.append($img).append(""+ item.value);
			return $li.appendTo(ul);
		};
	});

</script>