@include('header')
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">검색결과</a></li>
                <li><a href="/happycall01">검색결과</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    검색결과
                </div>
                <ul>
                    <li>Home</li>
                    <li class="on">검색결과</li>
                </ul>
            </div>
            <div class="sub_inner all_search">
                <form action="">
                    <div class="search_top_outer">
                        <div class="search_top_inner">
                            <h2><span>'{{ request()->search }}'</span>에 대한 통합검색 결과입니다.</h2>
                            <div class="search_value">
								<form name="all_search_form2" action="/all_search" onsubmit="javascript:all_search2();">
									<input type="text" name="search" value="{{ request()->search }}">
									<button type="submit"></button>
								</form>
                            </div>
							<script type="text/javascript">
								function all_search2() {
									var form = document.all_search_form2;

									if(form.search.value == "") {
										alert("검색어를 입력해주세요.");
										return false;
									}
								}
							</script>
                        </div>
                    </div>
                </form>
				@if($faq_count == '0')
					<div class="search_result_box">
						<h3 style="text-align: center;">FAQ에 찾으시는 정보가 없습니다.</h3>
					</div>
				@else
					<div class="search_result_box">
						<h3>FAQ ({{ $faq_count }}건)</h3>
						<div class="search_result">
							@foreach($faq_list as $faq_list)
								<p style="cursor:pointer;" onclick="javascript:location.href='/faq/faq_list';">{{ $faq_list->subject }}</p>
								<span style="cursor:pointer;" onclick="javascript:location.href='/faq/faq_list';">
									{!! $faq_list->contents !!}
								</span>
							@endforeach
						</div>
					</div>
				@endif
				@if($notice_count == '0')
					<div class="search_result_box">
						<h3 style="text-align: center;">공지사항에 찾으시는 정보가 없습니다.</h3>
					</div>
				@else
					<div class="search_result_box">
						<h3>공지사항 ({{ $notice_count }}건)</h3>
						<div class="search_result">
							@foreach($notice_list as $notice_list)
								<p style="cursor:pointer;" onclick="javascript:location.href='/notice/notice_view?idx={{ $notice_list->idx }}&board_type=ey_notice';">{{ $notice_list->subject }}</p>
								<span style="cursor:pointer;" onclick="javascript:location.href='/notice/notice_view?idx={{ $notice_list->idx }}&board_type=ey_notice';">
									{!! $notice_list->contents !!}
								</span>
							@endforeach
						</div>
					</div>
				@endif
				@if($ey_law_data_room_count == '0')
					<div class="search_result_box">
						<h3 style="text-align: center;">법령정보에 찾으시는 정보가 없습니다.</h3>
					</div>
				@else
					<div class="search_result_box">
						<h3>법령정보 ({{ $ey_law_data_room_count }}건)</h3>
						<div class="search_result">
							@foreach($ey_law_data_room_list as $ey_law_data_room_list)
								<p style="cursor:pointer" onclick="javascript:location.href='/notice/notice_view?idx={{ $ey_law_data_room_list->idx }}&board_type=ey_law_data_room';">{{ $ey_law_data_room_list->subject }}</p>
								<span style="cursor:pointer" onclick="javascript:location.href='/notice/notice_view?idx={{ $ey_law_data_room_list->idx }}&board_type=ey_law_data_room';">
									{!! $ey_law_data_room_list->contents !!}
								</span>
							@endforeach
						</div>
					</div>
				@endif
				@if($ey_security_data_room_count == '0')
					<div class="search_result_box">
						<h3 style="text-align: center;">보안서식에 찾으시는 정보가 없습니다.</h3>
					</div>
				@else
					<div class="search_result_box">
						<h3>보안서식 ({{ $ey_security_data_room_count }}건)</h3>
						<div class="search_result">
							@foreach($ey_security_data_room_list as $ey_security_data_room_list)
								<p style="cursor:pointer" onclick="javascript:location.href='/notice/notice_view?idx={{ $ey_security_data_room_list->idx }}&board_type=ey_security_data_room';">{{ $ey_security_data_room_list->subject }}</p>
								<span style="cursor:pointer" onclick="javascript:location.href='/notice/notice_view?idx={{ $ey_security_data_room_list->idx }}&board_type=ey_security_data_room';">
									{!! $ey_security_data_room_list->contents !!}
								</span>
							@endforeach
						</div>
					</div>
				@endif
				@if($ey_data_room_count == '0')
					<div class="search_result_box">
						<h3 style="text-align: center;">자료실에 찾으시는 정보가 없습니다.</h3>
					</div>
				@else
					<div class="search_result_box">
						<h3>자료실 ({{ $ey_data_room_count }}건)</h3>
						<div class="search_result">
							@foreach($ey_data_room_list as $ey_data_room_list)
								<pstyle="cursor:pointer" onclick="javascript:location.href='/ey_data_room/board_view?idx={{ $ey_data_room_list->idx }}&board_type=ey_data_room';">{{ $ey_data_room_list->subject }}</p>
								<spanstyle="cursor:pointer" onclick="javascript:location.href='/ey_data_room/board_view?idx={{ $ey_data_room_list->idx }}&board_type=ey_data_room';">
									{!! $ey_data_room_list->contents !!}
								</span>
							@endforeach
						</div>
					</div>
				@endif
				@if($ey_newsletter_count == '0')
					<div class="search_result_box">
						<h3 style="text-align: center;">뉴스레터에 찾으시는 정보가 없습니다.</h3>
					</div>
				@else
					<div class="search_result_box">
						<h3>뉴스레터 ({{ $ey_newsletter_count }}건)</h3>
						<div class="search_result">
							@foreach($ey_newsletter_list as $ey_newsletter_list)
								<p style="cursor:pointer" onclick="javascript:location.href='/notice/notice_view?idx={{ $ey_newsletter_list->idx }}&board_type=ey_newsletter';">{{ $ey_newsletter_list->subject }}</p>
								<span style="cursor:pointer" onclick="javascript:location.href='/notice/notice_view?idx={{ $ey_newsletter_list->idx }}&board_type=ey_newsletter';">
									{!! $ey_newsletter_list->contents !!}
								</span>
							@endforeach
						</div>
					</div>
				@endif
                <!-- <div class="pag_write search_list">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
@include('footer')