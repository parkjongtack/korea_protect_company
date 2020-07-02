@include('header')
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
                    <li>해피콜 상담서비스</li>
                    <li class="on">상담서비스 소개</li>
                </ul>
            </div>
            <div class="sub_inner">
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
@include('footer')