<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>출발시각 - 도착시간</title>
    
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> 
    
<style>
    body {
        font-size: 30px;
    }    
</style>
    
</head>

<body>
<br><br><br><br><br><br>
    
<center>

<form>
출발시각
<select id="departureTime1" style="font-size: 30px">
    <?php for ($i=1; $i <= 24; $i++) { ?>	
            <option value="<?php echo sprintf('%02d',$i); ?>"><?php echo $i;?></option>
    <?php } ?>
</select>
<select id="departureTime2" style="font-size: 30px">
    <?php for ($i=0; $i <= 50; $i=$i+10) { ?>	
            <option value="<?php echo sprintf('%02d',$i); ?>"><?php echo $i;?></option>
    <?php } ?>
</select>
&nbsp;&nbsp;
소요예상
<select id="durationTime1" style="font-size: 30px">
    <?php for ($i=0; $i < 24; $i++) { ?>	
            <option value="<?php echo $i; ?>"><?php echo $i;?></option>
    <?php } ?>
</select>
<select id="durationTime2" style="font-size: 30px">
    <?php for ($i=0; $i <= 50; $i=$i+10) { ?>	
            <option value="<?php echo $i; ?>"><?php echo $i;?></option>
    <?php } ?>
</select>
&nbsp;&nbsp;    
<button id="save" style="font-size: 30px">확인</button>
</form>
    
<div id="resp" style="padding: 50px 0; font-size: 60px;"></div>
    
</center> 
    
<script>
    
function calculateArrival(departureTime, duration) {
    // departureTime은 HH:MM 형식의 문자열로 가정합니다.
    var timeParts = departureTime.split(':');
    var departureDate = new Date();
    departureDate.setHours(parseInt(timeParts[0], 10));
    departureDate.setMinutes(parseInt(timeParts[1], 10));

    // duration은 분 단위로 가정합니다.
    var arrivalDate = new Date(departureDate.getTime() + duration * 60000);

    return arrivalDate.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
}

// 예시: 출발 시간과 소요 시간을 입력하여 도착 시간 계산
var departureTime = '08:30';
var duration = 60*5; // 분 단위로 소요 시간을 입력합니다.
var arrivalTime = calculateArrival(departureTime, duration);
//console.log(departureTime + " | " + duration + " | 도착시간: " + arrivalTime);

$(function(){

    $("#save").on("click", function(e) {
        //console.log($("#departureTime1").val() + " | " + $("#departureTime2").val() + " | " + $("#durationTime1").val() + " | " + $("#durationTime2").val());
        var departureTime = $("#departureTime1").val() + ":" + $("#departureTime2").val();
        var duration = (($("#durationTime1").val()-0)*60) + (($("#durationTime2").val()-0));
        var duration1 = ($("#durationTime2").val()-0);
        var arrivalTime = calculateArrival(departureTime, duration);
        $("#resp").html(arrivalTime);
        return false;
    });

});
    
</script>
</body>
</html>
