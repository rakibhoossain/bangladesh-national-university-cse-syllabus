<?php require"header.php";?>
<!-- contact full -->
    <div class="alert alert-warning subscribe" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span><i class="fa fa-check" aria-hidden="true"></i></span> <strong class="notice"></strong>
    </div>

    <div class="contact-full section-padding" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="title text-center">
                        <!-- <h2 class="wow fadeInUp">Contact Us</h2> -->
                        <!-- <p class="wow fadeInUp">Great! Please leave a message..........</p> -->
                        
                        <h1 class="text-center">Great! Please leave a message..........</h1>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="contact-map">
                        <iframe width="100%" height="380" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3651.231817954391!2d90.3633568!3d23.774758!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0b00362c719%3A0x98ffa85ad21b509e!2z4Ka24KeN4Kav4Ka-4Kau4Kay4KeAIOCmuOCnjeCmleCmr-CmvOCmvuCmsCDgprbgpqrgpr_gpoIg4Kau4Kay!5e0!3m2!1sbn!2sbd!4v1487503265942"></iframe>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <div class="contact-form">
                        <form action="validator.php">
                            <div class="form-group">
                                <label for="username">Full Name</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" class="form-control" name="message" rows="3"></textarea>
                            </div>
                            <div class="form-bottom">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" id="subscribe" name="subscribe" value="">Subscribe to newslatter
                                </label>
                              </div>
                              <!-- <input type="submit" class="btn-custom btn-send" value="Send"> -->
                              <a href="#" class="submit violet-btn send-btn">Send</a>
                            </div>
                            <div class="relative">
                                <div class="message-container">
                                   <div class="result" id="result"></div>       
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/utils.js"></script>
<?php require"footer.php";?>