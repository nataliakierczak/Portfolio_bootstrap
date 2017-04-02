<?php

require 'phpmailer/PHPMailerAutoload.php';
require 'mail-config.php';



if (isset($_GET['thankyou'])) {
    $msg = 'Thank you for sending the message! I will get back to you soon.';
}

if (isset($_POST['send-email'])) {
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    $mail->Host=$config['host'];
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 25;
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication
    $mail->Username=$config['login'];
    //Password to use for SMTP authentication
    $mail->Password=$config['password'];
    //Set who the message is to be sent from
    $mail->setFrom('natalia@nataliak.cz', 'Website inquiry');
    //Set who the message is to be sent to
    $mail->addAddress('natalia@nataliak.cz', 'Natalia');
    //Set the subject line
    $mail->Subject = 'Mail from the website';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML('');
    //Replace the plain text body with one created manually
    $mail->AltBody = '';
    $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['message']}
EOT;

    if (!$mail->send()) {
        //The reason for failing to send will be in $mail->ErrorInfo
        //but you shouldn't display errors to users - process the error, log it on your server.
        $msg = 'Unfortunately, the message was not sent. Please try again later.';
    } else {
        $msg = 'Thank you for sending the message! I will get back to you soon.';
    }
    header('Location: /?thankyou=1#form');
};

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Natalia Kierczak's portfolio</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,700&amp;subset=latin-ext"
          rel="stylesheet">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css">

</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a class="page-scroll" href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#projects">Recent projects</a>
                </li>
                <li>
                    <a class="page-scroll" href="#skills">Skills</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Header -->
<header id="top" class="header">
    <div class="text-vertical-center">
        <h1>Natalia Kierczak</h1>
        <h3><strong>Web developer based in Prague</strong></h3>
        <a href="#projects" class="btn btn-dark btn-lg">Find Out More</a>
    </div>
</header>

<section id="projects">
    <div class="container background">
        <div class="row">
            <h2 class="fontgrey">My recent projects</h2></div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 col-md-push-5">
                <h3 class="featurette-heading">Jan Vokrouhlecký</h3>
                <h4>Design & code</h4>
                <div class="description">
                    <p class="lead"></p>
                    <ul class="fa-ul">
                        <li><i class="fa-li fa fa-check-square"></i><strong>Client: </strong>Prague-based accountant
                        </li>
                        <li><i class="fa-li fa fa-check-square"></i><strong>Date: </strong>March 2017</li>
                        <li><i class="fa-li fa fa-check-square"></i><strong>Result: </strong>Modern presentation of
                            accouting services
                        </li>
                    </ul>

                </div>
                <a href="http://vokrouhlecky.cz/" target="_blank" class="btn btn-dark btn-lg">Visit the website</a>
            </div>
            <br>
            <div class="col-md-5 col-md-pull-7">
                <img class="featurette-image img-responsive center-block" src="img/jan.PNG"
                     alt="Screenshot of the website">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h3 class="featurette-heading">Sportemu</h3>
                <h4>Code for selected pages</h4>
                <div class="description">
                    <p class="lead">
                    <ul class="fa-ul">
                        <li><i class="fa-li fa fa-check-square"></i><strong>Client: </strong>Start-up project
                        </li>
                        <li><i class="fa-li fa fa-check-square"></i><strong>Date: </strong>March 2017</li>
                        <li><i class="fa-li fa fa-check-square"></i><strong>Result: </strong>The website to be released
                            in late 2017
                        </li>
                    </ul>

                </div>
            </div>

            <br>
            <div class="col-md-5">
                <img class="featurette-image img-responsive center-block" src="img/sportemu.PNG"
                     alt="Screenshot of the website">
            </div>
        </div>

    </div>
</section>

<!-- Skills-->
<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<section id="skills" class="services bg-primary">
    <div class="container">
        <div class="row">
            <h2 class="fontgrey ">My skills</h2>
            <hr class="featurette-divider">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="service-item">
                                <span class="fa-stack fa-4x">
                               <i class="fa fa-thumbs-up shake fa-stack-1x text-primary"></i>
                            </span>
                        <h4>
                            <strong class="fontgrey">Recent technologies</strong>
                        </h4>
                        <div class="skill">

                            <ul class="fa-ul">
                                <li><i class="fa-li fa fa-check-square"></i>HTML5 and CSS3</li>
                                <li><i class="fa-li fa fa-check-square "></i>Bootstrap</li>
                                <li><i class="fa-li fa fa-check-square"></i>JavaScript</li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-item">
                                <span class="fa-stack fa-4x">
                            <i class="fa fa-mobile fa-stack-1x shake text-primary"></i>

                            </span>
                        <h4>
                            <strong class="fontgrey">Responsive design</strong>
                        </h4>
                        <div class="skill">

                            <ul class="fa-ul">
                                <li><i class="fa-li fa fa-check-square"></i>Suitable for all devices</li>
                                <li><i class="fa-li fa fa-check-square"></i>Mobile and tablet friendly</li>
                                <li><i class="fa-li fa fa-check-square"></i>Winning you audience</li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-smile-o fa-stack-1x shake text-primary"></i>
                            </span>
                        <h4>
                            <strong class="fontgrey">User Experience</strong>
                        </h4>
                        <div class="skill">

                            <ul class="fa-ul">
                                <li><i class="fa-li fa fa-check-square"></i>Efficient and effective</li>
                                <li><i class="fa-li fa fa-check-square"></i>User-friendly</li>
                                <li><i class="fa-li fa fa-check-square"></i>Accessible for all users</li>
                            </ul>

                        </div>
                    </div>
                </div>

                <!-- /.row (nested) -->
            </div>
            <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<footer id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="row">
                    <h2>Contact</h2>
                    <hr class="featurette-divider">
                    <div class="row">
                        <div class="col-lg-6 text-center">
                            <h3>About me</h3>
                            <img class="cvphoto" src="img/cv-photo.jpg" alt="Natalia's portrait picture">
                            <p id="aboutme"> I am a junior web developed based in Prague.<br> I am <strong>available
                                    for freelance work</strong> - please contact me if you are thinking of a new project
                                and I will get back to you shortly. </p></div>


                        <div class="col-lg-6 text-center" id="form">
                            <h3>Contact form</h3>
                            <?php if (!empty($msg)) {
                                echo "<h5 class='text-center'>$msg</h5>";
                            } ?>
                            <form method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="name">Your name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email"
                                           placeholder="Enter email" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="textarea">Your message</label>
                                    <textarea class="form-control" id="textarea" rows="3"
                                              placeholder="Enter your message" name="message"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="send-email" class="btn btn-dark btn-lg">Submit</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <hr class="small">
                <p class="text-muted">Copyright &copy; Natalia Kierczak 2017</p>
            </div>
        </div>
    </div>
    <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
</footer>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script>
    // Closes the sidebar menu
    $("#menu-close").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function () {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function () {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function () {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function () {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });

</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-96438149-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
