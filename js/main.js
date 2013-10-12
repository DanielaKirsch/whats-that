// Gumby is ready to go
Gumby.ready(function() {
	//Gumby.log('Gumby is ready to go...', Gumby.dump());

	 $('#login').click(function() {
         $('#login').attr("href", $('#login').attr("href") + "?r=" + encodeURIComponent($(location).attr('pathname')));
      });

	

	var asOutput = $('.search.output ul');
	var asOutputLayer = $('.search.output');

	$("#wikipedia").autocomplete({
	    source: function(request, response) {
	        //console.log(request.term);
	        $.ajax({
	            url: "http://en.wikipedia.org/w/api.php",
	            dataType: "jsonp",
	            data: {
	                'action': "opensearch",
	                'format': "json",
	                'search': request.term
	            },
	            success: function(data) {
	               
	                asOutput.empty();
			            	asOutputLayer.addClass('active');
			            	
				                response( $.map( data[1], function( item ) {

				                	return {
				                		label: item
				                		
						              }
					            }));

	            }
	        });
	    }
	})
	.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		 asOutput.append('<li><a href="#" title="'+item.label+'">'+item.label+'</a></li>');
		 return $( "" )
	};


	$.ajax({
	    url: "http://dev-whats-that.de/api/pictures",
	    dataType: "json"
	}).success(function(data){
		
		
		for (var i=0;i<data.length;i++) {

			if (data[i]['title'] == '') {
				tagged = 'nottagged';
			}
			else {
				tagged = 'tagged';
			}

			string = '<div class="element '+data[i]['category']+' '+tagged+'"><a href="#" class="modal1"><img src="upload/'+data[i]['url']+'"></a><div class="title">'+data[i]['title']+'</div></div>';

			$('#allpictures').prepend(string);
		}
		
		createIsotope();
	    
	});


	$( "#allpictures" ).on( "click", "a", function(event) {
  		event.preventDefault();

  		$('#'+$(this).attr('class')).css('opacity',1);
  		$('#'+$(this).attr('class')).css('z-index','999');
  		$('#'+$(this).attr('class')+' .content').css('opacity',1);
  		$('.modal .centered').empty();
		$('.modal .centered').append($(this).find('img').clone());
		$('.modal .centered').append($(this).parent().find('.title').clone());
	});
	 
    $( "html" ).on( "click", ".close", function(event) {  
    	$('.modal').css('opacity',0);
    	$('.modal').css('z-index','-999999');
    	$('.modal .content').css('opacity',0);
	});


    
	 $('.uploadpicture').click(function(event) {
  		event.preventDefault();
  		
  		$('#uploadmodal').css('opacity',1);
  		$('#uploadmodal').css('z-index','999');
  		$('#uploadmodal .content').css('opacity',1);
  		
	});

	 $('.login').click(function(event) {
  		event.preventDefault();
  		
  		$('#loginmodal').css('opacity',1);
  		$('#loginmodal').css('z-index','999');
  		$('#loginmodal .content').css('opacity',1);
  		
	});

	 $('.profile').click(function(event) {
  		event.preventDefault();
  		
  		$('#modalbadges').css('opacity',1);
  		$('#modalbadges').css('z-index','999');
  		$('#modalbadges .content').css('opacity',1);
  		
	});


	// $("#artist").autocomplete({
	//     source: function(request, response) {
	//         console.log(request.term);
	//         $.ajax({
	//             url: "http://dev-.php",
	//             dataType: "jsonp",
	//             data: {
	//                 'action': "opensearch",
	//                 'format': "json",
	//                 'search': request.term
	//             },
	//             success: function(data) {
	//                 response(data[1]);
	//             }
	//         });
	//     }
	// });
	
	function createIsotope() {
			// cache container
			var $container = $('#allpictures');
			// initialize isotope
			$container.isotope({
			  // options...
			});

			// filter items when filter link is clicked
			$('#filters a').click(function(){
			  var selector = $(this).attr('data-filter');
			  $('#filters a').removeClass('active');
			  $(this).addClass('active');
			  $container.isotope({ filter: selector });
			  return false;
			});

	}


	// placeholder polyfil
	if(Gumby.isOldie || Gumby.$dom.find('html').hasClass('ie9')) {
		$('input, textarea').placeholder();
	}

	// skip link and toggle on one element
	// when the skip link completes, trigger the switch
	$('#skip-switch').on('gumby.onComplete', function() {
		$(this).trigger('gumby.trigger');
	});

// Oldie document loaded
}).oldie(function() {
	Gumby.warn("This is an oldie browser...");

// Touch devices loaded
}).touch(function() {
	Gumby.log("This is a touch enabled device...");
});
