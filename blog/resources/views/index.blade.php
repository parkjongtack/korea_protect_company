            @include('header')
            <div id="section">
                <div class="main_slide_box">
                    <div class="swiper-container main_slide">
                        <div class="swiper-wrapper">
						@foreach($pcslider_main as $pcslider_main)
                          <div class="swiper-slide">
                              <img src="/storage/app/images/{{ $pcslider_main->attach_file }}" alt="">
                          </div>
						@endforeach
                          <!-- <div class="swiper-slide">
                              <img src="img/main_slide_01.png" alt="">
                          </div>
                          <div class="swiper-slide">
                              <img src="img/main_slide_01.png" alt="">
                          </div>
                          <div class="swiper-slide">
                              <img src="img/main_slide_01.png" alt="">
                          </div> -->
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <div class="autoplay_btn">
                            <img src="img/start_btn.png" alt="" class="start_btn">
                            <img src="img/stop_btn.png" alt="" class="pause_btn">
                        </div>
                    </div>
                </div>
                <div class="main_sub_box">
                    <ul class="inner">
                        <a href="#"><li>
                            <img src="img/main_go_btn.png" alt="">
                        </li></a>
                        <a href="/institution03"><li>
                            <img src="img/main_sub_menu1.png" alt="">
                        </li></a>
                        <a href="/happy_call"><li>
                            <img src="img/main_sub_menu2.png" alt="">
                        </li></a>
                        <a href="/request_education"><li>
                            <img src="img/main_sub_menu3.png" alt="">
                        </li></a>
                        <a href="/education03"><li>
                            <img src="img/main_sub_menu4.png" alt="">
                        </li></a>
                    </ul>
                </div>
                <div class="notice_box">
                    <div class="inner">
                        <div class="main_tab_box">
                            <ul class="main_tab">
                                <li class="on tab_click">공지사항</li>
                                <li class="tab_click">자료실</li>
                                <a href="#">
                                    <a href="javascript:detail_list();">
                                        <li></li>
                                    </a>
                                </a>
                            </ul>
                            <ul id="tab_list1" class="tab_list">
								@foreach($notice as $notice)
                                <a href="/notice/notice_view/?idx={{ $notice->idx }}&board_type=ey_notice"><li>
                                    <p>{{ $notice->subject }}</p>
                                    <span>{{ $notice->reg_date_cut }}</span>
                                </li></a>
								@endforeach
                                <!-- <a href="#"><li>
                                    <p>[한국산업기술보호협회]산업보안 이러닝 플랫폼 구축,운영 욕역 입찰 재공고</p>
                                    <span>2020-04-17</span>
                                </li></a>
                                <a href="#"><li>
                                    <p>[한국산업기술보호협회]산업보안 이러닝 플랫폼 구축,운영 욕역 입찰 공고</p>
                                    <span>2020-04-17</span>
                                </li></a> -->
                            </ul>
                            <ul id="tab_list2" class="tab_list">
								@foreach($data_room as $data_room)
                                <a href="/ey_data_room/board_view/?idx={{ $data_room->idx }}&board_type=ey_data_room"><li>
                                    <p>{{ $data_room->subject }}</p>
                                    <span>{{ $data_room->reg_date_cut }}</span>
                                </li></a>
								@endforeach
                                <!-- <a href="#"><li>
                                    <p>자료실에 대한 내용입니다.</p>
                                    <span>2020-04-17</span>
                                </li></a>
                                <a href="#"><li>
                                    <p>자료실에 대한 내용입니다.</p>
                                    <span>2020-04-17</span>
                                </li></a> -->
                            </ul>
                        </div>
                        <div class="main_sub_slide_box">
                            <div class="swiper-container sub_slide">
                                <div class="swiper-wrapper">
								@foreach($pcslider_sub as $pcslider_sub)
                                  <div class="swiper-slide">
                                      <img src="img/sub_banner1.png" alt="">
                                  </div>
								@endforeach
                                  <!-- <div class="swiper-slide">
                                      <img src="img/sub_banner1.png" alt="">
                                  </div>
                                  <div class="swiper-slide">
                                      <img src="img/sub_banner1.png" alt="">
                                  </div>
                                  <div class="swiper-slide">
                                      <img src="img/sub_banner1.png" alt="">
                                  </div> -->
                                </div>
                                <div class="sub_slide_btn">
                                    <div class="sub_slide_prev"></div>
                                    <div class="sub_slide_next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>

			function detail_list() {
				
				if($(".tab_click:eq(0)").hasClass('on') == true) {
					location.href = '/notice/notice_list';
				}

				if($(".tab_click:eq(1)").hasClass('on') == true) {
					location.href = '/ey_data_room/data_room_list?category_type=ey_data_room&category_type=1';
				}
				
			}


            var swiper1 = new Swiper('.main_slide', {
              spaceBetween: 0,
              centeredSlides: true,
              loop: true,
              autoplay: {
                delay: 2500,
                disableOnInteraction: false,
              },
              pagination: {
                el: '.swiper-pagination',
                clickable: true,
              },
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
            });

            var swiper2 = new Swiper('.sub_slide', {
              spaceBetween: 0,
              loop: true,
              centeredSlides: true,
              autoplay: {
                delay: 2500,
                disableOnInteraction: false,
              },
              navigation: {
                nextEl: '.sub_slide_next',
                prevEl: '.sub_slide_prev',
              },
            });   

            var swiper = new Swiper('.f_slide', {
              slidesPerView: 5,
              loop: true,
              spaceBetween: 25,
              freeMode: true,
              autoplay: {
                delay: 2500,
                disableOnInteraction: true,
              },
              navigation: {
                prevEl: '.f_slide_prev',
                nextEl: '.f_slide_next',
              },
            });
            $('.autoplay_btn img').hide();
            $('.pause_btn').show();
            $('.start_btn').click(function(){
                    swiper1.autoplay.start();
                    $(this).hide()
                    $(this).siblings().show();
            });
            $('.pause_btn').click(function(){
                    swiper1.autoplay.stop();
                    $(this).hide()
                    $(this).siblings().show();
            });
        </script>
        @include('footer')