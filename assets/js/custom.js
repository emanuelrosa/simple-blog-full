(function ($) {
    /* ---------------------------------------------- /*
     * Preloader
     /* ---------------------------------------------- */
    $(window).load(function () {

        if ($("div#status").length) {
            $('#status').fadeOut();
        }
        if ($("div#preloader").length) {
            $('#preloader').delay(300).fadeOut('slow');
        }


        /* ---------------------------------------------- /*
         * ajusta iframes videos
         /* ---------------------------------------------- */

        var resizevid = function () {
            var w = $(window).width();
            var h = $(window).height();
            //console.log(w);
            if (w > 640) {
                w = 640;
                h = 390;
            } else if (w < 460) {
                w = 300;
                h = 195;
            }
            $('#vid-yout').width(w);
            $('#vid-yout').height(h);
        };

        $(document).ready(function () {
            resizevid();
        });

        $(window).resize(function () {
            resizevid();
        }).load(function () {
            resizevid();
        });

        if ($("div#div-face").length) {
            $('#div-face').html($('#input-face').val());
        }

    });

    $(document).ready(function () {

        $('.container').imagesLoaded();

        $('.pagination').jqPagination({
            link_string: '/?page=0',
            max_page: $("#max-page").attr('data-max-page'),
            paged: function (page) {
                $("#listaconteudo").load("./?page=" + page + " #listaconteudo", function (response, status, xhr) {
                    if (status === "success") {
                        $('html, body').stop().animate({scrollTop: 0}, 1000);
                    }
                });
            }
        });

        /* ---------------------------------------------- /*
         * Search
         /* ---------------------------------------------- */

        $("#btn-search").on("click", function () {
            $("#contentcolumn").load("./search/" + $('#inputsearch').val() + " #contentcolumn", function (response, status, xhr) {
                if (status === "success") {
                    $('.pagination').jqPagination({
                        link_string: '/?page=0',
                        max_page: $("#max-page").attr('data-max-page'),
                        paged: function (page) {
                            $("#listaconteudo").load("./search/" + $('#inputsearch').val() + "/" + page + " #listaconteudo", function (response, status, xhr) {
                                if (status === "success") {
                                    $('html, body').stop().animate({scrollTop: 0}, 1000);
                                }
                            });
                        }
                    });
                }
            });
        });

        /* ---------------------------------------------- /*
         * close PopUp
         /* ---------------------------------------------- */

        $('.btn-fecharadsmb').on('click', function () {
            $('.ads-mb').css('height', '0px');
        });

        /* ---------------------------------------------- /*
         * Navbar
         /* ---------------------------------------------- */

        $('.header').sticky({
            topSpacing: 0
        });

//        $('body').scrollspy({
//            target: '.navbar-custom',
//            offset: 70
//        });

        /* ---------------------------------------------- /*
         * E-mail validation
         /* ---------------------------------------------- */

        /* ---------------------------------------------- /*
         * form cad author email
         /* ---------------------------------------------- */

        $("#form-cad").css('display', 'none');

        $('#btn-loginauthor').on('click', function () {
            $("#logincolaborador").modal('show');
            $("#form-login").css('display', 'block');
            $("#form-cad").css('display', 'none');
        });

        $('#btn-cancelcadaut').on('click', function () {
            $("#logincolaborador").modal('hide');
            $("#form-login").css('display', 'block');
            $("#form-cad").css('display', 'none');
        });

        $('#btn-novoautor').on('click', function () {
            $("#logincolaborador").modal('show');
            $("#form-login").css('display', 'none');
            $("#form-cad").css('display', 'block');
        });

        $('#formaut').submit(function () {
            return false;
        });

        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        }

        /* ---------------------------------------------- /*
         * Contact form ajax
         /* ---------------------------------------------- */

        $('#contact-form').submit(function (e) {

            $(".loading").css("display", "block");

            e.preventDefault();

            var c_name = $("#inputnome").val();
            var c_email = $("#inputemail").val();
            var c_message = $("#inputmsg").val();
            var response = $("#contact-form .ajax-response");

            var formURL = $("#contact-form").attr('action');

            var formData = {
                'name': c_name,
                'email': c_email,
                'message': c_message
            };

            if ((c_name == '' || c_email == '' || c_message == '') || (!isValidEmailAddress(c_email))) {
                $(".loading").css("display", "none");
                response.fadeIn(500);
                response.html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-warning"></i> Por favor todos os campos são obrigatórios.</div>');
            } else {
                $.ajax({
                    type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url: formURL, // the url where we want to POST
                    data: formData, // our data object
                    dataType: "html",
                    success: function (msg) {

                        $(".loading").css("display", "none");

                        var msg = msg.split("|");
                        if (msg[0] === "OK") {
                            response.html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Mensagem enviada com sucesso, valeu por particiar!</div>').fadeIn(500);
                        }
                    }
                });
            }
            return false;
        });

        /* ---------------------------------------------- /* 
         * Contact-Error form ajax
         /* ---------------------------------------------- */

        $('#error-form').submit(function (e) {

            $(".loading").css("display", "block");

            e.preventDefault();

            var c_name = $("#inputnome").val();
            var c_email = $("#inputemail").val();
            var c_message = $("#inputmsg").val();
            var response = $("#error-form .ajax-response");

            var formURL = $("#error-form").attr('action');

            var formData = {
                'name': c_name,
                'email': c_email,
                'message': c_message
            };

            if ((c_name == '' || c_email == '' || c_message == '') || (!isValidEmailAddress(c_email))) {
                $(".loading").css("display", "none");
                response.fadeIn(500);
                response.html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-warning"></i> Por favor todos os campos são obrigatórios.</div>');
            } else {
                $.ajax({
                    type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url: formURL, // the url where we want to POST
                    data: formData, // our data object
                    dataType: "html",
                    success: function (msg) {

                        $(".loading").css("display", "none");

                        var msg = msg.split("|");
                        if (msg[0] === "OK") {
                            response.html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Mensagem enviada com sucesso, valeu por particiar!</div>').fadeIn(500);
                        }
                    }
                });
            }
            return false;
        });

        /* ---------------------------------------------- /*
         * Salvar horario de saida
         /* ---------------------------------------------- */

        window.onbeforeunload = function () {

            //remove visita online
//            $.ajax({
//                type: 'POST',
//                url: './visitante_online.php',
//                data: 'sair',
//                dataType: "html"
//            });

        };

        /* ---------------------------------------------- /*
         * Login autor
         /* ---------------------------------------------- */

        $('#loginauthor').on('submit', function () {

            $(".loadingcreateuser").css("display", "block");

            var l_email = $("#loginauthor #inputemail").val();
            var l_senha = $("#loginauthor #inputsenha").val();

            var formURL = $("#loginauthor").attr('action');

            var formData = {
                "email": l_email,
                "senha": l_senha,
                "action": 'loginautoremail'
            };

            if (!isValidEmailAddress(l_email)) {
                $(".loadingcreateuser").css("display", "none");
                $('#msgauthor').fadeIn(500);
                $('#msgauthor').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-warning"></i> Email inválido.</div>');
            } else if ((l_email === '' || l_senha === '')) {
                $(".loadingcreateuser").css("display", "none");
                $('#msgauthor').fadeIn(500);
                $('#msgauthor').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-warning"></i> Por favor todos os campos são obrigatórios.</div>');
            } else {
                $.ajax({
                    type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url: formURL, // the url where we want to POST
                    data: formData, // our data object
                    dataType: "html",
                    success: function (msg) {
                        //console.log(msg);
                        var msg = msg.split("|");
                        if (msg[0] === "OK") {
                            window.location.href = "./author/";
                        } else if (msg[0] === "ERROR") {
                            $('#msgauthor').fadeIn(500);
                            $("#msgauthor").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> ' + msg[1] + '</div>').fadeIn(500);
                        }
                        $(".loadingcreateuser").css("display", "none");
                    }
                });
            }

            return false;
        });
    });

})(jQuery);