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
                        회사명
                    </div>
                    <div class="line_content">
						<input type="text" name="writer2_corporation" value="{{ $data->writer2_corporation }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        담당자
                    </div>
                    <div class="line_content">
						<input type="text" name="writer2_name" value="{{ $data->writer2_name }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        부서
                    </div>
                    <div class="line_content">
						<input type="text" name="writer2_position" value="{{ $data->writer2_position }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        직위
                    </div>
                    <div class="line_content">
						<input type="text" name="writer2_grade" value="{{ $data->writer2_grade }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        연락처
                    </div>
                    <div class="line_content">
						<input type="text" name="writer2_tel" value="{{ $data->writer2_tel }}" />
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
						<input type="text" name="writer_post" value="{{ $data->writer2_corporation_post }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        우편번호
                    </div>
                    <div class="line_content">
						<input type="text" name="writer2_corporation_post" value="{{ $data->writer2_corporation_post }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        회사주소1
                    </div>
                    <div class="line_content">
						<input type="text" name="writer2_corporation_addr1" value="{{ $data->writer2_corporation_addr1 }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        회사주소2
                    </div>
                    <div class="line_content">
						<input type="text" name="writer2_corporation_addr2" value="{{ $data->writer2_corporation_addr2 }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        대표자 성명
                    </div>
                    <div class="line_content">
						<input type="text" name="writer2_ceo" value="{{ $data->writer2_ceo }}" />
                    </div>
                </div>
            </div>
            <div class="write_line">
				<div class="all_line">
					<div class="line_title">
						업태/종목
					</div>
					<div class="line_content">
						<input type="text" name="writer2_divide" value="{{ $data->writer2_divide }}" />
					</div>
				</div>
			</div>
			<div class="write_line">
				<div class="all_line">
					<div class="line_title">
						교육희망일
					</div>
					<div class="line_content">
						<input type="text" name="writer2_education_hope_day" value="{{ $data->writer2_education_hope_day }}" />
					</div>
				</div>
			</div>
			<div class="write_line">
				<div class="all_line">
					<div class="line_title">
						매출액
					</div>
					<div class="line_content">
						<input type="text" name="total_money" value="{{ $data->total_money }}" />
					</div>
				</div>
			</div>
			<div class="write_line">
				<div class="all_line">
					<div class="line_title">
						임직원수
					</div>
					<div class="line_content">
						<input type="text" name="employee_count" value="{{ $data->employee_count }}" />
					</div>
				</div>
			</div>
			<div class="write_line">
				<div class="all_line">
					<div class="line_title">
						교육대상
					</div>
					<div class="line_content">
						<input type="text" name="education_target" value="{{ $data->education_target }}" />
					</div>
				</div>
			</div>
			<div class="write_line">
				<div class="all_line">
					<div class="line_title">
						교육예상 인원
					</div>
					<div class="line_content">
						<input type="text" name="education_expect_people" value="{{ $data->education_expect_people }}" />
					</div>
				</div>
			</div>
			<div class="write_line">
				<div class="all_line">
					<div class="line_title">
						회사홈페이지
					</div>
					<div class="line_content">
						<input type="text" name="corporation_homepage" value="{{ $data->corporation_homepage }}" />
					</div>
				</div>
			</div>
			<div class="write_line">
				<div class="all_line">
					<div class="line_title">
						요청사항
					</div>
					<div class="line_content">
						<textarea name="request_word" />{{ $data->request_word }}</textarea>
					</div>
				</div>
			</div>
			<div class="write_line">
				<div class="all_line">
					<div class="line_title">
						사업자등록사본
					</div>
					<div class="line_content">
						<a href="/storage/app/images/{{ $data->attach_file }}">{{ $data->attach_file }}</a>
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