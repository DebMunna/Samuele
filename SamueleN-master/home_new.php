<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Samuele Nubile</title>
		<meta name="generator" content="Samuele Nubile" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/audio.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
			

		<link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />

	</head>
	
	<body> 
		
		
				
				<div id="content"> 
				<div class="cont">
				<div class="col-md-6" >
					<div class="panel">
						<div class="panel-body">
						<div class="video_b">
							<div>
							<div class="video_s">
       			
<div class="row">
                    <div class="col-sm-8 col-sm-offset-2 video-link medium-paragraph">
                        <a href="#modal-video" class="launch-modal" data-toggle="modal">
                            <span class="video_s"> <span class="video-link-icon_n"><i class="fa fa-play" id="pla"></i></span><img src="img/player.jpg" class="mainv"> </span>  
                                                   </a>
                    </div>
					 
                </div>
				 
				 <div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="modal-video-label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-video">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="960" height="615" src="https://www.youtube.com/embed/Gkz0zoDPClA?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
          
        
 
 </div>
 
        </div></div>
							</div>
							</div>
							</br></br>
							<div class="row">
							<div class="body_f">
								<div class="col-md-7">
								
									<img src="img/samuele.png" width="370px" height="285px"  >
								</div> 
								<div class="col-xs-5">
									<p style="color:#e6a930; font-size:22px; font-weight:bold;">Welcome </br><span style="color:#e6a930; font-size:18px; font-weight:bold;">to my official web site.</span></p></br>
									<p style="font-size:17px;  color:black; margin-top: -5px;">I am Samuele Nubile, musician and composer, multi-intrumentalist. Nowadays I'm busking between Prague and Budapest and i love it, if you want to support me just buy my music from the major stores such a iTunes, GooglePlay, Amazon, Spotify, CDbaby, etc.</p></br> </br>
									<p style="color:#e6a930; font-weight:bold; font-size:18px;margin-top: -28px;">Enjoy my site!</p>
								</div>   
							</div>
						</div>
						</div></div>
				</div> </div></div>
			
	
		<div id="loading" style="display: none"> 
    LOAD... 
    </div>
		
		<script>
showContent('home.php') // страница по умолчанию
</script>
		<script> 
    function showContent(link) { 
        var cont = document.getElementById('content'); 
        var loading = document.getElementById('loading'); 
        cont.innerHTML = loading.innerHTML;   
        var http = createRequestObject(); 
        if( http )  
        { http.open('get', link); 
            http.onreadystatechange = function ()  
            {   if(http.readyState == 4)  
                {   cont.innerHTML = http.responseText;  }    } 
            http.send(null);  } 
        else  
        {  document.location = link;   }   } 
    // ajax объект
    function createRequestObject()  
    {  try { return new XMLHttpRequest() } 
        catch(e)  
        {  try { return new ActiveXObject('Msxml2.XMLHTTP') } 
            catch(e)  
            {   try { return new ActiveXObject('Microsoft.XMLHTTP') } 
                catch(e) { return null; }   } } } 
</script>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js'></script>
		<script type="text/javascript"> 
 var tracks = []
var audio;
var audioPreload;
var preloaded = false;

function playTrack(e) {
  e.preventDefault();
  var track = e.target.href;
  audio.src = track;
  $('#playlist li').removeClass('playing');
  $(e.target).parent().addClass('playing');
  $(audio).on('canplay', function() {
    play();
  })
  preloaded = false;
}


function queueAudio() {
  audioPreload = document.createElement('audio');
  audioPreload.controls = true;
  var track = tracks.indexOf(audio.src) + 1;
  if (tracks.length >= track) {
    audioPreload.src = tracks[track];
  }
  audioPreload.id = 'playbar';
}
function newSong() {
  if (preloaded) {
    var parentEl = audio.parentNode;
    var newTrack = tracks.indexOf(audioPreload.src);
    $('#playlist li').removeClass('playing');
    $($('#playlist').children()[newTrack]).addClass('playing');
    parentEl.replaceChild(audioPreload, audio);
    audio = audioPreload;
    play();
    audio.addEventListener('timeupdate', audioUpdate, false);
    audio.addEventListener('ended', newSong, false);
    preloaded = false;
  } else {
    var track = tracks.indexOf(audio.src) + 1;
    $('#playlist li').removeClass('playing');
    $($('#playlist').children()[track]).addClass('playing');
    audio.src = tracks[track];
  }
}

function audioUpdate() {
  var duration = parseInt(audio.duration),
    currentTime = parseInt(audio.currentTime),
    timeLeft = duration - currentTime;
    progress = (audio.currentTime + 1) / duration;
  if (timeLeft <= 10 && !preloaded) {
    preloaded = true;
    queueAudio();
  }
  TweenMax.set($('.fill'), {
    scaleX: progress
  })
}

