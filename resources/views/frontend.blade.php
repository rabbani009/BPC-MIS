<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        // Colors
        $text: white;
        $link: #e34234;
        $link-hover: #ba160c;

        canvas {
            display: block;
            vertical-align: bottom;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;

            background: {
                image: url(https://marcbruederlin.github.io/particles.js/img/background.jpg);
                position: bottom;
                repeat: no-repeat;
                color: black;
                size: cover;
            }
        }

        .text {
            color: $text;
            max-width: 90%;
            padding: 2em 3em;
            background: rgba(0, 0, 0, 0.45);
            text-shadow: 0px 0px 2px #131415;
            font-family: 'Open Sans', sans-serif;
        }

        .text a {
            text-decoration: none;
            color: white;
            font-size: 34px;
        }

        .text a:hover {
            color: #0e84b5;
            cursor: pointer;
        }

        h1 {
            font-size: 2.25em;
            font-weight: 700;
            letter-spacing: -1px;
        }

        a,
        a:visited {
            color: $link;
            transition: 0.25s;
        }

        a:hover,
        a:focus {
            color: $link-hover;
        }

        .min-height-100vh {
            min-height: 100vh;
        }

        #my-canvas {
            position: absolute;
            width: 100%;
            height: 100%;
        }

    </style>
</head>
<body>
    <div id="particles-js"></div>
    <canvas id="my-canvas" class="custom-canvas"></canvas>

    <div class="content-wrappwer d-flex flex-column align-items-center justify-content-center min-height-100vh position-relative">
        <button class="btn btn-success mb-4" onClick={showCanvas()}>Grand Opening</button>
        <div class="text">
            <a href="{{route('get.login')}}">Bangladesh Business Promotion Council</a>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js" integrity="sha512-Kef5sc7gfTacR7TZKelcrRs15ipf7+t+n7Zh6mKNJbmW+/RRdCW9nwfLn4YX0s2nO6Kv5Y2ChqgIakaC6PW09A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>


    <script>
        const canvas = document.getElementById('my-canvas')
        const jsConfetti = new JSConfetti({
            canvas
        })

        var duration = 15 * 1000;
        var color = '#75A5B7';
        var maxParticles = 80;

        // canvas-confetti
        function showCanvas() {
            var end = Date.now() + duration;

            // go Buckeyes!
            var colors = ['#bb0000', '#ffffff'];

            jsConfetti.addConfetti({
                emojis: ['🎈', '🎉', '🎈', '🎉', '🎈']
                , emojiSize: 30
                , confettiNumber: 80
                , confettiRadius: 500
            });

            (function frame() {
                confetti({
                    particleCount: 2
                    , angle: 60
                    , spread: 55
                    , origin: {
                        x: 0
                    }
                    , colors
                    , shapes: ['square', 'circle', 'star']

                });
                confetti({
                    particleCount: 2
                    , angle: 120
                    , spread: 55
                    , origin: {
                        x: 1
                    }
                    , colors
                    , shapes: ['square', 'circle', 'star']
                });

                if (Date.now() < end) {
                    requestAnimationFrame(frame);
                }
            }());
        }


        // ParticlesJS Config.
        particlesJS('particles-js', {
            'particles': {
                'number': {
                    'value': maxParticles
                    , 'density': {
                        'enable': true
                        , 'value_area': (maxParticles * 10) * 2
                    }
                }
                , 'color': {
                    'value': color
                }
                , 'shape': {
                    'type': 'circle'
                    , 'stroke': {
                        'width': 0
                        , 'color': '#000000'
                    }
                    , 'polygon': {
                        'nb_sides': 5
                    }
                , }
                , 'opacity': {
                    'value': 0.5
                    , 'random': false
                    , 'anim': {
                        'enable': false
                        , 'speed': 1
                        , 'opacity_min': 0.1
                        , 'sync': false
                    }
                }
                , 'size': {
                    'value': 3
                    , 'random': true
                    , 'anim': {
                        'enable': false
                        , 'speed': 40
                        , 'size_min': 0.1
                        , 'sync': false
                    }
                }
                , 'line_linked': {
                    'enable': true
                    , 'distance': 150
                    , 'color': color
                    , 'opacity': 1
                    , 'width': 1
                }
                , 'move': {
                    'enable': true
                    , 'speed': 2
                    , 'direction': 'none'
                    , 'random': false
                    , 'straight': false
                    , 'out_mode': 'out'
                    , 'bounce': false
                    , 'attract': {
                        'enable': false
                        , 'rotateX': 600
                        , 'rotateY': 1200
                    }
                }
            }
            , 'interactivity': {
                'detect_on': 'canvas'
                , 'events': {
                    'onhover': {
                        'enable': true
                        , 'mode': 'grab'
                    }
                    , 'onclick': {
                        'enable': true
                        , 'mode': 'push'
                    }
                    , 'resize': true
                }
                , 'modes': {
                    'grab': {
                        'distance': 140
                        , 'line_linked': {
                            'opacity': 1
                        }
                    }
                    , 'bubble': {
                        'distance': 400
                        , 'size': 40
                        , 'duration': 2
                        , 'opacity': 8
                        , 'speed': 3
                    }
                    , 'repulse': {
                        'distance': 200
                        , 'duration': 0.4
                    }
                    , 'push': {
                        'particles_nb': 4
                    }
                    , 'remove': {
                        'particles_nb': 2
                    }
                }
            }
            , 'retina_detect': true
        });

    </script>
</body>
</html>
