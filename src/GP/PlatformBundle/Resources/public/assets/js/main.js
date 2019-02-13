
$(document).ready(function(){
	
	"use strict";
	
	// Loader
	$("body").imagesLoaded().always(function(instance){
		$(".loader").delay(300).fadeOut(500);
	});
	
	// Navigation
	var navigation = new Navigation(document.getElementById("navigation"),{
		scrollSpy: true,
		scrollSpyOffset: -60
	});
	
	var links = navigation.getElementsByClassName("navigation-link");
	for(var i = 0; i < links.length; i++){
		links[i].addEventListener("click", navigation.toggleOffcanvas);
	}
	
	var scrollPosY = window.pageYOffset | document.body.scrollTop;
	if(scrollPosY > 50){
		navigation.classList.remove("navigation-transparent");
		navigation.classList.add("shadow-sm");
	} 
	window.onscroll = function(){
		scrollPosY = window.pageYOffset | document.body.scrollTop;
		if (scrollPosY > 50) {
			navigation.classList.remove("navigation-transparent");
			navigation.classList.add("shadow-sm");
		} 
		else{
			navigation.classList.add("navigation-transparent");
			navigation.classList.remove("shadow-sm");
		}
	}
	
	// Form validation
	$("#contact-form").validate({
		//errorLabelContainer: $("#error-container"),
		rules: {
            name: {
                required: true,
                minlength: 2,
                lettersonly: true
            },
            email: {
                required: true,
                minlength: 6,
                email: true
            },
			subject: {
                required: true,
                minlength: 2
            },
			message: {
                required: true,
                minlength: 6
            }
		},
		messages: {
            name: {
                required: "Please enter your name",
                minlength: "Minimum 2 characters",
                lettersonly: "Only letters please!"
            },
            email: {
                required: "Please enter your email address",
                minlength: "Minimum 6 characters",
                email: "That's an invalid email"
            },
			subject: {
                required: "Please enter the subject",
                minlength: "Minimum 2 characters"
            },
			message: {
                required: "Please enter your message",
                minlength: "Minimum 6 characters"
            }
		},
		/*success: function(label) {
            label.addClass("valid").html("<span class='text-capitalize'>" + $(label).attr("for") + ": Ok</span>");
        },*/
		submitHandler: function(element) {

            var ajaxform = $(element),
                url = ajaxform.attr('action'),
                type = ajaxform.attr('method'),
                data = {},
				buttonText;
				
			buttonText = $(ajaxform).find('[name="submit"]').text();
            $(ajaxform).find('[name="submit"]').html('Sending...');


            ajaxform.find('[name]').each(function(index, value) {
                var field = $(this),
                    name = field.attr('name'),
                    value = field.val();

                data[name] = value;

            });

            $.ajax({
                url: url,
                type: type,
                data: data,
                success: function(response) {
                    if (response.type == 'success') {
                        $("#contact-form").before("<div class='alert alert-success alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + response.text + "</div>");
                        $(ajaxform).each(function() {
                            this.reset();
                            $(this).find('[name="submit"]').html('Message sent');
                        }).find('.valid').each(function() {
                            $(this).remove('label.valid');
                        })
                    } else if (response.type == 'error') {
                        $("#contact-form").before("<div class='alert alert-danger alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + response.text + "</div>");
                        $(ajaxform).find('[name="submit"]').text(buttonText);
                    }
                }
            });

            return false;
        }
	});
	
	// Form validation
	function scrollMenu(){
		if($(window).scrollTop() > 120){
			$(".to-top").addClass("visible");
		}
		else{
			$(".to-top").removeClass("visible");
		}
	}
	scrollMenu();
	$(window).on("scroll", function(){
		scrollMenu();
	});
	$(".to-top").on("click", function(){
		$("html, body").animate({
			scrollTop: 0
		}, 800);
	});
	
});