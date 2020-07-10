@include('header')
{{-- information01 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">정보마당</a></li>
                <li @if(request()->segment(1) == 'notice') class="on" @endif ><a href="/notice/notice_list">공지사항</a></li>
                <li @if(request()->segment(1) == 'ey_law_data_room') class="on" @endif ><a href="/ey_law_data_room/data_room_list/?category_type=ey_law_data_room&category_type=1">법령정보</a></li>
                <li @if(request()->segment(1) == 'ey_security_data_room') class="on" @endif ><a href="/ey_security_data_room/data_room_list/?category_type=ey_security_data_room&category_type=1">보안서식</a></li>
                <li @if(request()->segment(1) == 'ey_data_room') class="on" @endif ><a href="/ey_data_room/data_room_list/?category_type=ey_data_room&category_type=1">자료실</a></li>
                <li @if(request()->segment(1) == 'ey_newsletter') class="on" @endif ><a href="/ey_newsletter/notice_list">뉴스레터</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    @if(request()->segment(1) == 'notice')
					공지사항
					@elseif(request()->segment(1) == 'ey_law_data_room')
					법령정보
					@elseif(request()->segment(1) == 'ey_security_data_room')
					보안서식
					@elseif(request()->segment(1) == 'ey_data_room')
					자료실
					@elseif(request()->segment(1) == 'ey_newsletter')
					뉴스레터
					@endif
                </div>
                <ul>
                    <li>Home</li>
                    <li>정보마당</li>
                    <li class="on">
						@if(request()->segment(1) == 'notice')
						공지사항
						@elseif(request()->segment(1) == 'ey_law_data_room')
						법령정보
						@elseif(request()->segment(1) == 'ey_security_data_room')
						보안서식
						@elseif(request()->segment(1) == 'ey_data_room')
						자료실
						@elseif(request()->segment(1) == 'ey_newsletter')
						뉴스레터
						@endif
                    </li>
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
					@foreach ($board_top_list as $board_top_list)
						<tr class="notice">
							<td>공지</td>
							<td>{{ $board_top_list->category }}</td>
							<td class="table_td_title"><a href="/notice/notice_view/?idx={{ $board_top_list->idx }}&board_type={{ $board_top_list->board_type }}">{{ $board_top_list->subject }}</td>
							<td>{{ $board_top_list->writer }}</td>
							<td>{{ $board_top_list->reg_date_cut }}</td>
						</tr>
					@endforeach
					@if($totalCount <= 0)
						<tr>
							<td colspan="5">게시글이 없습니다.</td>
						</tr>
					@else
						@foreach ($data as $data)
							<tr>
								<td>{{ $number-- }}</td>
								<td>{{ $data->category }}</td>
								<td class="table_td_title"><a href="/notice/notice_view/?idx={{ $data->idx }}&board_type={{ $data->board_type }}">{{ $data->subject }}</a></td>
								<td>{{ $data->writer }}</td>
								<td>{{ $data->reg_date_cut }}</td>
							</tr>
						@endforeach
					@endif
                </table>
                <div class="pag_write">
                    <!-- <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul> -->
					{!! $paging_view !!}
                </div>
				<form name="search_form" action="{{ $_SERVER['REQUEST_URI'] }}/" class="board_search_con" onsubmit="return search();">
					<input type="hidden" name="page" />
                    <input type="text" name="key" placeholder="검색어를 입력하세요" value="{{ $key }}" required>
                    <button></button>
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