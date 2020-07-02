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
{{-- happycall03 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">해피콜 상담서비스</a></li>
                <li><a href="/happycall01">상담서비스 소개</a></li>
                <li><a href="/happycall02">FAQ</a></li>
                <li class="on"><a href="/happycall03">상담신청</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    상담신청
                </div>
                <ul>
                    <li>Home</li>
                    <li>정보마당</li>
                    <li class="on">상담신청</li>
                </ul>
            </div>
            <div class="sub_inner">
                <table>
                    <colgroup>
                        <col width="80">
                        <col width="110">
                        <col width="400">
                        <col width="100">
                        <col width="110">
                    </colgroup>
                    <tr>
                        <th>번호</th>
                        <th>카테고리</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>등록일</th>
                    </tr>
					@if($totalCount <= 0)
						<tr>
							<td colspan="5">게시글이 없습니다.</td>
						</tr>
					@else
						@foreach ($data as $data)
						<tr>
							<td>{{ $number-- }}</td>
							<td>{{ $data->category }}</td>
							@if($data->secret_status == 'Y')
								<td class="table_td_title"><a href="/happy_call/board_passwd_check/?idx={{ $data->idx }}&board_type={{ $data->board_type }}">{{ $data->subject }}</a></td>
							@else
								<td class="table_td_title"><a href="/happy_call/board_view/?idx={{ $data->idx }}&board_type={{ $data->board_type }}">{{ $data->subject }}</a></td>
							@endif
							<td>{{ $data->writer }}</td>
							<td>{{ $data->subject }}</td>
						</tr>
						@endforeach
					@endif
                    <!-- <tr class="reply">
                        <td>15</td>
                        <td>회원</td>
                        <td class="table_td_title"><span class="reply_img">답변</span>안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td>관리자</td>
                        <td>20-60-30</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>회원</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td>관리자</td>
                        <td>20-60-30</td>
                    </tr> -->
                </table>
				{!! $paging_view !!}
                <!-- <div class="pag_write">
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
				<form name="search_form" action="{{ $_SERVER['REQUEST_URI'] }}/" class="board_search_con" onsubmit="return search();">
                    <input type="text" name="key" placeholder="검색어를 입력하세요" value="{{ $key }}" required>
                    <button></button>
                    <a href="/happy_call/board_write_happy_call" class="board_write">글쓰기</a>
                </form>
            </div>
        </div>
    </div>
	<script type="text/javascript">

		function search() {
			var form = document.search_form;

			if(form.key.value == "") {
				alert("검색어를 입력해주세요.");
				return false;
			}

		}

	</script>
@include('footer')