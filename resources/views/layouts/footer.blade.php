        @if (auth()->user()->type == 'admin')
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>{{ date('Y') }} &copy; Generator by
                        <a href="https://github.com/Zzzul" target="_blank">M. Zulfahmi</a>
                    </p>
                </div>
                <div class="float-end">
                    <p>Mazer Admin by
                        <a href="http://ahmadsaugi.com" target="_blank">A. Saugi</a>
                    </p>
                </div>
            </div>
        </footer>
        </div>

        <script src="{{ asset('mazer') }}/js/app.js"></script>
        @else
        <!-- Jquery -->
        <script src="{{ asset ('assets') }}/js/lib/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap-->
        <script src="{{ asset ('assets') }}/js/lib/popper.min.js"></script>
        <script src="{{ asset ('assets') }}/js/lib/bootstrap.min.js"></script>
        <!-- Ionicons -->
        <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
        <!-- Owl Carousel -->
        <script src="{{ asset ('assets') }}/js/plugins/owl-carousel/owl.carousel.min.js"></script>
        <!-- jQuery Circle Progress -->
        <script src="{{ asset ('assets') }}/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
        <!-- Base Js File -->
        <script src="{{ asset ('assets') }}/js/base.js"></script>
        @endif
        @stack('js')
        </body>

        </html>