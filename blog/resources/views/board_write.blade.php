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
                <li class="on"><a href="/happycall01">상담신청</a></li>
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
                    <li class="on">상담신청</li>
                </ul>
            </div>
            <div class="sub_inner">
                <form id="happyCallForm" name="happyCallForm" action="/happy_call/happy_call_action" method="post" enctype="multipart/form-data" onsubmit="return happy_call_action();">
					{{ csrf_field() }}
					<input type="hidden" name="board_type" value="{{ request()->segment(1) }}" />
					<input type="hidden" name="file_value" />
                    <div class="board_write_con">
                        <div class="board_write_title">
                            <div class="wid_20">제목</div>
                            <div class="wid_80"><input type="text" name="subject"></div>
                        </div>
                        <div class="board_write_title">
                            <div class="wid_20">카테고리</div>
                            <div class="wid_80"><input type="text" name="category" value="해피콜상담신청" readonly></div>
                        </div>
                        <div class="board_write_title">
                            <div class="wid_20">작성자</div>
                            <div class="wid_80"><input type="text" name="writer"></div>
                        </div>
						<div class="board_write_file">
                            <div class="wid_20">
                                <input type="file" id="write_file" name="write_file">
                                <label for="write_file" style="cursor:pointer;">파일첨부 +</label>
                            </div>
                            <div class="wid_80">
                                <label></label>
                                <span class="del_file" style="cursor:pointer;">삭제하기</span>
                            </div>
                        </div>
                        <div class="board_write">
                            <textarea name="contents" placeholder="내용을 입력해주세요"></textarea>
                        </div>
                        <div class="board_write_secret">
                            <div class="secret_con">
                                <input type="checkbox" id="secret" name="secretCheck">
                                <label for="secret" class="secret">비밀댓글</label>
                                <input type="password" name="secretNumber" placeholder="비밀번호 입력">
                            </div>
                        </div>
                        <div class="board_write_submit">
                            <input type="submit" value="글쓰기">
                            <input type="reset" value="취소하기">
                        </div>
                    </div>
                </form>
                <script>

					function happy_call_action() {
						var form = document.happyCallForm;
						
						if(form.subject.value == "") {
							alert("제목을 입력해주세요.");
							form.subject.focus();
							return false;
						}

						if(form.contents.value == "") {
							alert("제목을 입력해주세요.");
							form.contents.focus();
							return false;
						}

					}

					function deleteFile(){
						var form = $('#happyCallForm')[0];
						var formData = new FormData(form);
						formData.append("deleteimage", $('.wid_80 label').text());
		 
						$.ajax({
							url: '/image_delete_action',
							processData: false,
							contentType: false,
							data: formData,
							type: 'POST',
							success: function(result){
								alert("삭제 되었습니다.");
							}
						});
					}

                    $('#write_file').change(function(){

						var form = $('#happyCallForm')[0];
						var formData = new FormData(form);
						formData.append("write_file", $("#write_file")[0].files[0]);
		 
						$.ajax({
							url: '/image_upload_action',
							processData: false,
							contentType: false,
							data: formData,
							type: 'POST',
							success: function(result){
								fileName = result;
								$('input[name=file_value]').val(fileName);
								$('.wid_80 label').text(fileName);
								alert("첨부되었습니다.");
							}, 
                            error: function(e) {
                                console.log(e.responseText);
                            }
						});

                        //var fileValue = $("#write_file").val().split("\\");
                        //var fileName = fileValue[fileValue.length-1]; // 파일명
                        //$('.wid_80 label').text(fileName)
                        //console.log(fileName);
                    });
                    $('.del_file').click(function(){

						var form = $('#happyCallForm')[0];
						var formData = new FormData(form);
						formData.append("deleteimage", $('.wid_80 label').text());

						$.ajax({
							url: '/image_delete_action',
							processData: false,
							contentType: false,
							data: formData,
							type: 'POST',
							success: function(result){
								$('.wid_80 label').text('');
								$('input[name=file_value]').val('');
								alert("삭제 되었습니다.");
							}
						});

                        //$('.wid_80 label').text('');
                        //$('#write_file').attr({value:''});
                    });
                    //if($('.wid_80 label').text() == '' || $('.wid_80 label').text() == ''){
                    //    $("#write_file").remove();
                    //}
                </script>
            </div>
        </div>
    </div>
@include('footer')