@include('ey_header')
{{-- 공지사항 --}}
<div class="con_main">
    <form name="search_form" action="">
		<input type="hidden" name="page" />
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
                    <th>성명</th>
                    <th>부서</th>
                    <th>직위</th>
                    <th>연락처</th>
                    <th>기능</th>
                </tr>
            </thead>
            <tbody>
				@if($totalCount <= 0)
					<tr>
						<td colspan="6">게시글이 없습니다.</td>
					</tr>
				@else
					@foreach ($data as $data)
						<tr>
							<td>{{ $number-- }}</td>
							<td>{{ $data->writer2_name }}</td>
							<td><a href="/{{ request()->segment(1) }}/ey_write_notice/modify/?board_idx={{ $data->idx }}">{{ $data->writer2_position }}</a></td>
							<td>{{ $data->writer2_grade }}</td>
							<td>{{ $data->writer2_tel }}</td>
							<td class="delete_box"><!-- <a href="javascript:notice_control('{{ $data->idx }}');">삭제</a> --><a href="/{{ request()->segment(1) }}/ey_write_notice/modify/?board_idx={{ $data->idx }}" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
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