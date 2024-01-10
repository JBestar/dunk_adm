$(document).ready(function() {
    setNavBarElement();
    addBtnEvent();
});


function addBtnEvent() {

    $("#confsite-list-add-but-id").click(function() {

        var jsonData = {
            "domain":$("#confsite-domain-input-id").val(),
        };
        if(jsonData.domain.length < 1){
            showAlert("도메인을 입력해주세요", 3);
            return;
        }
        
        jsonData = JSON.stringify(jsonData);
        // $(".loading").show();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: FURL + "/api/addDomain",
            data: { json_: jsonData },
            success: function(jResult) {
                // console.log(jResult);
                // $(".loading").hide();
                if (jResult.status == "success") {
                    requestDomain();
                } else if (jResult.status == "fail") {
    
                }
            },
            error: function(request, status, error) {
                // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
                $(".loading").hide();
            }
    
        });
    
    });
    // $("#confsite-cancel-btn-id").click(function() {
    //     window.location.reload();
    // });
    requestDomain();
}

function showDomain(list) {
    var html = "";

    if (list) {
        var firstIdx = 0;
        var nRow = 0;
        for(let domain of list) {
            html += "<tr><td>";
            html += (parseInt(nRow) + firstIdx + 1);
            html += "</td><td>";
            html += domain.conf_domain;
            // html += "</td><td>";
            // if(domain.conf_status == 1){
            //     html += "정상";
            // } else{
            //     html += "";
            // }
            html += "</td><td>";
            html += "<button onclick='deleteDomain(" + domain.conf_id + ")' >삭제</button>";
            html += "</td><tr>";
            nRow++;
        }
        if (html.length < 1) {
            html = "<tr><td colspan='5'>자료가 없습니다.</td></tr>";
        }
    }
    $("#confsite-table-data").html(html);

}

function requestDomain() {

    $(".loading").show();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: FURL + "/api/domainlist",
        success: function(jResult) {
            // console.log(jResult);
            $(".loading").hide();
            if (jResult.status == "success") {
                showDomain(jResult.data);
            } else if (jResult.status == "fail") {

            }
        },
        error: function(request, status, error) {
            // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
            $(".loading").hide();
        }

    });

}

function deleteDomain(fid){
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
        url: FURL + "/api/deleteDomain",
        data: { json_: jsonData },
        success: function(jResult) {
            // console.log(jResult);
            // $(".loading").hide();
            if (jResult.status == "success") {
                requestDomain();
            } else if (jResult.status == "fail") {

            }
        },
        error: function(request, status, error) {
            // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
            $(".loading").hide();
        }

    });
}