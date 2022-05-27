

function calcAmount(elemName){
    $(elemName).val(
        $(elemName)
        .val()
        .replace(/[^0-9]/g, "")
    );
    $(elemName).val(
        $(elemName)
        .val()
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
    );
}


function requestWaitToPermit(elemBut, jsData) {

    if (mAudio != undefined && mAudio != null) {
        mAudio.pause();
    }

    $(elemBut).attr('disabled', true);
    jsonData = JSON.stringify(jsData);

    $.ajax({
        type: "POST",
        dataType: "json",
        url: FURL + "/userapi/wait_permit",
        data: { json_: jsonData },
        success: function(jResult) {
            //console.log(jResult);
            $(elemBut).attr('disabled', false);

            if (jResult.status == "success") {
                requestEmployeeInfo();
                requestMember();

            } else if (jResult.status == "usererror") {
                alert('회원정보가 정확하지 않습니다.\n 다시 확인해주세요');
            } else if (jResult.status == "fail") {
                alert('회원승인이 실패되었습니다.');
            } else if (jResult.status == "nopermit") {
                alert('변경권한이 없습니다.');
                window.location.replace( FURL +'/pages/nopermit');
            } else if (jResult.status == "logout") {
                window.location.replace( FURL +'/');
            }
        },
        error: function(request, status, error) {
            //console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        }

    });
}


function requestUpdateMember(jsData) {

    var jsonData = JSON.stringify(jsData);

    $.ajax({
        type: "POST",
        dataType: "json",
        url: FURL + "/userapi/updatemember",
        data: { json_: jsonData },
        success: function(jResult) {
            // console.log(jResult);

            if (jResult.status == "success") {
                requestMember();
                // updateMember(jResult.data, jResult.level);
            } else if (jResult.status == "fail") {

            } else if (jResult.status == "nopermit") {
                alert('변경권한이 없습니다.');
                location.replace( FURL +'/pages/nopermit');
            } else if (jResult.status == "logout") {
                location.replace( FURL +'/');
            }
        },
        error: function(request, status, error) {
            //console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        }

    });

}

function requestDeleteMember(jsData) {

    var jsonData = JSON.stringify(jsData);

    $.ajax({
        type: "POST",
        dataType: "json",
        url: FURL + "/userapi/deletemember",
        data: { json_: jsonData },
        success: function(jResult) {
            //console.log(jResult);

            if (jResult.status == "success") {
                requestMember();
                //window.location.reload();
            } else if (jResult.status == "fail") {

            } else if (jResult.status == "nopermit") {
                alert('변경권한이 없습니다.');
                window.location.replace( FURL +'/pages/nopermit');
            } else if (jResult.status == "logout") {
                window.location.replace( FURL +'/');
            }
        },
        error: function(request, status, error) {
            //console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        }

    });

}


function requestAddBlock(jsData) {

    var jsonData = JSON.stringify(jsData);

    $.ajax({
        type: "POST",
        dataType: "json",
        url: FURL + "/userapi/add_block",
        data: { json_: jsonData },
        success: function(jResult) {
            // console.log(jResult);

            if (jResult.status == "success") {
                location.replace( FURL +'/user/member_block');
                // updateMember(jResult.data, jResult.level);
            } else if (jResult.status == "fail") {

            } else if (jResult.status == "nopermit") {
                alert('변경권한이 없습니다.');
                location.replace( FURL +'/pages/nopermit');
            } else if (jResult.status == "logout") {
                location.replace( FURL +'/');
            }
        },
        error: function(request, status, error) {
            // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }

    });

}

function requestLogoutMember(jsData) {

    var jsonData = JSON.stringify(jsData);

    $.ajax({
        type: "POST",
        dataType: "json",
        url: FURL + "/userapi/logoutmember",
        data: { json_: jsonData },
        success: function(jResult) {
            // console.log(jResult);

            if (jResult.status == "success") {
                alert('로그아웃되었습니다.');

            } else if (jResult.status == "fail") {

            } else if (jResult.status == "nopermit") {
                alert('변경권한이 없습니다.');
                window.location.replace( FURL +'/pages/nopermit');
            } else if (jResult.status == "logout") {
                window.location.replace( FURL +'/');
            }
        },
        error: function(request, status, error) {
            //console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        }

    });

}


function refreshEv(mbFid, elBtn) {
    var jsonData = { "mb_fid": mbFid };
    jsonData = JSON.stringify(jsonData);
    $(elBtn).addClass("refresh");

    $.ajax({
        type: "POST",
        dataType: "json",
        url: FURL + "/userapi/egginfo",
        data: { json_: jsonData },
        success: function(jResult) {
            // console.log(jResult);
            $(elBtn).removeClass("refresh");

            if (jResult.status == "success") {
                $("#mm_" + mbFid).text(parseInt(jResult.money).toLocaleString() + "원");
                $("#mp_" + mbFid).text(parseInt(jResult.point).toLocaleString());

            } else if (jResult.status == "fail") {

            } else if (jResult.status == "logout") {
                window.location.replace( FURL +'/');
            }
        },
        error: function(request, status, error) {
            $(elBtn).removeClass("refresh");
            // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }

    });

}



function requestTrasnfer(jsonData, bReload = true){
    $(".loading").show();
    
    jsonData = JSON.stringify(jsonData);
    $.ajax({
        type: "POST",
        dataType: "json",
        url: FURL + "/userapi/transfer",
        data: { json_: jsonData },
        success: function(jResult) {
            $(".loading").hide();
            console.log(jResult);
            if (jResult.status == "success") {
                if(bReload)
                    location.reload();
                else requestMember();
            } else if (jResult.status == "logout") {
                window.location.replace( FURL +'/');
            } else if (jResult.status == "fail") {
                if (jResult.msg) {
                    alert(jResult.msg);
                } else alert("조작이 실패되었습니다.")
            }
        },
        error: function(request, status, error) {
            $(".loading").hide();
            // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }

    });

}