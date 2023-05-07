$(document).ready(function() {

    
    $('textarea[name="editordata"]').summernote({
        // height: 300, // 에디터 높이
        minHeight: 60, // 최소 높이
        // maxHeight: null, // 최대 높이
        focus: false, // 에디터 로딩후 포커스를 맞출지 여부
        lang: "ko-KR", // 한글 설정
        placeholder: '', //placeholder 설정
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            // ['table', ['table']],
            // ['insert', ['link', 'picture', 'video']],
            // ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    initMessageEdit();

});

function initMessageEdit() {
    CountPerPage = 5;
    setNavBarElement();
    requestTotalPage();
    addBtnEvent();
}

function requestPageInfo() {
    requestMacro();
}

function showMacro(arrMacro){

    let strBuf = "";

    var curPage = getActivePage();
    var firstIdx = (curPage - 1) * CountPerPage;
    for(let nRow in arrMacro){
        strBuf += "<tr><td>";
        strBuf += (parseInt(nRow) + firstIdx + 1);
        strBuf += "</td><td>";
        strBuf += arrMacro[nRow].conf_content;
        strBuf += "</td><td>";
        strBuf += "<button onclick='deleteMacro(" + arrMacro[nRow].conf_id + ")' >삭제</button>";
        strBuf += "</td><tr>";
    }

    if (strBuf.length < 1) {
        strBuf = "<tr><td colspan='3'>자료가 없습니다.</td></tr>";
    }
    $("#confsite-table-data").html(strBuf);

}

function addBtnEvent() {

    $("#notice-save-btn-id").click(function() {

        var jsonData = {
            "memo": $("#macro-content").summernote('code'),
        };
        if(jsonData.memo.length < 1){
            alert("매크로 내용을 입력해주세요");
            return;
        }
    
        jsonData = JSON.stringify(jsonData);
        // $(".loading").show();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: FURL + "/api/addmacro",
            data: { json_: jsonData },
            success: function(jResult) {
                // console.log(jResult);
                // $(".loading").hide();
                if (jResult.status == "success") {
                    requestMacro();
                } else if (jResult.status == "fail") {
    
                }
            },
            error: function(request, status, error) {
                // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
                $(".loading").hide();
            }
    
        });
    });
}

function requestTotalPage() {

    var jsonData = {
    };

    jsonData = JSON.stringify(jsonData);

    $.ajax({
        url: FURL + '/api/getmacrocnt',
        data: { json_: jsonData },
        dataType: 'json',
        type: 'post',
        success: function(jResult) {
            // console.log(jResult);
            if (jResult.status == "success") {
                TotalCount = jResult.data.count;
                setFirstPage();
                requestMacro();
            }
        },
        error: function(request, status, error) {
            // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }
    });
}

function requestMacro() {

    var nPage = getActivePage();

    var jsonData = {
        "count": CountPerPage,
        "page": nPage,
    };

    jsonData = JSON.stringify(jsonData);
    $(".loading").show();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: FURL + "/api/getmacro",
        data: { json_: jsonData },
        success: function(jResult) {
            // console.log(jResult);
            $(".loading").hide();
            if (jResult.status == "success") {
                showMacro(jResult.data);
            } else if (jResult.status == "fail") {

            }
        },
        error: function(request, status, error) {
            // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
            $(".loading").hide();
        }

    });

}

function deleteMacro(fid){
    if(!confirm("삭제하시겠습니까?"))
        return;
    var jsonData = {
        "conf_id": fid,
    };

    jsonData = JSON.stringify(jsonData);
    // $(".loading").show();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: FURL + "/api/deletemacro",
        data: { json_: jsonData },
        success: function(jResult) {
            // console.log(jResult);
            // $(".loading").hide();
            if (jResult.status == "success") {
                requestMacro();
            } else if (jResult.status == "fail") {

            }
        },
        error: function(request, status, error) {
            // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
            $(".loading").hide();
        }

    });
}
