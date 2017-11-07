function setReview() {
var nam=$("#username").val();
var email=$("#email").val();
var review=$("#text").val();
var id=$("#id").val();
var str="name="+nam+"&email="+email+"&review="+review+"&id="+id;
$.ajax({
    type:'POST',
    url:"../engine/review.php",
    data:str,
    success:function (data) {
        $('#answer').html(data);
    }
});
    getReview();
$(".reset").val("");
    getReview();
}

function getReview(){
    var id=$("#id").val();
    $.ajax({
        type:"POST",
        url:"../engine/review.php",
        data:"id="+id,
        success:function (html) {
            $("#review").html(html);
        }
    });
}
$(document).ready(function(){
    getReview();
    setInterval('getReview()',300000);
});

function getBasket(){
    var id=$("#id").val();
    $.ajax({
        url:"../engine/basket.php",
        success:function (html) {
            $("#basket").html(html);
        }
    });
}

function setBasket() {
    var id=$("#id").val();
    var str="id="+id;
    $.ajax({
        type:"POST",
        url:"../engine/basket.php",
        data:str,
        success:function (html) {
            $("#basket").html(html);
        }
    });
}

$(document).ready(function(){
    getBasket();
    setInterval('getBasket()',60000);
});

function BasketTable() {
    $.ajax({
        method:"POST",
        data:"basket=getBasketTable",
        url:"../engine/basket.php",
        success:function (html) {
            $("#baskettable").html(html);
        }
    });
}
$(document).ready(function(){
    BasketTable();
});

function deleteBasketId(key) {
    $.ajax({
        method: "POST",
        url: "../engine/basket.php",
        data: "basket=deleteBasket&key=" + key,
        success:function (html) {
            $("#baskettable").html(html);
        }
    });
}
