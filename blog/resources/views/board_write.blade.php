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
                <form action="">
                    <div class="board_write_con">
                        <div class="board_write_title">
                            <div class="wid_20">제목</div>
                            <div class="wid_80"><input type="text"></div>
                        </div>
                        <div class="board_write_file">
                            <div class="wid_20">
                                <input type="file" id="write_file">
                                <label for="write_file">파일첨부 +</label>
                            </div>
                            <div class="wid_80">
                                <label></label>
                                <span>삭제하기</span>
                            </div>
                        </div>
                        <div class="board_write">
                            <textarea placeholder="내용을 입력해주세요"></textarea>
                        </div>
                        <div class="board_write_secret">
                            <div class="secret_con">
                                <input type="checkbox" id="secret">
                                <label for="secret" class="secret">비밀댓글</label>
                                <input type="password" placeholder="비밀번호 입력">
                            </div>
                        </div>
                        <div class="board_write_submit">
                            <input type="submit" value="글쓰기">
                            <input type="reset" value="취소하기">
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@include('footer')