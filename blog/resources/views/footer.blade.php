                <script type="text/javascript">

					function research_action_func() {

						

						if($('input:radio[name="satisfaction[]"]').is(':checked') == false) {
							alert("설문조사를 완료해주세요.");
							return false;
						}


						$("input[name=ResearchSelect]").val($('input:radio[name="satisfaction[]"]:checked').val());

					}

				</script>
				<div class="satisfaction inner">
                    <div class="satis_top">
                        이 페이지에서 제공하는 정보에 만족하십니까?
                    </div>
                    <div class="satis_bot">
                        <form action="/research_action" onsubmit="return research_action_func();" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="ResearchSelect"  />
							<input type="hidden" name="ResearchType" value="index" />
                            <label for="satis1"><input type="radio" name="satisfaction[]" id="satis1" value="5">매우만족</label>
                            <label for="satis2"><input type="radio" name="satisfaction[]" id="satis2" value="4">만족</label>
                            <label for="satis3"><input type="radio" name="satisfaction[]" id="satis3" value="3">보통</label>
                            <label for="satis4"><input type="radio" name="satisfaction[]" id="satis4" value="2">미흡</label>
                            <label for="satis5"><input type="radio" name="satisfaction[]" id="satis5" value="1">매우미흡</label>
                            <div class="satis_submit"><input type="submit" value="평가하기"></div>
                        </form>
                    </div>
                </div>
                <div class="f_slide_box">
                    <div class="inner">
                        <div class="f_slide_title">
                            <p>관련기관</p>
                            <div class="f_slide_btn">
                                <div class="f_slide_prev"></div>
                                <div class="f_slide_next"></div>
                            </div>
                        </div>
                        <div class="swiper-container f_slide">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                  <img src="/img/footer_slide1.png" alt="산업통상자원부">
                              </div>
                              <div class="swiper-slide">
                                  <img src="/img/footer_slide2.png" alt="한국산업기술보호협회">
                              </div>
                              <div class="swiper-slide">
                                  <img src="/img/footer_slide3.png" alt="국가정보원">
                              </div>
                              <div class="swiper-slide">
                                  <img src="/img/footer_slide4.png" alt="중소벤처기업부">
                              </div>
                              <div class="swiper-slide">
                                  <img src="/img/footer_slide5.png" alt="특허청">
                              </div>
                              <div class="swiper-slide">
                                  <img src="/img/footer_slide6.png" alt="방위사업청">
                              </div>
                              <div class="swiper-slide">
                                  <img src="/img/footer_slide7.png" alt="산업기밀보호센터">
                              </div>
                              <div class="swiper-slide">
                                  <img src="/img/footer_slide8.png" alt="영업비밀보호센터">
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer">
                <div class="inner">
                    <div class="f_logo">
                        <img src="img/f_logo.png" alt="">
                    </div>
                    <ul>
                        <li>우) 06732 서울시 서초구 서운로1길 34 대표전화 : 02-3489-7000 FAX : 02-3489-7046~7</li>
                        <li>Copyright (C) 2014 By KAITS. All Rights Reserved.</li>
                    </ul>
                </div>
            </div>
        </div>
        <script>
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
        </script>
    </body>
</html>