

$(function() {
    // Google Analytics: change UA-XXXXX-X to be your site's ID.
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
})


$(document).ready(function(){
    /*
        $("a[href!='logOn.php']").click(function(event){
            makeRequest(event);
        });

        $("li:last").click(function(event){
            makeRequest(event);
        });

            makeEvent("a");
        makeEvent("a:active");
        makeEvent("aside ul li");


           if (!($("a:active"))){
            console.log("ok");
           }
           else {
               console.log("ko");
           }
    */

    makeEvent("li:first");
    makeEvent("a[href='works.php']");
    makeEvent("header nav ul li:last");



    $("#error").dblclick(function(){
        $(this).hide(500);
    })

});

function makeEvent(place = 'html') {
    if(place == "a[href*='mailto']"){
        console.log("no");
    }
    else {
        $(place).click(function(event){
            makeRequest(event);
        });
    }
}

function makeRequest(event){
    event.preventDefault();
    //event.stopImmediatePropagation();
    //console.log(event.type, event.target);
    var request = event.target.getAttribute('href').split('.')[0];
    //request = request.substring(51, request.lastIndexOf('.'));
    console.log(request);
    //testGet(request);
    var data2send = {'request':request};
    //console.log(data2send);
    $.post('/he201546/2_SITEX/phase_01b_test/index.php?rq=' + request,data2send, function(data){playActions(data)});
    $("#error").children().html(" ");

}

function playActions(retour) {
    //alert('yi');
    retour = parseJson(retour);
    console.log(retour);
    retour.forEach(function(action){
        $.each(action, function(actionName, actionDatas){
            switch (actionName) {
                case 'testAffiche':
                    $("article").html(actionDatas);
                    break;
                case 'testLogOn':
                    $("header nav ul li:last").html(actionDatas); //met des id au pire c'est surement mieux
                    break;
                case 'testLogOff':
                    $("header nav ul li:last").html(actionDatas);
                    break;
                case 'debug':
                    $("#debug").html();
                case 'phpError':
                    $("#phpError").html();
                case 'jsonError_':
                    $("#error").show();
                    /*
                    var keys = Object.keys(actionDatas[0]);
                    var firstValue = actionDatas[0][keys[0]];
                    var secondValue =  actionDatas[0][keys[1]];
                    var textError = '<dl> <dt>'+keys[1]+'</dt> <dd>'+secondValue+'</dd> <dt>'+keys[0]+'</dt> <dd>'+firstValue+'</dd> </dl>';
                    //keys[1] + ' :<br>' + secondValue +  '<br>' + keys[0] + ' :<br>' + firstValue;
                    $("#jsonError_").html(textError);
                    console.log(keys, firstValue, secondValue);
                    var keys = Object.keys(actionDatas[0]);
                    var firstValue = actionDatas[0][keys[0]];
                    //var afficheActionDatas =
                    $("#jsonError_").html(firstValue);
                    */
//$("#jsonError_").html("jecris ce que je veux ici");
                    var afficheActionDatas =   "<fieldset> <legend>"+actionName+"</legend>"+ actionDatas +" </fieldset>";
                    $("#jsonError_").html(afficheActionDatas);
                    break;
                case 'testSousMenu':
                    $("aside").html(actionDatas);
                    break;
                default : console.log('%c Action inconnue : '+actionName, 'color:red');
            }
        })
    })
}



function parseJson(json){
    var parsed;
    try {
        parsed = JSON.parse(json);
    } catch (e) {
        parsed = [{"jsonError_" : [{"data" : json, "error" : e}]}];

    }
    return parsed;
}




/*
    case 'jsonError_':
    $("#error").removeAttr("hidden");
    $("#error").html(function (a, b, c) {
        var keys = Object.keys(actionDatas[0]);
        var firstValue = actionDatas[0][keys[0]];
        var secondValue =  actionDatas[0][keys[1]];
        console.log(keys, firstValue, secondValue);
    });
    break;
*/