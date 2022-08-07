<div class="row align-items-center mb-4">
  <div class="col-md-3">
    <span style="font-size: 18px; font-weight: 700;">Código de pedido:</span>
  </div>
  <div class="col-md-6">
    <div class="search_bar mb-0">
      <input type="text" name="code" class="form-control" placeholder="Ingrese código">
      <button id="logistic__search">Buscar</button>
      <!-- <input type="submit" value="Buscar"> -->
    </div>
  </div>
</div>
{{--<div class="card">
  <div class="card-body">
    <nav>
        <ul class="ligistic_nav">
<!--           <li><span class="bg-danger ligistic_text p-2">Pendiente de envio</span></li>
          <li><span class="bg-warning ligistic_text p-2">En camino</span></li>
          <li><span class="bg-info ligistic_text p-2">En tienda</span></li>
          <li><span class="bg-primary ligistic_text p-2">Entregado</span></li> -->
        </ul>

           <ul class="ligistic_nav_description">
        </ul>
    </nav>
  </div>
</div>--}}


<div class="main-container">
  <section id="timeline" class="timeline-outer">
    <div class="container" id="content">
      <div class="row">
        <div class="col s12 m12 l12">
   
          <ul class="timeline ligistic_nav">
            {{--<li class="event" data-date="2015/Present">
              <h3>Management and Entreprenurship (MSc)</h3>
              <p>
                This September 2015 I will begin an MSc in Management and Entrepreneurship at University of Sussex, to broaden my knowledge and gain skills necessary for my future in business and management.
              </p>
            </li>
            <li class="event" data-date="2015/Present">
              <h3>Claromentis</h3>
              <p>
                Claromentis is an intranet software provider company. I started working at the Brighton office as a Marketing Designer while I was still attending my final year at the University of Sussex. My primary responsibilities included creating corporate identity
                for the company; I re-designed their website, and have created marketing materials such as brochures.
              </p>
              <p>Since graduating from university, I have also undertaken responsibilities for designing a product for the company. The roles I have been given have provided the perfect opportunity to implement the skills I have gained throughout my higher
                education, as well as experiencing the running of a successful business.</p>
            </li>
            <li class="event" data-date="2012/2015">
              <h3>Games & Multimedia Environments BSc (Hons)</h3>
              <p>Throughout my degree I have gained expansive knowledge of informatics areas including Human Computer Interaction, Multimedia Design and Development, Program Analysis and Design For my final year project, I created a 2D Puzzler Game for iOS
                called 'Flat Ball' and received a first. I therefore hope to release this game and further develop it to add new levels and improve the features.
              </p>
            </li>
            <li class="event" data-date="2012/2015">
              <h3>1108 Studios</h3>
              <p>This is a small startup that a friend and I created to gain more skills and apply those I had learned while completing my diploma. Since its inception, as a front - end web developer I have advised, designed and built web solutions for numerous
                clients.</p>
            </li>
            <li class="event" data-date="2010/2012">
              <h3>IT Practitioners BTEC National Diploma</h3>
              <p>This is where my interest in building things for interactive media began. During my first computing course I studied a range of core topics including multimedia design, database design, computer games development, computer networks and object
                oriented programming.</p>
            </li>--}}
          </ul>
        </div>
      </div>
    </div>
  </section>

</div>

<style type="text/css">
  
  /*——————————————
Global
———————————————*/

/*——————————————
TimeLine CSS
———————————————*/
/* Base */

#content {
  margin-top: 50px;
  text-align: center;
}

section.timeline-outer {
  width: 80%;
  margin: 0 auto;
}

h1.header {
  font-size: 50px;
  line-height: 70px;
}
/* Timeline */

.timeline {
  border-left: 3px solid var(--main-bg-color-primario);
  border-bottom-right-radius: 2px;
  border-top-right-radius: 2px;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  color: #333;
  margin: 50px auto;
  letter-spacing: 0.5px;
  position: relative;
  line-height: 1.4em;
  padding: 20px;
  list-style: none;
  text-align: left;
}

.timeline h1,
.timeline h2,
.timeline h3 {
  font-size: 1.4em;
}

.timeline .event {
  border-bottom: 1px solid rgba(160, 160, 160, 0.2);
  padding-bottom: 15px;
  margin-bottom: 20px;
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
      left: -150px;
    color: #969696;
    content: attr(data-date);
    text-align: right;
    /* font-weight: 100; */
    font-size: 14px;
    /* min-width: 50px; */
    width: 100px;
}

.event h3,
.event p{
color: #969696;
}

.color_activado h3,
.color_activado p{
  color: var(--main-bg-color-primario) !important;
}

.color_activado:before {
     
    color: var(--main-bg-color-primario) !important;
   
}


.timeline .event:after {
  box-shadow: 0 0 0 3px var(--main-bg-color-primario);
  left: -27px;
  background: #ffffff;
  border-radius: 50%;
  height: 11px;
  width: 11px;
  content: "";
  top: 5px;
}
/**/
/*——————————————
Responsive Stuff
———————————————*/

@media (max-width: 945px) {
  .timeline .event::before {
    left: 0.5px;
    top: 20px;
    min-width: 0;
    font-size: 13px;
  }
  .timeline h3 {
    font-size: 16px;
  }
  .timeline p {
    padding-top: 20px;
  }
  section.lab h3.card-title {
    padding: 5px;
    font-size: 16px
  }
}

@media (max-width: 768px) {
  .timeline .event::before {
    left: 0.5px;
    top: 20px;
    min-width: 0;
    font-size: 13px;
  }
  .timeline .event:nth-child(1)::before,
  .timeline .event:nth-child(3)::before,
  .timeline .event:nth-child(5)::before {
    top: 38px;
  }
  .timeline h3 {
    font-size: 16px;
  }
  .timeline p {
    padding-top: 20px;
  }
}
/*——————————————
others
———————————————*/

a.portfolio-link {
  margin: 0 auto;
  display: block;
  text-align: center;
}
</style>