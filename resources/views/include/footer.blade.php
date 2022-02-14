 <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h4>
                             <img src="{{ asset('asset/img/press start.png') }}" style="width: 130px; height: 100px;" alt="">
                        </h4>
                         <div class="social-media">
                            <p class="mt-3 sc-media-title">Follow US</p>
                            <div class="social-icons">
                               <a href="{{ $yt->value }}" style="text-decoration: none">
                                  <i class="fab fa-youtube fa-1x ms-2"></i>
                               </a>
                               <a href="{{ $linkedin->value }}" style="text-decoration: none">
                                   <i class="fab fa-linkedin fa-1x ms-2"></i>
                               </a>
                               <a href="{{ $yt->value }}" style="text-decoration: none">
                                <i class="fab fa-instagram fa-1x ms-2"></i>
                               </a>
                               <a href="whatsapp://send?abid={{ $wa->value }}" style="text-decoration: none">
                                <i class="fab fa-whatsapp fa-1x ms-2"></i>
                               </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                  <h5 class="title-sm">Navigation</h5>
                  <div class="footer-links">
                     <a href="#service">Services</a>
                     <a href="#project">Our Work</a>
                     <a href="#about">About</a>
                     <a href="#">Blog</a>
                  </div>
               </div>
               <div class="col-md-2">
                  <h5 class="title-sm">More</h5>
                  <div class="footer-links">
                     <a href="#">FAQ's</a>
                     <a href="#">Privacy & Policy</a>
                     <a href="#">Liscences</a>
                  </div>
               </div>
               <div class="col-md-2">
                  <h5 class="title-sm">Contact</h5>
                  <div class="footer-links">
                     <p class="mb">{{ $address->value }}</p>
                     <p class="mb-">{{ $phone->value }}</p>
                     <p class="mb">{{ $email->value }}</p>
                  </div>
               </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <p class="mb-0 text-center">© SBSolusi{{ date('Y') }}. All rights reserved</p>
               </div>
            </div>
         </div>
      </div>
    </footer>