 // Snackbar
 var showAlert = function(type, body, title = null) {
    function getBackgroundColor() {
        switch (type) {
            case 'success':
                return '#28a745';
                break;

            case 'info':
                return '#007bff';
                break;

            case 'danger':
                return '#dc3545';
                break;

            default:
                return '#323232';
                break;
        }
    }
    Snackbar.show({
        text: body
        , pos: 'bottom-center'
        , backgroundColor: getBackgroundColor(),
        actionTextColor: type == 'default' ? '#4CAF50' : '#ffc107',
        textSize: 16, // set the text size to 16 (or any other value as desired)
            padding: 12, // set the padding to 12 (or any other value as desired)
            borderRadius: 4, // set the border radius to 4 (or any other value as desired)
            textColor: '#ffffff', // set the text color to white
            duration: Snackbar.LENGTH_SHORT, // set the duration of the Snackbar
            duration: 5000,
            animation: {
                translateY: 0 // remove the default animation
            },
            width: '90%', // set the width of the Snackbar to 90% of the screen
            maxWidth: '300px' // set the maximum width of the Snackbar to 300px
    });
}




//clock script
const clocks = document.getElementsByClassName("clock");

function updateClocks() {
  for (let clock of clocks) {
    let timezone = clock.dataset.timezone;
    let time = new Date().toLocaleTimeString("en-US", {
      hour: '2-digit',
      minute: '2-digit',
      //second: '2-digit',
      timeZone: timezone
    });
    clock.textContent = time;
  }
}

// Update every minute:
setInterval(updateClocks, 60000);
updateClocks();


//Counter script





//Register Form Script
// Check box
$('#terms_and_condition').click(function () {
  //check if checkbox is checked
  if ($(this).is(':checked')) {

      $('#btn-submit').removeAttr('disabled'); //enable input

  } else {
      $('#btn-submit').attr('disabled', true); //disable input
  }
  });




  // Check box married
  $(function(){
    $('input[type="radio"][name="marital_status"]').click(function(){
        if($(this).val() == 'married'){
            $('#hidechildinfodiv').show();
            $('#hidespouseinfo').show();
        } else if($(this).val() == 'single'){
            $('#div').show();
            $('#hidespouseinfo').hide();
        } else {
            $('#div').hide();
            $('#hidespouseinfo').hide();
        }
    });
});


    $(function(){
    $('#haschild').click(function(){
      if($(this).is(':checked')){
        $('#hidechildinfo').show();

      }else{
        $('#hidechildinfo').hide();
      }
    });
   });
   $(function(){
    $('#no').click(function(){
      if($(this).is(':checked')){
        $('#diffadress').show();

      }else{
        $('#diffadress').hide();
      }
    });
   });



// //  Date Picker register form
// function ageCalculator() {
//   var userinput = document.getElementById("dob").value;
//   var dob = new Date(userinput);
//   if(userinput==null || userinput=='') {
//     document.getElementById("datePickerMessage").innerHTML = "**Choose a date please!";
//     return false;
//   } else {

//   //calculate month difference from current date in time
//   var month_diff = Date.now() - dob.getTime();

//   //convert the calculated difference in date format
//   var age_dt = new Date(month_diff);

//   //extract year from date
//   var year = age_dt.getUTCFullYear();

//   //now calculate the age of the user
//   var age = Math.abs(year - 1970);

//   //display the calculated age
//   return document.getElementById("datePickerMessage").innerHTML =
//          'Age is ' + age + " years.";
//   }
// }

// Register form script end



// Counter
$(document).ready(function($) {
  //Check if an element was in a screen
  function isScrolledIntoView(elem) {
      var docViewTop = $(window).scrollTop();
      var docViewBottom = docViewTop + $(window).height();
      var elemTop = $(elem).offset().top;
      var elemBottom = elemTop + $(elem).height();
      return ((elemBottom <= docViewBottom));
  }
  //Count up code
  function countUp() {
      $('.counter').each(function() {
          var $this = $(this), // <- Don't touch this variable. It's pure magic.
              countTo = $this.attr('data-count');
          ended = $this.attr('ended');

          if (ended != "true" && isScrolledIntoView($this)) {
              $({
                  countNum: $this.text()
              }).animate({
                  countNum: countTo
              }, {
                  duration: 1500, //duration of counting
                  easing: 'swing',
                  step: function() {
                      $this.text(Math.floor(this.countNum));
                  },
                  complete: function() {
                      $this.text(this.countNum);
                  }
              });
              $this.attr('ended', 'true');
          }
      });
  }
  //Start animation on page-load
  if (isScrolledIntoView(".counter")) {
      countUp();
  }
  //Start animation on screen
  $(document).scroll(function() {
      if (isScrolledIntoView(".counter")) {
          countUp();
      }
  });
});




// popup model

function togglePopup(n) {
  document.getElementById("popup-" + n).classList.toggle("active");
}

// NEw Nav bar

$(function() {

  var siteSticky = function() {
		$(".js-sticky-header").sticky({topSpacing:0});
	};
	siteSticky();

	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
		});


		setTimeout(function() {

			var counter = 0;
      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);

        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();

    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		})

		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
	    }
		});
	};
	siteMenuClone();

});
