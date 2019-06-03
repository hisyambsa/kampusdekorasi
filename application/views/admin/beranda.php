<style>
  .carousel-3d-body{overflow-x:hidden}.carousel-3d{position:relative;width:60%;height:400px;margin:80px auto;-webkit-perspective:1000px;perspective:1000px}.carousel-3d .carousel-3d-inner{position:absolute;width:100%;height:100%;-webkit-transform:translateZ(-288px);transform:translateZ(-288px);-webkit-transform-style:preserve-3d;transform-style:preserve-3d;-webkit-transition:-webkit-transform 1s;-o-transition:transform 1s;transition:transform 1s;transition:transform 1s,-webkit-transform 1s}.carousel-3d .carousel-3d-item{position:absolute;width:190px;height:120px;-webkit-transition:opacity 1s,-webkit-transform 1s;-o-transition:transform 1s,opacity 1s;transition:transform 1s,opacity 1s;transition:transform 1s,opacity 1s,-webkit-transform 1s}.carousel-3d .carousel-3d-item img{width:100%!important;height:100%!important;-o-object-fit:cover!important;object-fit:cover!important}.carousel-3d .carousel-3d-controls{position:absolute;left:0;top:-80px;width:100%;height:100%;text-align:center}.carousel-3d .carousel-3d-controls a{width:30px;height:30px;text-align:center;font-size:26px}@media (max-width:768px){.carousel-3d{-webkit-perspective:200px;perspective:200px}.carousel-3d .carousel-3d-item{position:absolute;width:95px;height:60px;-webkit-transition:opacity 1s,-webkit-transform 1s;-o-transition:transform 1s,opacity 1s;transition:transform 1s,opacity 1s;transition:transform 1s,opacity 1s,-webkit-transform 1s}.carousel-3d-vertical{-webkit-perspective:2000px;perspective:2000px}.carousel-3d-vertical .carousel-3d-controls{position:absolute;left:0;top:0;width:50%;height:50%;text-align:center;-webkit-transform:rotate(90deg);-ms-transform:rotate(90deg);transform:rotate(90deg)}}.carousel-3d-vertical .carousel-3d-controls{position:absolute;left:0;top:0;width:100%;height:100%;text-align:center;-webkit-transform:rotate(90deg);-ms-transform:rotate(90deg);transform:rotate(90deg)}
  /* If the screen size is 601px wide or more, set the font-size of <h1> to 80px */
  @media screen and (min-width: 601px) {
    h1.judulBeranda {
      font-size: 4vw;
    }
  }
  /* If the screen size is 600px wide or less, set the font-size of <h1> to 30px */
  @media screen and (max-width: 600px) {
    h1.judulBeranda {
      font-size: 6vw;
    }
  }
  .bgberandaPegawai {
    background-image: url("<?php echo base_url()?>img/background_login.jpg");
    /* The image used */
    background-color: grey;
    /* Full height */
    height: 100%;
    width: 100%;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
<div class="bgberandaPegawai">
  <main class="">
    <h1 class="text-center text-white animated slideInUp slower judulBeranda" style="font-family: cursive; position: relative; top: 30px; text-shadow: 5px 5px #674949;"> Wedding Organizer Kampus Dekorasi</h1>
    <div class="carousel-3d carousel-3d-controls">
      <div class="carousel-3d-inner">
        <div class="carousel-3d-item"><img src="<?php echo base_url('img/slider-3d/img-1.jpg') ?>" alt="Slide1"></div>
        <div class="carousel-3d-item"><img src="<?php echo base_url('img/slider-3d/img-2.jpg') ?>" alt="Slide2"></div>
        <div class="carousel-3d-item"><img src="<?php echo base_url('img/slider-3d/img-3.jpg') ?>" alt="Slide3"></div>
        <div class="carousel-3d-item"><img src="<?php echo base_url('img/slider-3d/img-4.jpg') ?>" alt="Slide4"></div>
        <div class="carousel-3d-item"><img src="<?php echo base_url('img/slider-3d/img-5.jpg') ?>" alt="Slide5"></div>
        <div class="carousel-3d-item"><img src="<?php echo base_url('img/slider-3d/img-6.jpg') ?>" alt="Slide6"></div>
        <div class="carousel-3d-item"><img src="<?php echo base_url('img/slider-3d/img-7.jpg') ?>" alt="Slide7"></div>
      </div>
      
    </div>
  </main>
</div>