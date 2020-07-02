@include('header')
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">해피콜상담서비스</a></li>
                <li><a href="/happycall01">상담센터 소개</a></li>
                <li><a href="/happycall01">FAQ</a></li>
                <li class="on"><a href="/{{ request()->segment(1) }}">상담신청</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    상담신청
                </div>
                <ul>
                    <li>Home</li>
                    <li>해피콜 상담서비스</li>
                    <li class="on" onclick='javascript:location.href = "{{ request()->segment(1) }}"'>상담신청</li>
                </ul>
            </div>
            <div class="sub_inner">
                <div class="board_view_con">
                    <div class="board_title">
                        <h2>{{ $data->subject }}</h2>
                        <span class="write_date">{{ $data->reg_date }}</span>
                    </div>
                    <div class="board_sub_title">
                        <p>작성자 : {{ $data->writer }}</p>
                        <div class="file_down">
							@if($data->attach_file != '')
								첨부파일(1)
							@else
								첨부파일(0)
							@endif
                            <div class="file_down_real">
                                <a href="{{ asset('storage/app/images/') }}/{{ $data->attach_file }}" style="padding:10px;">{{ $data->attach_file }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="board_content">
                        <p>{!! nl2br($data->contents) !!}</p>
                        <!-- <img src="/img/board_search_btn.png" alt="" width="100%"> -->
                    </div>
                    <div class="write_reply">
                        <form id="commentForm" name="commentForm" method="post" action="/happy_call/comment_write_action" onsubmit="return commentWrite();">
							{{ csrf_field() }}
							<input type="hidden" name="board_type" value="{{ $data->board_type }}" />
							<input type="hidden" name="board_idx" value="{{ $data->idx }}" />
							작성자 : <input type="text" name="writer" />
							<div class="write_reply_con">
                                <textarea name="comment_contents" placeholder="댓글을 입력하세요"></textarea>
                                <input type="submit" value="댓글쓰기">
                            </div>
                            <!-- <input type="checkbox" id="secret">
                            <label for="secret" class="secret">비밀댓글</label>
                            <input type="password" placeholder="비밀번호 입력"> -->
                        </form>
                    </div>
                    <div class="see_reply_con">
                        <h3>댓글보기</h3>
						@foreach($comment_data as $comment_data)
                        <div class="see_reply">
                            <h4>{{ $comment_data->writer }}</h4>
                            <span>{{ $comment_data->reg_date }}</span>
                            <p>{!! nl2br($comment_data->contents) !!}</p>
                        </div>
						@endforeach
                        <!-- <div class="see_reply">
                            <h4>관리자</h4>
                            <span>20.06.26</span>
                            <p>보안 정보도서관 게시글 입니다 보안 정보도서관 게시글 입니다 보안 정보도서관 게시글 입니다 </p>
                        </div> -->
                    </div>
                    <div class="board_more">
                        <a href="/{{ request()->segment(1) }}">목록</a>
                        <a href="/{{ request()->segment(1) }}/board_view/?idx={{ $board_next_infom_idx }}&board_type={{ $board_next_infom_board_type }}">다음글</a>
                        <a href="/{{ request()->segment(1) }}/board_view/?idx={{ $board_prev_infom_idx }}&board_type={{ $board_prev_infom_board_type }}">이전글</a>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript">

		function commentWrite() {
			
			var form = document.commentForm;

			if(form.writer.value == "") {
				alert("작성자를 입력해주세요.");
				form.writer.focus();
				return false;
			}

			if(form.comment_contents.value == "") {
				alert("댓글을 입력해주세요.");
				form.comment_contents.focus();
				return false;
			}

		}

	</script>
    
@include('footer')