
           <section class="subscribe">
   
        </section>
<footer id="footer">

    <div class="footer-columns">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <div class="footer-column logo-column" style="margin-top: 34px;">
                        <h4>Contact Us & Follow Us</h4>
                        <ul class="address-list">
<!--                            <li><i class="fa fa-home"></i>NOWGONG, CHHATARPUR (MP)</li>-->
                            <li><i class="fa fa-phone"></i>8982127397 </li>
                            <li><i class="fa fa-envelope"></i>info@skyevo.in <br/><br/>CIN:- U80904UP2018PTC107705</li>
                        </ul><br/>
                        <ul class="social-icons">
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a class="pinterest" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="footer-column footer-links">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="index">Home</a></li>
                            <li><a href="about-us">About Us</a></li>
<!--                            <li><a href="https://skyevo.in/education/job-section">FAQs</a></li>-->
                            <li><a href="<?=$home_url;?>">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="footer-column footer-links">
                        <h4>Policy</h4>
                        <ul>
                            <li><a href="cancellation-refunds">Return Policy</a></li>
                            <li><a href="terms-conditions">Terms & Conditions</a></li>
                            <li><a href="privacy-policy">Privacy Policy</a></li>
                            <li><a href="disclaimer">Disclaimer</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="footer-column footer-links">
                        <h4>Help</h4>
                        <ul>
                            <li><a href="payments">Payments</a></li>
                            <li><a href="faqs">FAQ</a></li>
                            <li><a href="cancellation-refunds">Cancellation & Refunds</a></li>
                            <?php
                                if(isset($_SESSION['user_id'])){
                            ?>
                            <li><a href="<?=$home_url;?>user-dashboard">My Accounts</a></li>
                            <?php
                                }else{
                            ?>
                            <li><a href="<?=$home_url;?>login">My Accounts</a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div><br>
       
        
                </div>
                <br>
               
            </div>
        </div>
              <div class="row">
            <div class="col-md-12">
                      <form action="#">
       	<div class="single">
		<h4>Subscribe here</h4>
	<div class="input-group">
         <input type="email" class="form-control" placeholder="Enter your email">
         <span class="input-group-btn">
         <button class="btn btn-theme" type="submit">Subscribe</button>
         </span>
          </div>

            
    	
                </div>
                  </form>
                  </div>
            </div>
    </div>
        
        
            
    <div class="sub-foorer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>Copyright <i class="fa fa-copyright"></i> 2018 <span class="theme-color">Skyevo Educational Services Pvt. Ltd.</span> All Rights Reserved.</p>
                </div>
                <div class="col-sm-6">
                    <a class="back-top" href="#">Back to Top<i class="fa fa-caret-up"></i></a>
                    <ul class="cards-list">
                        <li><img src="<?=$home_url;?>images/cards/img-01.jpg" alt=""></li>
                        <li><img src="<?=$home_url;?>images/cards/img-02.jpg" alt=""></li>
                        <li><img src="<?=$home_url;?>images/cards/img-03.jpg" alt=""></li>
                        <li><img src="<?=$home_url;?>images/cards/img-04.jpg" alt=""></li>
                    </ul>
                   
                </div>
            </div>
        </div>
    </div>
    
</footer>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c08f98440105007f37b3ca5/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
