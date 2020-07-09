@include('ey_header')
{{-- 해피콜, FAQ제외 게시판 --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/editor/css/froala_editor.css">
<link rel="stylesheet" href="/editor/css/froala_style.css">
<link rel="stylesheet" href="/editor/css/plugins/code_view.css">
<link rel="stylesheet" href="/editor/css/plugins/draggable.css">
<link rel="stylesheet" href="/editor/css/plugins/colors.css">
<link rel="stylesheet" href="/editor/css/plugins/emoticons.css">
<link rel="stylesheet" href="/editor/css/plugins/image_manager.css">
<link rel="stylesheet" href="/editor/css/plugins/image.css">
<link rel="stylesheet" href="/editor/css/plugins/line_breaker.css">
<link rel="stylesheet" href="/editor/css/plugins/table.css">
<link rel="stylesheet" href="/editor/css/plugins/char_counter.css">
<link rel="stylesheet" href="/editor/css/plugins/video.css">
<link rel="stylesheet" href="/editor/css/plugins/fullscreen.css">
<link rel="stylesheet" href="/editor/css/plugins/file.css">
<link rel="stylesheet" href="/editor/css/plugins/quick_insert.css">
<link rel="stylesheet" href="/editor/css/plugins/help.css">
<link rel="stylesheet" href="/editor/css/third_party/spell_checker.css">
<link rel="stylesheet" href="/editor/css/plugins/special_characters.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  <style>

    div#editor {
      width: 100%;
      /*margin: auto;*/
      text-align: left;
    }

    .ss {
      background-color: red;
    }
  </style>
<div class="con_main">
    <form action="/{{ request()->segment(1) }}/ey_board_write_action" name="board_write_form" method="post" enctype="multipart/form-data" >
		{{ csrf_field() }}
		<input type="hidden" name="board_type" value="{{ request()->segment(1) }}" />
		<input type="hidden" name="write_type" value="{{ request()->segment(3) }}" />
        <div class="write_box">
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        카테고리
                    </div>
                    <div class="line_content">
					@if(request()->segment(1) == 'ey_law_data_room')
						<select name="category">
							<option value="1">산업기술보호법</option>
							<option value="2">영업비밀보호법</option>
							<option value="3">방산기술보호법</option>
							<option value="4">중소기업기술보호법</option>
							<option value="5">기타 법령</option>
						</select>
					@elseif(request()->segment(1) == 'ey_security_data_room')
						<select name="category">
							<option value="1">규정</option>
							<option value="2">서식</option>
						</select>
					@else
						<select name="category" onchange="javascript:data_room_type(this.value);">
							<option value="1">연구보고서</option>
							<option value="2">행사자료</option>
							<option value="3">학술자료</option>
							<option value="4">기타</option>
						</select>
					@endif
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_content" style="padding-left:10px;">
						<input type="checkbox" name="top_type" value="Y" id="write_check"/> <label for="write_check">최상단 공지 지정</label>
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        제목
                    </div>
                    <div class="line_content">
						<input type="text" name="subject" />
                    </div>
                </div>
            </div>
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title" style="vertical-align:middle;margin-top:-50px;">내용</div>
                    <div class="line_content">
						<div id="editor">
							<div id="edit" style="width:900px;"></div>
						</div>
						<textarea name="contents" cols="60" rows="10" style="display:none;" ></textarea>
                    </div>
                </div>
            </div>
			@if(request()->segment(1) != 'ey_law_data_room' && request()->segment(1) != 'ey_security_data_room')
				<div id="normal_file_area" class="write_line cate_file">
					<div class="all_line">
						<div class="line_title">
							파일선택
						</div>
						<div class="line_content">
							<input type="file" name="writer_file" />
						</div>
					</div>
				</div>
			@endif
			@if(request()->segment(1) == 'ey_law_data_room' || request()->segment(1) == 'ey_security_data_room')
				<div id="hwp_file_area" class="write_line cate_file">
					<div class="all_line">
						<div class="line_title">
							HWP파일선택
						</div>
						<div class="line_content">
							<input type="file" name="writer_file_hwp" />
						</div>
					</div>
				</div>
				<div id="doc_file_area" class="write_line cate_file">
					<div class="all_line">
						<div class="line_title">
							DOC파일선택
						</div>
						<div class="line_content">
							<input type="file" name="writer_file_doc" />
						</div>
					</div>
				</div>
				<div id="pdf_file_area" class="write_line cate_file">
					<div class="all_line">
						<div class="line_title">
							PDF파일선택
						</div>
						<div class="line_content">
							<input type="file" name="writer_file_pdf" />
						</div>
					</div>
				</div>
			@else
				<div id="hwp_file_area" class="write_line cate_file" style="display:none;">
					<div class="all_line">
						<div class="line_title">
							HWP파일선택
						</div>
						<div class="line_content">
							<input type="file" name="writer_file_hwp" />
						</div>
					</div>
				</div>
				<div id="doc_file_area" class="write_line cate_file" style="display:none;">
					<div class="all_line">
						<div class="line_title">
							DOC파일선택
						</div>
						<div class="line_content">
							<input type="file" name="writer_file_doc" />
						</div>
					</div>
				</div>
				<div id="pdf_file_area" class="write_line cate_file" style="display:none;">
					<div class="all_line">
						<div class="line_title">
							PDF파일선택
						</div>
						<div class="line_content">
							<input type="file" name="writer_file_pdf" />
						</div>
					</div>
				</div>
			@endif
            <div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        작성자
                    </div>
                    <div class="line_content">
                        <input type="text" name="writer" value="admin" readonly style="border:none;">
                    </div>
                </div>
            </div>
            <div class="submit_box" style="text-align:center;margin-top:10px;">
                <input type="button" value="등록" onclick="javascript:write_action();">
                <input type="reset" value="취소">
            </div>
        </div>
    </form>
</div>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src="/editor/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/help.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/print.min.js"></script>
  <script type="text/javascript" src="/editor/js/third_party/spell_checker.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/special_characters.min.js"></script>
  <script type="text/javascript" src="/editor/js/plugins/word_paste.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script>

	function data_room_type(value) {
		if(value == 4) {
			$("#normal_file_area").hide();
			$("#hwp_file_area").show();
			$("#doc_file_area").show();
			$("#pdf_file_area").show();
		} else {
			$("#normal_file_area").show();
			$("#hwp_file_area").hide();
			$("#doc_file_area").hide();
			$("#pdf_file_area").hide();
		}
	}

    (function () {
      //new FroalaEditor("#edit")

		new FroalaEditor('#edit', {
			// Set the image upload parameter.
			imageUploadParam: 'upfiles',

			// Set the image upload URL.
			imageUploadURL: './file_upload.php',

			// Additional upload params.
			imageUploadParams: {id: 'upfiles'},

			// Set request type.
			imageUploadMethod: 'POST',

			// Set max image size to 5MB.
			imageMaxSize: 5 * 1024 * 1024,

			// Allow to upload PNG and JPG.
			imageAllowedTypes: ['jpeg', 'jpg', 'png'],

			events: {
			  'image.beforeUpload': function (images) {
				// Return false if you want to stop the image upload.
				//alert('1');
				//console.log(images);
			  },
			  'image.uploaded': function (response) {
				// Image was uploaded to the server.
				//alert('2');
				//console.log(response);
			  },
			  'image.inserted': function ($img, response) {
				// Image was inserted in the editor.
				//alert('3');
				//alert($img);
				//console.log(response);
			  },
			  'image.replaced': function ($img, response) {
				// Image was replaced in the editor.
				//alert('4');
				//alert($img);
				//console.log(response);
			  },
			  'image.error': function (error, response) {
				  console.log(error);
				  console.log(response);
				// Bad link.
				if (error.code == 1) {  }

				// No link in upload response.
				else if (error.code == 2) {  }

				// Error during image upload.
				else if (error.code == 3) {  }

				// Parsing response failed.
				else if (error.code == 4) {  }

				// Image too text-large.
				else if (error.code == 5) {  }

				// Invalid image type.
				else if (error.code == 6) {  }

				// Image can be uploaded only to same domain in IE 8 and IE 9.
				else if (error.code == 7) {  }

				// Response contains the original server response to the request if available.
			  }
			},


			// Set the video upload parameter.
			videoUploadParam: 'upfiles',

			// Set the video upload URL.
			videoUploadURL: './file_upload.php',

			// Additional upload params.
			videoUploadParams: {id: 'upfiles'},

			// Set request type.
			videoUploadMethod: 'POST',

			// Set max video size to 50MB.
			videoMaxSize: 5000 * 1024 * 1024,

			// Allow to upload MP4, WEBM and OGG
			videoAllowedTypes: ['webm', 'jpg', 'ogg', 'mp4', 'wmv', 'avi'],

			events: {
			  'video.beforeUpload': function (videos) {
				  //alert('1');
				// Return false if you want to stop the video upload.
			  },
			  'video.uploaded': function (response) {
				// Video was uploaded to the server.
				  //alert('2');
			  },
			  'video.inserted': function ($img, response) {
				// Video was inserted in the editor.
				  //alert('3');
			  },
			  'video.replaced': function ($img, response) {
				// Video was replaced in the editor.
			  },
			  'video.error': function (error, response) {
				  //alert('4');
				// Bad link.
				if (error.code == 1) {  }

				// No link in upload response.
				else if (error.code == 2) {  }

				// Error during video upload.
				else if (error.code == 3) {  }

				// Parsing response failed.
				else if (error.code == 4) {  }

				// Video too text-large.
				else if (error.code == 5) {  }

				// Invalid video type.
				else if (error.code == 6) {  }

				// Video can be uploaded only to same domain in IE 8 and IE 9.
				else if (error.code == 7) {  }

				// Response contains the original server response to the request if available.
			  }
			}

		});
    })()

	function write_action() {

		var form = document.board_write_form;

		if(form.subject.value == "") {
			alert("제목을 입력해주세요.");
			form.subject.focus();
			return;
		}
		
		let editor = new FroalaEditor('#edit', {}, function () {
			// console.log(editor.html.get())				
		});		
		
		if(editor.core.isEmpty() == true) {
			alert("게시글을 작성해주세요.");
			editor.events.focus(true);
			return;
		}

		$("textarea[name=contents]").val(editor.html.get());

		form.submit();

	}

  </script>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
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