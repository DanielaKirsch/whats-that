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
	               asOutput.show();
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

			string = '<div class="element '+data[i]['category']+' '+tagged+'"><a href="#" class="modal1"><img src="upload/'+data[i]['url']+'"></a><div class="title">'+data[i]['title']+'</div><div class="my_pid">'+data[i]['pid']+'</div></div>';

			$('#allpictures').prepend(string);
		}
		
		createIsotope();
	    
	});


	function getWikipediaArticle() {
		//http://en.wikipedia.org/w/api.php?format=json&action=query&titles=cat&prop=revisions&rvprop=content

		var searchTerm= $('#modal1 .ten .title').text();
var url="http://en.wikipedia.org/w/api.php?action=parse&format=json&page=" + searchTerm+"&redirects&prop=text&callback=?";
$.getJSON(url,function(data){
	
  wikiHTML = data.parse.text["*"];
  console.log(wikiHTML);
  $wikiDOM = $("<document>"+wikiHTML+"</document>");
  $("#result").append($wikiDOM.html());

  //$("#result").append(wikiHTML);
});


// $.getJSON("http://en.wikipedia.org/w/api.php?action=parse&amp;format=json&amp;callback=?", {page:pageName, prop:"text"}, wikipediaHTMLResult);
// 		$.ajax({
// 		    url: "http://en.wikipedia.org/w/api.php?format=json&action=query&titles=cat&prop=revisions&rvprop=content&rvsection=0",
// 		    dataType: "jsonp"
// 		}).success(function(data){
			
// 			console.log(data['query']['pages']);
			
			

// 		});

	}


	$( "#allpictures" ).on( "click", "a", function(event) {
  		event.preventDefault();

  		$('#modal1').css('opacity',1);
  		$('#modal1').css('z-index','999');
  		$('#modal1 .content').css('opacity',1);
  		$('#modal1 .centered').empty();
  		$('#result').empty();
  		$('#modal1 .centered').append($(this).parent().find('.title').clone());
		$('#modal1 .centered').append($(this).find('img').clone());
		//$('#modal1 .centered .title').wrap('<div class="thinksthat"></div>');
		//$('#modal1 .centered .title').prepend('<h1>Daniela thinks this is </h1>');

		$('#tagged_pid').attr('value',$(this).parent().find('.my_pid').text());

		if($(this).parent().find('.my_pid').text() != '') {
			$('#result').empty();
			// get wikipedia article
			getWikipediaArticle();
		}

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

	$('.wikipedia-tag').hide();

	$( "html" ).on( "click", ".search.output li", function(event) { 
		event.preventDefault();
    	
    	tag = $(this).find('a').attr('title');

    	$('.wikipedia-tag').show();
    	$('.wikipedia-tag .the_value').empty();
    	$('.wikipedia-tag .the_value').append(tag);

    	$('#tagged_title').attr('value', tag);


		$('.search.output ul').hide();

	});






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
