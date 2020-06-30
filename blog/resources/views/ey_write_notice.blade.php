@include('ey_header')
{{-- 해피콜, FAQ제외 게시판 --}}
<div class="con_main">
    <form action="" name="form1">
        <div class="write_box">
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        카테고리
                    </div>
                    <div class="line_content">
                        <select name="BDIV" id="ctg" class="sel_cate" onchange="fnCngList(this.value);">
                            <option value="">대분류</option>
                            <option value="B1">공지사항</option>
                            <option value="B2">법령정보</option>
                            <option value="B3">보안서식</option>
                            <option value="B4">자료실</option>
                            <option value="B5">뉴스레터</option>
                        </select>
                        <select name="SDIV" id="ctg_nm" class="sel_list" onchange="s_fnCngList(this.value);">
                            <option value="">소분류</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="write_line cate_file">
                <div class="all_line">
                    <div class="line_title">
                        파일선택
                    </div>
                    <div class="line_content">
                        카테고리를 선택해주세요
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        우선순위
                    </div>
                    <div class="line_content">
                        <input type="text">
                    </div>
                </div>
            </div>
            <div class="submit_box">
                <input type="submit" value="등록">
                <input type="reset" value="취소">
            </div>
        </div>
    </form>
</div>
<script>
    function fnCngList(sVal){
        var f = document.form1;
        var opt = $("#ctg_nm option").length;
        
        if(sVal == "") {
            num = new Array("소분류");
            val = new Array("소분류");
        }else if(sVal == "B1") {
            num = new Array("공지사항");
            val = new Array("공지사항");
        }else if(sVal == "B2") {
            num = new Array("산업기술보호법","영업비밀보호법","방산기술보호법","중소기업기술보호법","기타 법렵");
            val = new Array("산업기술보호법","영업비밀보호법","방산기술보호법","중소기업기술보호법","기타 법렵");
        }else if(sVal == "B3") {
            num = new Array("규정","서식");
            val = new Array("규정","서식");
        }else if(sVal == "B4") {
            num = new Array("연구보고서","행사자료","학술자료","기타");
            val = new Array("연구보고서","행사자료","학술자료","기타");
        }else if(sVal == "B5") {
            num = new Array("뉴스레터");
            val = new Array("뉴스레터");
        }
    
        for(var i=0; i<opt; i++) {
            f.SDIV.options[0] = null;
        }
    
        for(k=0;k < num.length;k++) {
            f.SDIV.options[k] = new Option(num[k],val[k]);
        }
    }
    function s_fnCngList(aVal){
        if(aVal == "기타"){
            $('.cate_file .line_title').text("이미지선택");
            $(".cate_file .line_content").text("");
            $('<input type="file">').appendTo(".cate_file .line_content")
        }else{
            $('.cate_file .line_title').text("파일선택");
            $(".cate_file .line_content").text("");
            $(".cate_file .line_content input").remove();
            $('<input type="file">').appendTo(".cate_file .line_content")
        }
    }
</script>
{{-- 해피콜 --}}

@include('ey_footer')