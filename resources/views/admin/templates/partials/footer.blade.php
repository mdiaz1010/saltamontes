

    <footer>

    </footer>
    <!-- footer -->

    <!-- Modal -->


    <style>
        #example-progress-bar-container { width:220px;
																			margin-left:180px;
		}
		#formato-password {
				float: left;
				width: 160px;
				padding-top: 5px;
				text-align: right;
		}
		.panel {
				margin-top: 10px;
				margin-bottom: 10px;
				background-color: #FAFAFA;
				border: 1px solid transparent;
				border-radius: 4px;
				-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
				box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}
</style>

    <!-- Modal -->

    <!-- Modal -->



    <script type="text/javascript" src="{{ asset('bitinka/js/md5.js') }}"></script>
    <script src="{{ asset('bitinka/js/validatorinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/js/password-strength/prettify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/js/password-strength/password-score.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/js/password-strength/password-score-options.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/js/password-strength/bootstrap-strength-meter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/assets/js/form-validation.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/js/js_template1.0/owl.carousel.min.js') }}"></script>


    <script>
        $(document).ready(function () {
            $('body').tooltip({
                selector: '[data-toggle="tooltip"]'
            });
        });
    </script>

    <script>
        $(window).scroll(function () {
            $(".efecto").each(function () {
                var pos = $(this).offset().top;
                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    var f = $(this).attr('data-effect');
                    $(this).addClass("slide-animated " + f + "");
                }
            });
        });
    </script>