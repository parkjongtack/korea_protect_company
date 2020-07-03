@include('header')
{{-- 
    education02 - 문의 게시판
    happycall02 - FAQ 게시판
    happycall03 - 일반 게시판
    information01 - 일반 게시판
    information02 - 파일 게시판
    information03 - 파일 게시판
    information04 - 일반 게시판/갤러리게시판
    information05 - 일반 게시판
--}}
{{-- happycall02 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">해피콜 상담서비스</a></li>
                <li><a href="/happycall01">상담센터 소개</a></li>
                <li class="on"><a href="/happycall02">FAQ</a></li>
                <li><a href="/happycall03">상담하기</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    FAQ
                </div>
                <ul>
                    <li>Home</li>
                    <li>국가핵심기술</li>
                    <li class="on">FAQ</li>
                </ul>
            </div>
            <div class="sub_inner">
                <ul class="faq_list">
					@foreach ($data as $data)
						<li>
							<div class="faq_q">
								<span class="bold">Q.</span> {{ $data->subject }}<span class="arrow"></span>
							</div>
							<div class="faq_a">
								<span class="bold">A.</span> {!! $data->contents !!} 
							</div>
						</li>
					@endforeach
                </ul>
            </div>
        </div>
    </div>

@include('footer')