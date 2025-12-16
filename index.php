<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meme Menu V. 0.12</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/script.js"></script>
    <script src="js/jquery.js"></script>
    <meta property="og:site_name" content="The Meme Menu" />
	<meta property="og:type" content="Website" />
	<meta property="og:title" content="The Meme Menu" />
	<meta name="author" content="Enadasa (Modifications only)" />
    <meta name="description" content="Official Meme Website of Enadasa">
	<meta name="keywords" content="Enadasa,Youtuber" />
</head>
<body>
    <div class="splash">
        <img src="assets/splash.png"></img>
    </div>
    <div class="main-menu">

    <div class="linkbar">
        <a href="https://www.thefictioncabal.ch">Homepage</a>
        <div style="padding: .5%; color: white; float: right;" id="date"></div>
    </div>

        <div class="grid">
            <div class="ch-c">
                <div class="ch occupied" data-id="senate" data-href="https://youtu.be/Flr54XPBACY">
                    <iframe src=""></iframe>
                    <div class="onhover" onmouseover="hover()" onclick="zip()"></div>
                    <span class="tag">Senate Channel</span></div>
                <div class="ch occupied" data-id="skin-repo" data-href="skin-repo/index.html">
                    <iframe src=""></iframe>
                    <div class="onhover" onmouseover="hover()" onclick="zip()"></div>
                    <span class="tag">Face Channel</span>
                </div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
            </div>
            <div class="ch-c">
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
                <div class="ch blank"></div>
            </div>
        </div>
        <div class="Navigation">
            <img src="assets/prev-default.png" class="prev" />
            <img src="assets/next-default.png" class="next" />
        </div>
        <div class="bottom-bar">
            <div class="lateral left">
                <img src="assets/reload.png" class="wii-btn buttonlike" onclick="location.reload()" />
                <span class="tag">Reload Page</span>
            </div>
            <div class="info" style="color: red;">
                <span class="jg">The Meme Menu</span>
                <span id="hour"></span>
            </div>
            <div class="lateral right">
                <img src="assets/mail-button.png" class="diary-btn buttonlike" onclick="startAudio()" />
                <span class="tag">Update Notes</span>
            </div>
        </div>
    </div>
        <div class="bottom">
            <span id="date2"></span>
            <div class="lateral">
            </div>
        </div>
    </div>

    <div class="ch-selection">
        <div class="thecontent">
            <div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div>
            <img id="videoSpec" src="" />
            <div class="buttons" style="border-top: 8px solid red;">
                <a class="buttonlike" onclick="menuReturn()">Menu</a>
                <a class="buttonlike letsago" onclick="start()">Start</a>
            </div>
        </div>
    </div>

<div class="msgboard">

    <div class="bg"></div>
    <div class="card buttonlike" onclick="letterIn()">
        <span>Update 0.12</span>
    </div>
    <div class="opened">
        <div class="memo">
            <span class="title">Update 0.12</span>
            <div class="lines">
                <?php include 'phplets/update-notes.php' ?>
            </div>
        </div>
        <a class="alt-btn back"><img src="assets/back.png"></a>
    </div>
    <div class="bottom">
        <span id="date2"></span>
        <div class="lateral">
            <img src="assets/reload.png" class="back-btn backtowiimenu buttonlike" />
            <span class="tag">Menu</span>
        </div>

<div class="ui-sfx">
    <audio id="hover" src="assets/audio/button-hover.mp3"></audio>
    <audio id="select" src="assets/audio/button-select.mp3"></audio>
    <audio id="zip" src="assets/audio/zip.mp3"></audio>
    <audio id="back" src="assets/audio/back.mp3"></audio>
    <audio id="start" src="assets/audio/start.mp3"></audio>
    <audio id="nextprev" src="assets/audio/nextprev.mp3"></audio>
    <audio id="letterIn" src="assets/audio/letter-in.mp3"></audio>
    <audio id="chSpec" src=""></audio>
</div>

<script>
    // CHANNEL ART LOAD
    $(document).ready(function() {
        $('.ch.occupied').each(function() {
            var artsrc = 'assets/' + $(this).data('id') + '/channel.html';
            $(this).find('iframe').attr('src', artsrc);
        });
    });

    // CLICKS ON CHANNEL
    $(".main-menu").on("click", ".occupied .onhover", function() {
        var centerX = $(this).offset().left + $(this).width() / 2;
        var centerY = $(this).offset().top + $(this).height() / 2;
        $(".main-menu").css({"transform-origin" : centerX + "px " + centerY + "px 0" });
        $(".ch-selection").css({"transform-origin" : centerX + "px " + centerY + "px 0" });
        $(".main-menu").addClass('ch-trans-on');
    });
    
    $(document).on("click", ".occupied", function() {
        console.log($(this).data('id'));

        var audiosrc = 'assets/' + $(this).data('id') + '/audio.mp3';
        $("#chSpec").attr('src', audiosrc);

        var videosrc = 'assets/' + $(this).data('id') + '/video.gif';
        $("#videoSpec").attr('src', videosrc);

        $("#chSpec")[0].currentTime = 0;
        var currentaudio = document.getElementById("chSpec");
        currentaudio.play();

        $(".letsago").attr('data-start', $(this).data('href'));
        if ($(this).attr("data-href")) {
            $(".letsago").attr('data-start', $(this).data('href'));
        }
        else {
            $(".letsago").addClass("disabled-btn");
        }
    });

    // CHANNEL START
    function start() {
        var audio = document.getElementById("start");
        audio.volume = 0.4; audio.play();
        if ($(".letsago").attr("data-start")) {
            setTimeout(() => {document.body.classList.add("fadeOut");}, 1000);
            setTimeout(() => {window.location.href = $(".letsago").data("start");}, 2000);
        }
        else {
            alert("ERROR: No endpoint has been defined for this channel.");
        }

        var chaudio = $('#chSpec');
        var duration = 1000;
        var steps = 10;

        function decreaseVolume() {
            var initialVolume = chaudio[0].volume;
            var step = initialVolume / steps;
            var delay = duration / steps;

            for (var i = 0; i < steps; i++) {
                setTimeout(function() {
                chaudio[0].volume -= step;
                }, i * delay);
            }
        } decreaseVolume();
    }
    // MESSAGE BOARD
    $(".card.buttonlike").click(event => {
        $(".opened").css("display", "flex");
        $(".bg").css("display", "block");
    });

    $(".alt-btn.back").click(event => {
        $(".opened").css("display", "none");
        $(".bg").css("display", "none");
    });

    $(".backtowiimenu").click(event => {
        $(".msgboard").fadeOut();
    });

    $(".diary-btn").click(event => {
        $(".msgboard").css("display", "flex");
    });
    // RETURNS TO THE MENU
    function menuReturn() {
        var currentaudio = document.getElementById("chSpec");
        currentaudio.pause();
        $("#videoSpec").attr('src', '');

        $(".letsago").removeClass("disabled-btn");

        $(".main-menu").removeClass('ch-trans-on');
        $(".main-menu").addClass('chsout-anim');
        setTimeout(() => {$(".main-menu").removeClass('chsout-anim');}, 1000);
        select(); back(); bgmus();
    }

    //PAGE PREV/NEXT
    $('.prev').on('click', function() {
        nextprev();
        $('.grid').animate({ scrollLeft: '-=' + $('.grid').width() }, 0);
    });

    $('.next').on('click', function() {
        nextprev();
        $('.grid').animate({ scrollLeft: '+=' + $('.grid').width() }, 0);
        
    });

</script>
</body>
</html>
