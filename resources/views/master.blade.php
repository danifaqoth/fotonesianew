<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>FOTONESIA</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" >

	<link rel="stylesheet" href="/css/bootstrap-theme.min.css">


    <link rel="stylesheet" href="/css/font-awesome.min.css">


    <link rel="stylesheet" href="/css/select2.min.css">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/custom.css">


	@yield("head")

</head>
<body>
    @include('inc/messages') 
	@include('partials.header')

	@yield('content')
	
	@include('partials.footer')

	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery-3.2.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>

    <script src="/js/select2.min.js"></script>

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


    <script>
        $(document).ready(function(){

            $("[rel='tooltip']").tooltip();    

            $('#hover-cap-4col .thumbnail').hover(
                function(){
                    $(this).find('.caption').slideDown(250);
                },
                function(){
                    $(this).find('.caption').slideUp(250);
                }
                );    

        });
    </script>
    
    <script type="text/javascript" src="/js/custom.js"></script>
    
   
    @yield('foot')
       
</body>
</html>

