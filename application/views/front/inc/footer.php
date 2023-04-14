<footer class="main_footer">
    <div class="icon_sun">
        <img src="<?= base_url('assets/front/img/icon-sun.png'); ?>" alt="">
    </div>
    <!-- <div class="rainbow">
          <img src="<?= base_url('assets/front/img/icon-rainbow (1).png'); ?>" alt="">
        </div> -->
    <!-- <div class="areo_plane">
          <img src="<?= base_url('assets/front/img/icon-plane.png'); ?>" alt="">
        </div> -->
    <div class="starts">
        <img src="<?= base_url('assets/front/img/icon-trans-6.png'); ?>" alt="">
    </div>
    <div class="start">
        <img src="<?= base_url('assets/front/img/icon-trans-6.png'); ?>" alt="">
    </div>
    <div class="button_bg">
        <img src="<?= base_url('assets/front/img/22222.png'); ?>" alt="">
    </div>
    <div class="icon_img">
        <a id="button" href="">
            <i class="fa fa-arrow-up-long"></i>
        </a>
    </div>
    <div class="container">
        <div class="row justify-content-center" style="padding-bottom:100px ;">
            <!-- <div>
              <img src="<?= base_url('assets/front/img/icon-rainbow.png'); ?>" alt="">
            </div> -->
            <div class="col-lg-3">
                <a class="navbar-brand" href="<?= base_url(); ?>"><img class="img-fluid" src="<?= base_url('assets/front/img/neon_logo-white.png'); ?>" style="width: 80px;"></a>
                <p>

                    Walk into our studio to discuss your party rentals and take home a bit of the party with a custom gift or stunning fresh flower arrangement.
                </p>
                <a class="socials_i" href="https://www.facebook.com/orlandoflowerwalls/"><i class="fab fa-facebook"></i></a>
                <a class="socials_i" href="https://www.instagram.com/orlandoflowerwalls__/"><i class="fab fa-instagram"></i></a>
                <a class="socials_i" href="https://www.tiktok.com/@orlandoflowerwalls"><i class="fab fa-tiktok"></i></a>
            </div>
            <div class="col-lg-2">
                <h3>Contact</h3>
                <ul>
                    <li> <a href="tel:4079515684">4079515684</a> </li>
                    <li> <a href="mailto:shop@orlandoflowerwalls.com">shop@orlandoflowerwalls.com</a></li>
                    <li>1150 Douglas Ave #1090, Altamonte Springs, FL 32714</li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h3>Links</h3>
                <ul>

                    <li><a href="<?= base_url(); ?>">Home</a></li>
                    <!-- <li><a href="<?= base_url('about'); ?>">About Us</a></li> -->
                    <li><a href="<?= base_url('shop'); ?>">Shop</a></li>
                    <li><a href="https://orlandoflowerwalls.com/contact">Contact</a></li>
                    <li><a href="https://www.orlandoflowerwalls.com">Events & Projects</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h3>Opening Hours</h3>
                <ul>
                    <?php
                    $content = $this->db->select('*')->from('timings')
                        ->where(array('timings_id' => 1))->get()->result();
                    ?>
                    <li><a><?php echo $content[0]->day_start . " to " . $content[0]->day_end; ?>:</a></li>
                    <li><a><?php echo $content[0]->full_day . " - " . $content[0]->full_day2; ?></a></li>
                    <li>Weekends:<br /><a><?php if ($content[0]->open_close == 'close') {
                                                echo 'Closed';
                                            } else {
                                                echo !empty($content[0]->first_half) ? $content[0]->first_half . " - " . $content[0]->first_half2 : '';
                                            } ?></a></li>
                    <!-- <li>Sunday:<br /><a><?php echo $content[0]->second_half . " - " . $content[0]->second_half2; ?></a></li> -->
                </ul>
            </div>
            <form action="<?= base_url('Home/Newsletter'); ?>" enctype="multipart/form-data" method="POST" class="col-lg-3">
                <h3>Newsletter</h3>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email">
                <input type="date" id="date" name="date" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email" hidden>
                <div class="mt-5">
                    <button class="theme-btn footer_btn">Submit</button>
                </div>
            </form>
            <script>
                window.onload = function loadDate() {
                    let date = new Date(),
                        day = date.getDate(),
                        month = date.getMonth() + 1,
                        year = date.getFullYear();

                    if (month < 10) month = "0" + month;
                    if (day < 10) day = "0" + day;

                    const todayDate = `${year}-${month}-${day}`;

                    document.getElementById("date").defaultValue = todayDate;
                };
            </script>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="footer_copyright col-lg-12 text-center text-white">
                <!-- <p class="pt-2">Copyright © 2022 Neon. All rights reserved by <a href="https://thewebions.com/" target="_blank">The Webions</a> </p> -->
            </div>
        </div>
    </div>

</footer>







<script>
    $(".selector .fifty:first-child input").prop('checked', true);
    $('.selector-item_radio').click(function() {
        console.log($('.selector-item_radio:checked').val());
    })

    function setBG(x) {
        $('.demo_container').css('background', `url(${x})`);
    }

    el = document.querySelector('.box');
    let newPosX = 0,
        newPosY = 0,
        startPosX = 0,
        startPosY = 0;

    // when the user clicks down on the element
    el.addEventListener('mousedown', function(e) {
        e.preventDefault();

        // get the starting position of the cursor
        startPosX = e.clientX;
        startPosY = e.clientY;

        document.addEventListener('mousemove', mouseMove);

        document.addEventListener('mouseup', function() {
            document.removeEventListener('mousemove', mouseMove);
        });

    });


    function mouseMove(e) {
        // calculate the new position
        newPosX = startPosX - e.clientX;
        newPosY = startPosY - e.clientY;

        // with each move we also want to update the start X and Y
        startPosX = e.clientX;
        startPosY = e.clientY;

        // set the element's new position:
        el.style.top = (el.offsetTop - newPosY) + "px";
        el.style.left = (el.offsetLeft - newPosX) + "px";
    }
</script>

<script>
    $(document).ready(function() {

        $(".range").click(function() {

            var budget = $("#rangeValue").text();
            $("#rangeVal").val(budget);


        });
    });
</script>

</body>

</html>