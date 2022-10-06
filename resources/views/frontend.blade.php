<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

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
            position: absolute;
            top: 50%;
            right: 50%;
            transform: translate(50%,-50%);
            color: $text;
            max-width: 90%;
            padding: 2em 3em;
            background: rgba(0, 0, 0, 0.45);
            text-shadow: 0px 0px 2px #131415;
            font-family: 'Open Sans', sans-serif;
        }

        .text a{
            text-decoration: none;
            color: white;
            font-size: 34px;
        }
        .text a:hover{
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
    </style>
</head>
<body>
<div id="particles-js"></div>

<div class="text">
    <a href="{{route('get.login')}}">Bangladesh Business Promotion Council</a>
</div>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"
    integrity="sha512-Kef5sc7gfTacR7TZKelcrRs15ipf7+t+n7Zh6mKNJbmW+/RRdCW9nwfLn4YX0s2nO6Kv5Y2ChqgIakaC6PW09A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>
<script>
    var color = '#75A5B7';
    var maxParticles = 80;

    // ParticlesJS Config.
    particlesJS('particles-js', {
        'particles': {
            'number': {
                'value': maxParticles,
                'density': {
                    'enable': true,
                    'value_area': (maxParticles * 10) * 2
                }
            },
            'color': {
                'value': color
            },
            'shape': {
                'type': 'circle',
                'stroke': {
                    'width': 0,
                    'color': '#000000'
                },
                'polygon': {
                    'nb_sides': 5
                },
            },
            'opacity': {
                'value': 0.5,
                'random': false,
                'anim': {
                    'enable': false,
                    'speed': 1,
                    'opacity_min': 0.1,
                    'sync': false
                }
            },
            'size': {
                'value': 3,
                'random': true,
                'anim': {
                    'enable': false,
                    'speed': 40,
                    'size_min': 0.1,
                    'sync': false
                }
            },
            'line_linked': {
                'enable': true,
                'distance': 150,
                'color': color,
                'opacity': 1,
                'width': 1
            },
            'move': {
                'enable': true,
                'speed': 2,
                'direction': 'none',
                'random': false,
                'straight': false,
                'out_mode': 'out',
                'bounce': false,
                'attract': {
                    'enable': false,
                    'rotateX': 600,
                    'rotateY': 1200
                }
            }
        },
        'interactivity': {
            'detect_on': 'canvas',
            'events': {
                'onhover': {
                    'enable': true,
                    'mode': 'grab'
                },
                'onclick': {
                    'enable': true,
                    'mode': 'push'
                },
                'resize': true
            },
            'modes': {
                'grab': {
                    'distance': 140,
                    'line_linked': {
                        'opacity': 1
                    }
                },
                'bubble': {
                    'distance': 400,
                    'size': 40,
                    'duration': 2,
                    'opacity': 8,
                    'speed': 3
                },
                'repulse': {
                    'distance': 200,
                    'duration': 0.4
                },
                'push': {
                    'particles_nb': 4
                },
                'remove': {
                    'particles_nb': 2
                }
            }
        },
        'retina_detect': true
    });
</script>
</body>
</html>
