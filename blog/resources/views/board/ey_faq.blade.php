@include('ey_header')
{{-- FAQ게시판 --}}
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
                    <th>카테고리</th>
                    <th>제목</th>
                    <th>글쓴이</th>
                    <th>등록일</th>
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
							<td>{{ $data->category }}</td>
							<td><a href="#none">{{ $data->subject }}</a></td>
							<td>{{ $data->writer }}</td>
							<td>{{ $data->reg_date }}</td>
							<td class="delete_box"><a href="javascript:faq_control('{{ $data->idx }}');">삭제</a><a href="/ey_faq/ey_write_faq/modify/?board_idx={{ $data->idx }}" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
						</tr>
					@endforeach
				@endif
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
            <a href="/ey_faq/ey_write_faq">등록</a>
        </div>
    </form>
</div>
<script type="text/javascript">

	function faq_control(idx) {

		if(confirm("삭제하시겠습니까?")) {
			var formData = new FormData();
			formData.append("idx", idx);
			formData.append('_token', '{{ csrf_token() }}');

			$.ajax({
				type: 'post',
				url: '/ey_faq/ey_faq_control',
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