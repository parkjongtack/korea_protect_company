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
                <form id="happyCallForm" name="happyCallForm" action="/happy_call/passwd_check_action" method="post" enctype="multipart/form-data" onsubmit="return happy_call_action();">
					{{ csrf_field() }}
					<input type="hidden" name="board_type" value="{{ $_GET['board_type'] }}" />
					<input type="hidden" name="idx" value="{{ $_GET['idx'] }}" />
                    <div class="board_write_con">
                        <div class="board_write_title">
                            <div class="wid_20">비밀번호입력</div>
                            <div class="wid_80"><input type="password" name="passwd"></div>
                        </div>
						<br/><br/>
                        <div class="board_write_submit">
                            <input type="submit" value="확인">
                            <input type="reset" value="취소하기">
                        </div>
                    </div>
                </form>
                <script>

					function happy_call_action() {
						var form = document.happyCallForm;
						
						if(form.passwd.value == "") {
							alert("비밀번호를 입력해주세요.");
							form.passwd.focus();
							return false;
						}

					}

                </script>
            </div>
        </div>
    </div>
@include('footer')