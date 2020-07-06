@include('ey_header')
{{-- 해피콜, FAQ제외 게시판 --}}
<div class="con_main">
    <form action="/{{ request()->segment(1) }}/ey_board_write_action" name="board_write_form" method="post" enctype="multipart/form-data" >
		{{ csrf_field() }}
		<input type="hidden" name="board_idx" value="{{ $_GET['board_idx'] }}" />
		<input type="hidden" name="board_type" value="{{ request()->segment(1) }}" />
		<input type="hidden" name="write_type" value="{{ request()->segment(3) }}" />
        <div class="write_box">
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        성명
                    </div>
                    <div class="line_content">
						<input type="text" name="writer_name" value="{{ $data->writer_name }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        성별
                    </div>
                    <div class="line_content">
						<select name="writer_sex">
							<option value="male" @if($data->writer_sex == 'male') selected @endif >남자</option>
							<option value="felmale" @if($data->writer_sex == 'female') selected @endif >여자</option>
						</select>
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        소속기업구분
                    </div>
                    <div class="line_content">
						<input type="text" name="writer_corporation_divide" value="{{ $data->writer_corporation_divide }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        소속기업명
                    </div>
                    <div class="line_content">
						<input type="text" name="writer_corporation" value="{{ $data->writer_corporation }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        직위
                    </div>
                    <div class="line_content">
						<input type="text" name="writer_grade" value="{{ $data->writer_grade }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        연락처
                    </div>
                    <div class="line_content">
						<input type="text" name="writer_tel" value="{{ $data->writer_tel }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        이메일
                    </div>
                    <div class="line_content">
						<input type="text" name="writer_email" value="{{ $data->writer_email }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        우편번호
                    </div>
                    <div class="line_content">
						<input type="text" name="writer_post" value="{{ $data->writer_post }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        회사주소
                    </div>
                    <div class="line_content">
						<input type="text" name="writer_addr1" value="{{ $data->writer_addr1 }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        회사주소2
                    </div>
                    <div class="line_content">
						<input type="text" name="writer_addr2" value="{{ $data->writer_addr2 }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        CSO 양성교육을 알게 된 경로
                    </div>
                    <div class="line_content">
						<input type="text" name="writer_know_reason" value="{{ $data->writer_know_reason }}" />
                    </div>
                </div>
            </div>
            <!-- <div class="submit_box" style="text-align:center;margin-top:10px;">
                <input type="button" value="수정" onclick="javascript:write_action();">
                <input type="reset" value="취소">
            </div> -->
        </div>
    </form>
</div>
{{-- 해피콜 --}}

@include('ey_footer')