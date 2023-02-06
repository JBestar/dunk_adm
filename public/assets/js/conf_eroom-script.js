$(document).ready(function() {
    setNavBarElement();
    requestRooms();
});

function ShowRooms(arrRoom){

    var strBuf = "";
    if(arrRoom != null && arrRoom.length > 0 ){
        let room = null;
        for (idx in arrRoom) {
            room = arrRoom[idx];

            strBuf += "<tr><td>";
            strBuf += (parseInt(idx)+1);
            strBuf += "</td><td>";
            strBuf += room.name;
            strBuf += "</td><td>";
            if(room.stop == 1){
                strBuf += '<button class="pbresult-list-view-but" onclick="setRoomState('+room.fid+', 0);">시작</button>';
                strBuf += '<button class="pbresult-list-view-but" style="background: rgb(255, 58, 90);" disabled>정지</button>';

            } else {
                strBuf += '<button class="pbresult-list-view-but" style="background: rgb(133, 255, 142);" disabled>시작</button>';
                strBuf += '<button class="pbresult-list-view-but" onclick="setRoomState('+room.fid+', 1);">정지</button>';

            }
            strBuf += "</td><tr>";

        }
    }
    if (strBuf.length < 1) {
        strBuf = "<tr><td colspan='3'>자료가 없습니다.</td></tr>";
    }
    $("#pbbet-table-id").html(strBuf);

}

function requestRooms() {

    // $(".loading").show();
    $.ajax({
        url: FURL + '/api/eroomlist',
        type: 'post',
        dataType: "json",
        success: function(jResult) {
            // $(".loading").hide();
            // console.log(jResult);
            if (jResult.status == "success") {
                ShowRooms(jResult.data);
            }
        },
        error: function(request, status, error) {
            $(".loading").hide();
            // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }

    });
}

function setRoomState(fid, state){
    var jsonData = {
        "id": fid,
        "stop": state,
    };
    $(".loading").show();

    jsonData = JSON.stringify(jsonData);
    $.ajax({
        url: FURL + '/api/eroomstate',
        type: 'post',
        data: { json_: jsonData },
        dataType: "json",
        success: function(jResult) {
            $(".loading").hide();
            // console.log(jResult);
            if (jResult.status == "success") {
                requestRooms();
            }
        },
        error: function(request, status, error) {
            $(".loading").hide();
            // console.log("code:" + request.status + "\n" + "message:" + request.responseText + "\n" + "error:" + error);
        }

    });
}