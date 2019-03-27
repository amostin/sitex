

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

    makeEvent("header nav ul li:first");
    makeEvent("header nav ul ");
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
                    if(actionName == 'debug'){
                        var temp = 'debug';
                    }

                case 'phpError':
                    if(actionName == 'phpError'){
                        var temp = 'phpError';
                    }


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



                    var afficheActionDatas =   "<fieldset> <legend>"+actionName+"</legend>"+ actionDatas +" </fieldset>";
                    $("#jsonError_").html(afficheActionDatas);
                    */
//$("#jsonError_").html("jecris ce que je veux ici");

                case 'jsonError_':
                    $("#error").show();
                    if(actionName == 'jsonError_'){
                        var temp = 'jsonError_';
                    }
                    $("#error").removeAttr('hidden');
                    let selector = '#error #'+temp;
                    $(selector).html(function () {
                        if(actionName == temp) {
                            //if (Array.isArray(actionDatas)) {
                            if (actionDatas.length > 1) {
                                var textError = "";
                                for (let i = 0; i < actionDatas.length; i++) {
                                    textError += '<dl> <dt>' + i + '</dt> <dd>' + actionDatas[i] + '</dd> </dl>';
                                }
                            }
                            else {
                                var keys = Object.keys(actionDatas[0]);
                                var firstValue = actionDatas[0][keys[0]];
                                var secondValue = actionDatas[0][keys[1]];
                                textError = '<dl> <dt>' + keys[1] + '</dt> <dd>' + secondValue + '</dd> <dt>' + keys[0] + '</dt> <dd>' + firstValue + '</dd> </dl>';
                            }
                            actionDatas = textError;
                        }
                        return "<fieldset><legend>"+actionName+"</legend>"+actionDatas+"</fieldset>"
                    });
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



    if(actionName == 'jsonError'){
                        temp = 'jsonError'
                    }
                    $("#error").removeAttr('hidden');
                    selector = '#error #'+temp;
                    $(selector).html(function () {
                        if(actionName == 'jsonError'){
                           //Ton code pour le dico avec à la fin, actionDatas = tonDico
                        }
                        return "<fieldset><legend>"+actionName+"</legend>"+actionDatas+"</fieldset>"
                    });
                    break;
*/