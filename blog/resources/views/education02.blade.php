@include('header')
<div id="sub_sec">
    <div class="sub_top">
        기술보호로부터 시작되는 <span class="bold">산업 경쟁력 강화</span>
    </div>
    <div class="sub_con">
        <div class="sub_side">
            <ul>
                <li><a href="#none" class="bold f_nanum">보안교육</a></li>
                <li><a href="/education01">교육소개</a></li>
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
            <div class="sub_inner">
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
@include('footer')