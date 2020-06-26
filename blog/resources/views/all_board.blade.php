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
{{-- education02 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">보안교육</a></li>
                <li><a href="/education01">교육 소개</a></li>
                <li class="on"><a href="/education02">교육신청</a></li>
                <li><a href="/education03">이러닝 교육</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    교육신청
                </div>
                <ul>
                    <li>Home</li>
                    <li>보안교육</li>
                    <li class="on">교육신청</li>
                </ul>
            </div>
            <div class="sub_tab">
                <div class="tab1 tab_menu" style="width: 50%;">
                    CSO 양성교육
                </div>
                <div class="tab2 tab_menu" style="width: 50%;">
                    산업보안방문교육
                </div>
            </div>
            {{-- CSO 양성교육 --}}
            <div class="sub_inner tab_con on">
                <form action="" class="form_list">
                        <input type="text" placeholder="성명">
                        <select name="" id="">
                            <option value="" selected disabled>성별 선택</option>
                            <option value="남자">남자</option>
                            <option value="여자">여자</option>
                        </select>
                        <select name="" id="">
                            <option value="" selected disabled>소속 기업 구분 선택</option>
                            <option value="대기업">대기업</option>
                            <option value="중소 · 중견기업">중소 · 중견기업</option>
                            <option value="정부출연연구기관">정부출연연구기관</option>
                            <option value="기타">기타</option>
                        </select>
                        <input type="text" placeholder="소속 기업명">
                        <input type="text" placeholder="직위">
                        <input type="text" placeholder="연락처 (-제외)" class="bor_bot number">
                        <input type="text" placeholder="이메일" class="e_mail"> @ <input type="text" placeholder="" class="e_mail str_email02">
                        <select name="" id="" class="e_mail selectEmail">
                            <option value="1" selected>직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="hanmail.net">hanmail.net</option>
                            <option value="hotmail.com">hotmail.com</option>
                            <option value="nate.com">nate.com</option>
                            <option value="yahoo.co.kr">yahoo.co.kr</option>
                            <option value="empas.com">empas.com</option>
                            <option value="dreamwiz.com">dreamwiz.com</option>
                            <option value="freechal.com">freechal.com</option>
                            <option value="lycos.co.kr">lycos.co.kr</option>
                            <option value="korea.com">korea.com</option>
                            <option value="gmail.com">gmail.com</option>
                            <option value="hanmir.com">hanmir.com</option>
                            <option value="paran.com">paran.com</option>
                        </select>
                        <input type="text" placeholder="회사주소">
                        <input type="text" placeholder="(상세주소)">
                        <select name="" id="">
                            <option value="" selected disabled>CSO 양성교육을 알게 된 경로</option>
                            <option value="인터넷 검색">인터넷 검색</option>
                            <option value="지인 추천">지인 추천</option>
                            <option value="협회 행사 참석">협회 행사 참석</option>
                            <option value="협회 홈페이지">협회 홈페이지</option>
                            <option value="회원사 서비스 안내">회원사 서비스 안내</option>
                            <option value="직접 문의">직접 문의</option>
                            <option value="기타">기타</option>
                        </select>
                        <div class="submit_box">
                            <input type="submit" value="신청하기">
                            <input type="reset" value="취소하기">
                        </div>
                </form>
            </div>
            {{-- 산업보안방문교육 --}}
            <div class="sub_inner tab_con" style="display: none;">
                <form action="" class="form_list">
                        <input type="text" placeholder="회사명">
                        <input type="text" placeholder="담당자">
                        <input type="text" placeholder="부서">
                        <input type="text" placeholder="직위">
                        <input type="text" placeholder="연락처 (-제외)" class="bor_bot number">
                        <input type="text" placeholder="이메일" class="e_mail"> @ <input type="text" placeholder="" class="e_mail str_email02">
                        <select name="" id="" class="e_mail selectEmail">
                            <option value="1" selected>직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="hanmail.net">hanmail.net</option>
                            <option value="hotmail.com">hotmail.com</option>
                            <option value="nate.com">nate.com</option>
                            <option value="yahoo.co.kr">yahoo.co.kr</option>
                            <option value="empas.com">empas.com</option>
                            <option value="dreamwiz.com">dreamwiz.com</option>
                            <option value="freechal.com">freechal.com</option>
                            <option value="lycos.co.kr">lycos.co.kr</option>
                            <option value="korea.com">korea.com</option>
                            <option value="gmail.com">gmail.com</option>
                            <option value="hanmir.com">hanmir.com</option>
                            <option value="paran.com">paran.com</option>
                        </select>
                        <input type="text" placeholder="회사주소">
                        <input type="text" placeholder="(상세주소)">
                        <input type="text" placeholder="사업자등록번호">
                        <input type="text" placeholder="대표자 성명">
                        <input type="text" placeholder="업태/종목">
                        <input type="text" placeholder="교육희망일">
                        <label class="af_won"><input type="text" placeholder="매출액"></label>
                        <label class="af_person"><input type="text" placeholder="임직원수"></label>
                        <input type="text" placeholder="교육대상">
                        <label class="af_person"><input type="text" placeholder="교육예상 인원"></label>
                        <input type="text" placeholder="회사홈페이지">
                        <textarea placeholder="요청사항"></textarea>
                        <input type="file" id="file_up" style="display:none;">
                        <label for="file_up" class="file_up"><span>사업자등록사본</span> [파일선택] </label>
                        <p class="blue_list">*본인은 개인 정보 처리에 관하여 고지 받았으며 이를 충분히 이해하고 동의합니다.</p>
                        <div class="ok_box">
                            ※ 개인정보 수집·이용 안내<br><br>
                            한국산업기술보호협회 홈페이지 서비스 제공을 위하여 다음과 같이 최소한의 개인정보를 수집·이용하고자 합니다.<br><br>
                            1. 개인정보 수집·이용 목적 : 방문교육 접수, 교육관련 안내, 교육홍보<br>
                            2. 수집하는 개인정보의 항목 : 이름, 소속, 이메일, 전화번호<br>
                            3. 수집하는 개인정보의 항목 : 회사명, 성명, 연락처, 부서, 직위, 이메일, 주소<br>
                        </div>
                        <label for="check_box" class="check_box"><input type="checkbox" id="check_box">본인은 개인 정보 처리에 관하여 고지 받았으며 이를 충분히 이해하고 동의합니다.</label>
                        <div class="submit_box">
                            <input type="submit" value="신청하기">
                            <input type="reset" value="취소하기">
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    //파일
    $(document).ready(function(){
      var fileTarget = $('#file_up');
        fileTarget.on('change', function(){
            console.log('1');
            if(window.FileReader){
                var filename = $(this)[0].files[0].name;
            } else {
                var filename = $(this).val().split('/').pop().split('\\').pop();
            }
            $('.file_up').children('span').text(filename);
        });
    }); 
     //이메일 입력방식 선택 
     $('.selectEmail').change(function(){ 
         $(".selectEmail option:selected").each(function () { 
             if($(this).val()== '1'){ //직접입력일 경우 
                $(".str_email02").val(''); //값 초기화 
                $(".str_email02").attr("disabled",false); //활성화 
            }else{ //직접입력이 아닐경우 
                $(".str_email02").val($(this).text()); //선택값 입력
                $(".str_email02").attr("disabled",true); //비활성화 
            } 
        }); 
        }); 

    $('.form_list input[type=text]').keyup(function(){
        var cla = $(this).attr('class');
        if(cla == 'bor_bot number'){
            $(this).val($(this).val().replace(/[^0-9]/gi,""));
        }
    });
    </script>

{{-- happycall02 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">해피콜상담서비스</a></li>
                <li><a href="/happycall01">상담센터 소개</a></li>
                <li class="on"><a href="/happycall01">FAQ</a></li>
                <li><a href="/happycall01">상담하기</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    FAQ
                </div>
                <ul>
                    <li>Home</li>
                    <li>국가햄심기술</li>
                    <li class="on">FAQ</li>
                </ul>
            </div>
            <div class="sub_inner">
                <ul class="faq_list">
                    <li>
                        <div class="faq_q">
                            <span class="bold">Q.</span> 산업기술분쟁조정제도 : 조정합의 효력은 어떻게 되나요?<span class="arrow"></span>
                        </div>
                        <div class="faq_a">
                            <span class="bold">A.</span> 조정성립은 조정조서에 합의 내용을 기재함에 따라 재판상 화해와 동일한 효력을 갖습니다.
                        </div>
                    </li>
                    <li>
                        <div class="faq_q">
                            <span class="bold">Q.</span> 산업기술분쟁조정제도 : 조정합의 효력은 어떻게 되나요?<span class="arrow"></span>
                        </div>
                        <div class="faq_a">
                            <span class="bold">A.</span> 조정성립은 조정조서에 합의 내용을 기재함에 따라 재판상 화해와 동일한 효력을 갖습니다.
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

{{-- happycall03 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">해피콜 상담서비스</a></li>
                <li><a href="/happycall01">상담서비스 소개</a></li>
                <li><a href="/happycall02">FAQ</a></li>
                <li class="on"><a href="/happycall03">상담신청</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    상담신청
                </div>
                <ul>
                    <li>Home</li>
                    <li>정보마당</li>
                    <li class="on">상담신청</li>
                </ul>
            </div>
            <div class="sub_inner">
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
                    <tr>
                        <td>15</td>
                        <td>회원</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td>관리자</td>
                        <td>20-60-30</td>
                    </tr>
                    <tr class="reply">
                        <td>15</td>
                        <td>회원</td>
                        <td class="table_td_title"><span class="reply_img">답변</span>안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td>관리자</td>
                        <td>20-60-30</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>회원</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td>관리자</td>
                        <td>20-60-30</td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
{{-- information01 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">정보마당</a></li>
                <li class="on"><a href="/information01">공지사항</a></li>
                <li><a href="/information02">법령정보</a></li>
                <li><a href="/information03">보안서식</a></li>
                <li><a href="/information04">자료실</a></li>
                <li><a href="/information05">뉴스레터</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    공지사항
                </div>
                <ul>
                    <li>Home</li>
                    <li>정보마당</li>
                    <li class="on">공지사항</li>
                </ul>
            </div>
            <div class="sub_inner">
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
                    <tr class="notice">
                        <td>공지</td>
                        <td>회원</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td>관리자</td>
                        <td>20-60-30</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>회원</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td>관리자</td>
                        <td>20-60-30</td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
                <form action="" class="board_search_con">
                    <input type="text" name="" placeholder="검색어를 입력하세요" required>
                    <button></button>
                    <a href="#none" class="board_write">글쓰기</a>
                </form>
            </div>
        </div>
    </div>
{{-- information02 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">정보마당</a></li>
                <li><a href="/information01">공지사항</a></li>
                <li class="on"><a href="/information02">법령정보</a></li>
                <li><a href="/information03">보안서식</a></li>
                <li><a href="/information04">자료실</a></li>
                <li><a href="/information05">뉴스레터</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    자료실
                </div>
                <ul>
                    <li>Home</li>
                    <li>정보마당</li>
                    <li class="on">법령정보</li>
                </ul>
            </div>
            <div class="sub_tab">
                <div class="tab1 tab_menu on" style="width: 20%;">
                    산업기술보호법
                </div>
                <div class="tab2 tab_menu" style="width: 20%;">
                    영업비밀보호법
                </div>
                <div class="tab3 tab_menu" style="width: 20%;">
                    방산기술보호법
                </div>
                <div class="tab4 tab_menu" style="width: 20%;">
                    중소기업기술보호법
                </div>
                <div class="tab5 tab_menu" style="width: 20%;">
                    기타 법령
                </div>
            </div>
            {{-- 산업기술보호법 --}}
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
                    <tr>
                        <td>15</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none" class="file_see_more">상세보기</a></td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            {{-- 영업비밀보호법 --}}
            <div class="sub_inner tab_con" style="display:none;">
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
                    <tr>
                        <td>15</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none" class="file_see_more">상세보기</a></td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            {{-- 방산기술보호법 --}}
            <div class="sub_inner tab_con" style="display:none;">
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
                    <tr>
                        <td>15</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none" class="file_see_more">상세보기</a></td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            {{-- 중소기업기술보호법 --}}
            <div class="sub_inner tab_con" style="display:none;">
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
                    <tr>
                        <td>15</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none" class="file_see_more">상세보기</a></td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            {{-- 기타 법령 --}}
            <div class="sub_inner tab_con" style="display:none;">
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
                    <tr>
                        <td>15</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none" class="file_see_more">상세보기</a></td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
{{-- information03 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">정보마당</a></li>
                <li><a href="/information01">공지사항</a></li>
                <li><a href="/information02">법령정보</a></li>
                <li class="on"><a href="/information03">보안서식</a></li>
                <li><a href="/information04">자료실</a></li>
                <li><a href="/information05">뉴스레터</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    보안서식
                </div>
                <ul>
                    <li>Home</li>
                    <li>정보마당</li>
                    <li class="on">보안서식</li>
                </ul>
            </div>
            <div class="sub_tab">
                <div class="tab1 tab_menu on" style="width: 50%;">
                    규정
                </div>
                <div class="tab2 tab_menu" style="width: 50%;">
                    서식
                </div>
            </div>
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
                    <tr>
                        <td>15</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none" class="file_see_more">상세보기</a></td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="sub_inner tab_con" style="display: none">
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
                    <tr>
                        <td>15</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none" class="file_see_more">상세보기</a></td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
{{-- information04 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">정보마당</a></li>
                <li><a href="/information01">공지사항</a></li>
                <li><a href="/information02">법령정보</a></li>
                <li><a href="/information03">보안서식</a></li>
                <li class="on"><a href="/information04">자료실</a></li>
                <li><a href="/information05">뉴스레터</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    자료실
                </div>
                <ul>
                    <li>Home</li>
                    <li>정보마당</li>
                    <li class="on">자료실</li>
                </ul>
            </div>
            <div class="sub_tab">
                <div class="tab1 tab_menu on" style="width: 25%;">
                    연구보고서
                </div>
                <div class="tab2 tab_menu" style="width: 25%;">
                    행사자료
                </div>
                <div class="tab3 tab_menu" style="width: 25%;">
                    학술자료
                </div>
                <div class="tab4 tab_menu" style="width: 25%;">
                    기타
                </div>
            </div>
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
                    <tr>
                        <td>15</td>
                        <td>회원</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td>관리자</td>
                        <td>20-60-30</td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="sub_inner tab_con" style="display: none;">
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
                    <tr>
                        <td>15</td>
                        <td>회원</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td>관리자</td>
                        <td>20-60-30</td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="sub_inner tab_con" style="display: none;">
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
                    <tr>
                        <td>15</td>
                        <td>회원</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td>관리자</td>
                        <td>20-60-30</td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="sub_inner tab_con" style="display: none">
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
                    <tr>
                        <td>15</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none"><img src="../img/file_down_img.png" alt=""></a></td>
                        <td><a href="#none" class="file_see_more">상세보기</a></td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
{{-- information05 --}}
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">정보마당</a></li>
                <li><a href="/information01">공지사항</a></li>
                <li><a href="/information02">법령정보</a></li>
                <li><a href="/information03">보안서식</a></li>
                <li><a href="/information04">자료실</a></li>
                <li class="on"><a href="/information05">뉴스레터</a></li>
            </ul>
        </div>
        <div class="sub_outer">
            <div class="sub_nav">
                <div class="sub_subject f_nanum bold">
                    뉴스레터
                </div>
                <ul>
                    <li>Home</li>
                    <li>정보마당</li>
                    <li class="on">뉴스레터</li>
                </ul>
            </div>
            <div class="sub_inner">
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
                    <tr>
                        <td>15</td>
                        <td>회원</td>
                        <td class="table_td_title">안녕하세요 산업보안 정보도서관 게시판입니다</td>
                        <td>관리자</td>
                        <td>20-60-30</td>
                    </tr>
                </table>
                <div class="pag_write">
                    <ul>
                        <li><a href="#none"><img src="../img/pag_prev_btn.png" alt=""></a></li>
                        <li class="on"><a href="#none">1</a></li>
                        <li><a href="#none">2</a></li>
                        <li><a href="#none">3</a></li>
                        <li><a href="#none">4</a></li>
                        <li><a href="#none">5</a></li>
                        <li><a href="#none">6</a></li>
                        <li><a href="#none"><img src="../img/pag_next_btn.png" alt=""></a></li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
@include('footer')