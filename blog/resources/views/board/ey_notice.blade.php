@include('ey_header')
{{-- 공지사항 --}}
<div class="con_main">
    <form action="">
        <table>
            <colgroup>
                <col width="100">
                <col width="100">
                <col width="550">
                <col width="150">
                <col width="150">
                <col width="180">
            </colgroup>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>카테고리</th>
                    <th>제목</th>
                    <th>글쓴이</th>
                    <th>등록일</th>
                    <th>기능</th>
                </tr>
            </thead>
            <tbody>
				@foreach ($board_top_list as $board_top_list)				
					<tr>
						<td>공지</td>
						<td>{{ $board_top_list->category }}</td>
						<td><a href="/ey_notice/ey_write_notice/modify/?board_idx={{ $board_top_list->idx }}">{{ $board_top_list->subject }}</a></td>
						<td>{{ $board_top_list->writer }}</td>
						<td>{{ $board_top_list->reg_date }}</td>
						<td class="delete_box"><a href="javascript:notice_control('{{ $board_top_list->idx }}');">삭제</a><a href="/ey_notice/ey_write_notice/modify/?board_idx={{ $board_top_list->idx }}" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
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
							<td>{{ $data->category }}</td>
							<td><a href="#none">{{ $data->subject }}</a></td>
							<td>{{ $data->writer }}</td>
							<td>{{ $data->reg_date }}</td>
							<td class="delete_box"><a href="javascript:notice_control('{{ $data->idx }}');">삭제</a><a href="/ey_notice/ey_write_notice/modify/?board_idx={{ $data->idx }}" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
						</tr>
					@endforeach
				@endif
                <!-- <tr>
                    <td>1</td>
                    <td>공지사항</td>
                    <td><a href="#none">가나다라마바사아자차카타파하</a></td>
                    <td>강산</td>
                    <td>2020-04-10</td>
                    <td class="delete_box"><a href="#none">삭제</a><a href="/ey_write_notice" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>공지사항</td>
                    <td><a href="#none">가나다라마바사아자차카타파하</a></td>
                    <td>홍길동</td>
                    <td>2020-04-10</td>
                    <td class="delete_box"><a href="#none">삭제</a><a href="/ey_write_notice" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>공지사항</td>
                    <td><a href="#none">가나다라마바사아자차카타파하</a></td>
                    <td>관리자</td>
                    <td>2020-04-10</td>
                    <td class="delete_box"><a href="#none">삭제</a><a href="/ey_write_notice" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
                </tr> -->
            </tbody>
        </table>
        <div class="paging">
            <!-- <ul>
                <li class="page page_start move_page"><a href="#none"></a></li>
                <li class="page page_prev move_page"><a href="#none"></a></li>
                <li class="page current">1</li>
                <li class="page"><a href="#none">2</a></li>
                <li class="page"><a href="#none">3</a></li>
                <li class="page"><a href="#none">4</a></li>
                <li class="page page_next move_page"><a href="#none"></a></li>
                <li class="page page_end move_page"><a href="#none"></a></li>
            </ul> -->
			{!! $paging_view !!}
        </div>
        <div class="create" style="padding-bottom:20px;">
            <a href="/ey_notice/ey_write_notice">등록</a>
        </div>
    </form>
</div>
<script type="text/javascript">

	function notice_control(idx) {

		if(confirm("삭제하시겠습니까?")) {
			var formData = new FormData();
			formData.append("idx", idx);
			formData.append('_token', '{{ csrf_token() }}');

			$.ajax({
				type: 'post',
				url: '/ey_notice/ey_notice_control',
				processData: false,
				contentType: false,
				data: formData,
				success: function(result) {
					alert("삭제되었습니다.");
					location.reload();
				},
				error: function(xhr, status, error) {
					//$("#loading").hide();
					return false;
				}
			});
		}
	}

</script>

@include('ey_footer')