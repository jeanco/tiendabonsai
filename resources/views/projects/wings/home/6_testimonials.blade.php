<!-- Testimonial -->
    <div class="section-full content-inner bg-img-fix overlay-primary-dark">
        <div class="container">
            <div class="section-head text-center head-1 text-white">
      <h3 class="h3 text-uppercase">Testimonios de Nuestros Clientes</h3>
      <div class="dlab-separator bg-white" style=""></div>
    </div>
            <div class="section-content ">

      <div class="testimonial-center owl-carousel owl-btn-center-lr">
        @foreach ($testimonies as $testimony)
        <div class="item">
            <div class="testimonial-2 testimonial-bg style-1">
              <div class="testimonial-text">
              <p>{{ $testimony->description }}</p>
              </div>
              <div class="testimonial-detail clearfix">
                <div class="testimonial-box">
                <div class="testimonial-pic radius shadow"><img src="{{ $testimony->image }}" alt="" width="100" style="object-fit: cover; height: 100%;"></div>
                <strong class="testimonial-name" style="font-size: 15px;">{{ $testimony->full_name }}</strong>
                  <span class="text-white">Cliente</span>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        {{-- <div class="item">
          <div class="testimonial-2 testimonial-bg style-1">
            <div class="testimonial-text">
              <p> Un amigo me hablo de este Wings y realmente tuvo razon al decirme que trabajan para lograr conseguirme el mejor bus. Los profesionales de Wings me ayudaron a cubrir todas mis necesidades al momento de seleccionar un auto nuevo.</p>
            </div>
            <div class="testimonial-detail clearfix">
              <div class="testimonial-box">
                <div class="testimonial-pic radius shadow"><img src="/wings/img/user2.jpg" alt="" width="100" style="object-fit: cover; height: 100%;"></div>
                <strong class="testimonial-name">Angela Aragunde </strong>
                <span class="text-white">Cliente</span>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="testimonial-2 testimonial-bg style-1">
            <div class="testimonial-text">
              <p>Soy cliente de Wings hace muchos años por que salgo de aqui con el carro que me gusta y con el pago que se ajusta a mi bolsillo. Pa’ que voy a cambiar a Wings!</p>
            </div>
            <div class="testimonial-detail clearfix">
              <div class="testimonial-box">
                <div class="testimonial-pic radius shadow"><img src="/wings/img/user3.jpg" alt="" width="100" style="object-fit: cover; height: 100%;"></div>
                <strong class="testimonial-name">Jose Ortiz </strong>
                <span class="text-white">Cliente</span>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
        </div>
    </div>
    <!-- Testimonial -->