// ------- ON LOAD ---------
$(function() {
  FastClick.attach(document.body);
  audio = document.getElementById('playbar');
  audio.addEventListener('timeupdate', audioUpdate, false);
  audio.addEventListener('ended', newSong, false);
  var trackElements = document.getElementsByClassName('track');
  var i;
  for (i = 0; i < trackElements.length; i++) {
    trackElements[i].addEventListener('click', function(e) {
      playTrack(e);
    }, false);
    tracks.push(trackElements[i].href);
  }

  audio.src = tracks[0];
  $(audio).on('canplay', function() {
    play();
    //$($('#playlist').children()[0]).addClass('playing');
  });
});
var pause = function() {
  audio.pause();
  $('#playpause').addClass('fa-play').removeClass('fa-pause');
}
var play = function() {
  audio.play();
  
  $('#playpause').removeClass('fa-play').addClass('fa-pause').removeClass('loading');
  var index = tracks.indexOf(audio.src);
  $('#title').text($($('#playlist a')[index]).text());
  
}
$('#playpause').click(function() {
  if (audio.src) {
    if (audio.paused) {
      play();
    } else {
      pause();
    }
  } else {
    audio.src = tracks[0];
    $(audio).on('canplay', function() {
      play();
    });
  }
})
$('#next').click(function() {
  var track = tracks.indexOf(audio.src);
  if (track == -1) {
    // WAT
  } else if (track >= tracks.length) {
    audio.src = '';
  } else {
    pause();
    $('#playpause').addClass('loading');
    audio.src = tracks[track + 1];
    $('#playlist li').removeClass('playing');
    $($('#playlist').children()[track + 1]).addClass('playing');
    $(audio).on('canplay', function() {
      play();
    });
  }
})
$('#back').click(function() {
  var track = tracks.indexOf(audio.src);
  if (track == -1) {
    // WAT
  } else if (track <= 0 || audio.currentTime > 2) {
    audio.currentTime = 0;
  } else {
    pause();
    $('#playpause').addClass('loading');
    audio.src = tracks[track - 1];
    $('#playlist li').removeClass('playing');
    $($('#playlist').children()[track - 1]).addClass('playing');
    $(audio).on('canplay', function() {
      play();
    });
  }
})
$('.repeat').click(function() {
  var track = tracks.indexOf(audio.src);
  if (track == -2) {
    // WAT
  } else if (track <= 0 || audio.currentTime > 2) {
    audio.currentTime = 0;
  } else {
    pause();
    $('#playpause').addClass('loading');
    audio.src = tracks[track - 1];
    $('#playlist li').removeClass('playing');
    $($('#playlist').children()[track - 1]).addClass('playing');
    $(audio).on('canplay', function() {
      play();
    });
  }
})
$('.shuffle').click(function() {
  var track = tracks.indexOf(audio.src);
  if (track == -4) {
    // WAT
  } else if (track <= 0 || audio.currentTime > 2) {
    audio.currentTime = 0;
  } else {
    pause();
    $('#playpause').addClass('loading');
    audio.src = tracks[track - 1];
    $('#playlist li').removeClass('playing');
    $($('#playlist').children()[track - 1]).addClass('playing');
    $(audio).on('canplay', function() {
      play();
    });
  }
})
$('.menu').click(function() {
  $('#player').toggleClass('show');
});
</script>
		
		<script src="js/bootstrap.min.js"></script>
		<script src="contactform.js"></script>
		<script src="js/scripts.js"></script>
		<script type="text/javascript" src="js/fliplightbox.min.js"></script>
		<script type="text/javascript" src="js/uppod-0.12.10.js"></script>
	<script type="text/javascript"> 
  $(document).ready(function() { 
    $("a.fancyimage").fancybox(); 
  }); 
</script>
	<script type="text/javascript" src="fancybox/jquery.fancybox.pack.js"></script>
	         <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
	      </script>
		  <script>$('.launch-modal').on('click', function(e){
    e.preventDefault();
    $( '#' + $(this).data('modal-id') ).modal();
});</script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
<script> var RecaptchaOptions = { theme : 'dark' }; </script>
<script>
      var recaptcha1;
      var recaptcha2;
      var myCallBack = function() {
        //Render the recaptcha1 on the element with ID "recaptcha1"
        recaptcha1 = grecaptcha.render('recaptcha1', {
          'sitekey' : '6Ldvbx8UAAAAAFhV-DDgB-rHZbJdtsUTTI7I7VNZ', //Replace this with your Site key
          'theme' : 'dark'
        });
        
        //Render the recaptcha2 on the element with ID "recaptcha2"
        recaptcha2 = grecaptcha.render('recaptcha2', {
          'sitekey' : '6Ldvbx8UAAAAAFhV-DDgB-rHZbJdtsUTTI7I7VNZ', //Replace this with your Site key
          'theme' : 'light'
        });
      };
    </script>
	
</body>
</html>