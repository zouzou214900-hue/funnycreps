<style>
    #timeline-content {
  margin-top: 50px;
  text-align: center;
}
/* Timeline */
.timeline {
  border-left: 4px solid #e386d7;
  border-bottom-right-radius: 4px;
  border-top-right-radius: 4px;
  background: rgba(255, 255, 255, 0.03);
  color: rgba(255, 255, 255, 0.8);
  font-family: 'Chivo', sans-serif;
  margin: 50px auto;
  letter-spacing: 0.5px;
  position: relative;
  line-height: 1.4em;
  font-size: 1.03em;
  padding: 50px;
  list-style: none;
  text-align: center;
  font-weight: 100;
  max-width: 60%;
}
.timeline h1 {
  font-family: 'Saira', sans-serif;
  letter-spacing: 1.5px;
  font-weight: 100;
  font-size: 1.4em;
}
.timeline h2,
.timeline h3 {
  font-family: 'Saira', sans-serif;
  letter-spacing: 1.5px;
  font-weight: 400;
  font-size: 1.4em;
}
.timeline .event {
  border-bottom: 1px dashed rgba(255, 255, 255, 0.1);
  padding-bottom: 25px;
  margin-bottom: 50px;
  position: relative;
}
.timeline .event:last-of-type {
  padding-bottom: 0;
  margin-bottom: 0;
  border: none;
}
.timeline .event:before,
.timeline .event:after {
  position: absolute;
  display: block;
  top: 0;
}
.timeline .event:before {
  left: -217.5px;
  color: #000;
  content: attr(data-date);
  text-align: right;
  font-weight: 100;
  font-size: 0.9em;
  min-width: 120px;
  font-family: 'Saira', sans-serif;
}
.timeline .event:after {
  box-shadow: 0 0 0 4px #e386d7;
  left: -57.85px;
  background: #313534;
  border-radius: 50%;
  height: 11px;
  width: 11px;
  content: "";
  top: 5px;
}

</style>
<!-- Banner start -->
<div class="banner banner-creche" id="banner">
    <div id="bannerCarousole" >
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100 h-100" src="img/plombieres-1.jpg" alt="Prochaines ouvertures de crèches Funny Crèche">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <h1>FUNNY Crèche <br/>De nouvelles structures à venir !</h1>
			<br/><br/>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Banner end -->



<!-- Featured Properties start -->
<div class="featured-properties content-area">

    <div class="container">
      <div id="timeline-content">
  <h1>Planning des ouvertures</h1>

  <ul class="timeline">
    
     <li class="event" data-date="">
      <h3>Funny Creche DAIX</h3>
       <p>Ouverture prévue en Septembre 2026</p>
      <a href="contact.html" class="btn btn-xs btn-theme">Contactez-nous</a>

</li>
    </li>
  </ul>
</div>

    </div>
</div>
