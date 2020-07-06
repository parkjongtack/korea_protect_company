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
{{-- information04 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">정보마당</a></li>
                <li @if(request()->segment(1) == 'notice') class="on" @endif><a href="/notice/notice_list">공지사항</a></li>
                <li @if(request()->segment(1) == 'ey_law_data_room') class="on" @endif><a href="/ey_law_data_room/data_room_list/?category_type=ey_law_data_room&category_type=1">법령정보</a></li>
                <li @if(request()->segment(1) == 'ey_security_data_room') class="on" @endif><a href="/ey_security_data_room/data_room_list/?category_type=ey_security_data_room&category_type=1">보안서식</a></li>
                <li @if(request()->segment(1) == 'ey_data_room') class="on" @endif><a href="/ey_data_room/data_room_list/?category_type=ey_data_room&category_type=1">자료실</a></li>
                <li @if(request()->segment(1) == 'ey_nesletter') class="on" @endif><a href="/ey_newsletter/notice_list">뉴스레터</a></li>
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
            <div class="sub_tab">
			@if(request()->segment(1) == 'ey_law_data_room')
				<div class="tab1 tab_menu @if($_GET['category_type'] == 1) on @endif" style="width: 20%;" onclick="javascript:location.href='{{ $_SERVER['REDIRECT_URL'] }}/?category_type=1'">
					산업기술보호법
				</div>
				<div class="tab2 tab_menu @if($_GET['category_type'] == 2) on @endif" style="width: 20%;" onclick="javascript:location.href='{{ $_SERVER['REDIRECT_URL'] }}/?category_type=2'">
					영업비밀보호법
				</div>
				<div class="tab3 tab_menu @if($_GET['category_type'] == 3) on @endif" style="width: 20%;" onclick="javascript:location.href='{{ $_SERVER['REDIRECT_URL'] }}/?category_type=3'">
					방산기술보호법
				</div>
				<div class="tab4 tab_menu @if($_GET['category_type'] == 4) on @endif" style="width: 20%;" onclick="javascript:location.href='{{ $_SERVER['REDIRECT_URL'] }}/?category_type=4'">
					중소기술보호법
				</div>
				<div class="tab5 tab_menu @if($_GET['category_type'] == 5) on @endif" style="width: 20%;" onclick="javascript:location.href='{{ $_SERVER['REDIRECT_URL'] }}/?category_type=4'">
					기티 법령
				</div>
			@elseif(request()->segment(1) == 'ey_security_data_room')
				<div class="tab1 tab_menu @if($_GET['category_type'] == 1) on @endif" style="width: 50%;" onclick="javascript:location.href='{{ $_SERVER['REDIRECT_URL'] }}/?category_type=1'">
					규정
				</div>
				<div class="tab2 tab_menu @if($_GET['category_type'] == 2) on @endif" style="width: 50%;" onclick="javascript:location.href='{{ $_SERVER['REDIRECT_URL'] }}/?category_type=2'">
					서식
				</div>
			@else
				<div class="tab1 tab_menu @if($_GET['category_type'] == 1) on @endif" style="width: 25%;" onclick="javascript:location.href='{{ $_SERVER['REDIRECT_URL'] }}/?category_type=1'">
					연구보고서
				</div>
				<div class="tab2 tab_menu @if($_GET['category_type'] == 2) on @endif" style="width: 25%;" onclick="javascript:location.href='{{ $_SERVER['REDIRECT_URL'] }}/?category_type=2'">
					행사자료
				</div>
				<div class="tab3 tab_menu @if($_GET['category_type'] == 3) on @endif" style="width: 25%;" onclick="javascript:location.href='{{ $_SERVER['REDIRECT_URL'] }}/?category_type=3'">
					학술자료
				</div>
				<div class="tab4 tab_menu @if($_GET['category_type'] == 4) on @endif" style="width: 25%;" onclick="javascript:location.href='{{ $_SERVER['REDIRECT_URL'] }}/?category_type=4'">
					기타
				</div>
			@endif
            </div>
			@if($_GET['category_type'] == '1' && request()->segment(1) == 'ey_data_room')
				<div class="sub_inner tab_con">
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
								<td>
									@if($board_top_list->category == '1')
										연구보고서
									@elseif($board_top_list->category == '2')
										행사자료
									@elseif($board_top_list->category == '3')
										학술자료
									@elseif($board_top_list->category == '4')
										기타
									@endif									
								</td>
								<td class="table_td_title"><a href="/ey_data_room/board_view/?idx={{ $board_top_list->idx }}&board_type={{ $board_top_list->board_type }}">{{ $board_top_list->subject }}</td>
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
									<td>
										@if($data->category == '1')
											연구보고서
										@elseif($data->category == '2')
											행사자료
										@elseif($data->category == '3')
											학술자료
										@elseif($data->category == '4')
											기타
										@endif									
									</td>
									<td class="table_td_title"><a href="/ey_data_room/board_view/?idx={{ $data->idx }}&board_type={{ $data->board_type }}">{{ $data->subject }}</a></td>
									<td>{{ $data->writer }}</td>
									<td>{{ $data->reg_date_cut }}</td>
								</tr>
							@endforeach
						@endif
					</table>
					<div class="pag_write">
						{!! $paging_view !!}
					</div>
					<form name="search_form" action="{{ $_SERVER['REQUEST_URI'] }}/" class="board_search_con" onsubmit="return search();">
						<input type="hidden" name="page" />
						<input type="hidden" name="category_type" value="{{ $_GET['category_type'] }}" />
						<input type="text" name="key" placeholder="검색어를 입력하세요" value="{{ $key }}" required>
						<button></button>
					</form>
				</div>
			@elseif($_GET['category_type'] == '2' && request()->segment(1) == 'ey_data_room')
				<div class="sub_inner tab_con">
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
								<td>
									@if($board_top_list->category == '1')
										연구보고서
									@elseif($board_top_list->category == '2')
										행사자료
									@elseif($board_top_list->category == '3')
										학술자료
									@elseif($board_top_list->category == '4')
										기타
									@endif																	
								</td>
								<td class="table_td_title"><a href="/ey_data_room/board_view/?idx={{ $board_top_list->idx }}&board_type={{ $board_top_list->board_type }}">{{ $board_top_list->subject }}</td>
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
									<td>
										@if($data->category == '1')
											연구보고서
										@elseif($data->category == '2')
											행사자료
										@elseif($data->category == '3')
											학술자료
										@elseif($data->category == '4')
											기타
										@endif																		
									</td>
									<td class="table_td_title"><a href="/ey_data_room/board_view/?idx={{ $data->idx }}&board_type={{ $data->board_type }}">{{ $data->subject }}</a></td>
									<td>{{ $data->writer }}</td>
									<td>{{ $data->reg_date_cut }}</td>
								</tr>
							@endforeach
						@endif
					</table>
					<div class="pag_write">
						{!! $paging_view !!}
					</div>
					<form name="search_form" action="{{ $_SERVER['REQUEST_URI'] }}/" class="board_search_con" onsubmit="return search();">
						<input type="hidden" name="page" />
						<input type="hidden" name="category_type" value="{{ $_GET['category_type'] }}" />
						<input type="text" name="key" placeholder="검색어를 입력하세요" value="{{ $key }}" required>
						<button></button>
					</form>
				</div>
			@elseif($_GET['category_type'] == '3' && request()->segment(1) == 'ey_data_room')
            <div class="sub_inner tab_con">
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
							<td>
								@if($board_top_list->category == '1')
									연구보고서
								@elseif($board_top_list->category == '2')
									행사자료
								@elseif($board_top_list->category == '3')
									학술자료
								@elseif($board_top_list->category == '4')
									기타
								@endif																	
							</td>
							<td class="table_td_title"><a href="/ey_data_room/board_view/?idx={{ $board_top_list->idx }}&board_type={{ $board_top_list->board_type }}">{{ $board_top_list->subject }}</td>
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
								<td class="table_td_title"><a href="/ey_data_room/board_view/?idx={{ $data->idx }}&board_type={{ $data->board_type }}">{{ $data->subject }}</a></td>
								<td>{{ $data->writer }}</td>
								<td>{{ $data->reg_date_cut }}</td>
							</tr>
						@endforeach
					@endif
                </table>
                <div class="pag_write">
					{!! $paging_view !!}
                </div>
				<form name="search_form" action="{{ $_SERVER['REQUEST_URI'] }}/" class="board_search_con" onsubmit="return search();">
					<input type="hidden" name="page" />
					<input type="hidden" name="category_type" value="{{ $_GET['category_type'] }}" />
                    <input type="text" name="key" placeholder="검색어를 입력하세요" value="{{ $key }}" required>
                    <button></button>
                </form>
            </div>
			@elseif($_GET['category_type'] == '4' || request()->segment(1) == 'ey_law_data_room' || request()->segment(1) == 'ey_security_data_room')
				<div class="sub_inner tab_con">
					<table>
						<colgroup>
							<col width="80">
							<col width="400">
							<col width="80">
							<col width="80">
							<col width="80">
							<col width="100">
						</colgroup>
						<tr>
							<th>번호</th>
							<th>제목</th>
							<th>한글파일</th>
							<th>DOC파일</th>
							<th>PDF파일</th>
							<th>상세보기</th>
						</tr>
						<!-- <tr>
							<td>15</td>
							<td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
							<td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
							<td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
							<td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
							<td><a href="#none" class="file_see_more">상세보기</a></td>
						</tr> -->
						@foreach ($board_top_list as $board_top_list)
							<tr class="notice">
								<td>공지</td>
								<td class="table_td_title"><a href="/notice/notice_view/?idx={{ $board_top_list->idx }}&board_type={{ $board_top_list->board_type }}">{{ $board_top_list->subject }}</td>
								<td><a href="javascript:file_check('{{ $board_top_list->attach_file2 }}');"><img src="../img/file_down_img.png" alt=""></a></td>
								<td><a href="javascript:file_check('{{ $board_top_list->attach_file3 }}');"><img src="../img/file_down_img.png" alt=""></a></td>
								<td><a href="javascript:file_check('{{ $board_top_list->attach_file4 }}');"><img src="../img/file_down_img.png" alt=""></a></td>
								<td><a href="/ey_data_room/board_view/?idx={{ $board_top_list->idx }}&board_type={{ $board_top_list->board_type }}" class="file_see_more">상세보기</a></td>
							</tr>
						@endforeach
						@if($totalCount <= 0)
							<tr>
								<td colspan="6">게시글이 없습니다.</td>
							</tr>
						@else
							@foreach ($data as $data)
								<tr>
									<td>{{ $number-- }}</td>
									<td class="table_td_title"><a href="/notice/notice_view/?idx={{ $data->idx }}&board_type={{ $data->board_type }}">{{ $data->subject }}</td>
									<td><a href="javascript:file_check('{{ $data->attach_file2 }}');"><img src="../img/file_down_img.png" alt=""></a></td>
									<td><a href="javascript:file_check('{{ $data->attach_file3 }}');"><img src="../img/file_down_img.png" alt=""></a></td>
									<td><a href="javascript:file_check('{{ $data->attach_file4 }}');"><img src="../img/file_down_img.png" alt=""></a></td>
									<td><a href="/ey_data_room/board_view/?idx={{ $data->idx }}&board_type={{ $data->board_type }}" class="file_see_more">상세보기</a></td>
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
						<input type="hidden" name="category_type" value="{{ $_GET['category_type'] }}" />
						<input type="text" name="key" placeholder="검색어를 입력하세요" value="{{ $key }}" required>
						<button></button>
					</form>
				</div>
			@endif
        </div>
    </div>
	<script type="text/javascript">

		function file_check(file) {

			if(file == "") {
				alert("업로드된 파일이 없습니다.");
			} else {
				location.href = "/storage/app/images/" + file;
			}

		}

		function search() {
			var form = document.search_form;

			if(form.key.value == "") {
				alert("검색어를 입력해주세요.");
				return false;
			}

		}

	</script>
@include('footer')