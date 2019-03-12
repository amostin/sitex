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
    //$('a').not('a[href*=mailto]').click(makeRequest); //1ere methhode
    //$('a:not([href*=mailto])').click(makeRequest); //2eme méthode
    makeEvent();
    $("#error").dblclick(function(){
        $(this).attr("hidden", 500);
    })
});

function makeRequest(e){
    //pour empêcher le comportement par défaut des navigateur(tels que
    //l'ouverture d'un lien), mais n'empêche pas l'événement de propage le DOM
    e.preventDefault ();
    //Empêche l'événement de remonter dans le DOM, mais n'empêche pas le comprtement par défaut des navigateurs
    e.stopPropagation();
    var request = e.target.getAttribute('href').split('.')[0];
    console.log(request);
    //testGet(request);
    var data2send = {'request':request};
    $.post('/RES/appelAjax.php?rq='+request, data2send, playActions);
    $("#error").html(" ");

}

function playActions(donnees) {
    var retour = parseJSON(donnees);
    console.log(retour);
    retour.forEach(function (action) {
        $.each(action, function (actionName, actionDatas) {
            switch (actionName) {
                case 'testAffiche':
                    $("article").html(actionDatas);

                    console.log(actionDatas);
                    if(actionDatas.includes('href')){
                        var nom = actionDatas[0].testAffiche.split('=')[1].split('.')[0];
                        nom = 'a[href*="' + nom + '"]';
                        makeEvent(nom);
                    }
                    break;
                case 'testLogOn':
                    $('a[href*="logOn"]').replaceWith(actionDatas);
                    makeEvent('a[href*="logOff"]');
                    break;
                case 'testLogOff':
                    $('a[href*="logOff"]').replaceWith(actionDatas);
                    makeEvent('a[href*="logOn"]');
                    break;
                case 'jsonError_':
                    $("#error").removeAttr("hidden");
                    var keys = Object.keys(actionDatas[0]);
                    var firstValue = actionDatas[0][keys[0]];
                    var secondValue =  actionDatas[0][keys[1]];
                    var textError = '<dl> <dt>'+keys[1]+'</dt> <dd>'+secondValue+'</dd> <dt>'+keys[0]+'</dt> <dd>'+firstValue+'</dd> </dl>';
                    //keys[1] + ' :<br>' + secondValue +  '<br>' + keys[0] + ' :<br>' + firstValue;
                    $("#error").html(textError);
                    console.log(keys, firstValue, secondValue);
                    break;
                case 'testSousMenu':
                    makeEvent('aside');                    break;
                default:
                    console.log('%cAction inconnue: ' +actionName, 'color:darkred');
            }
        })
    })
}

function parseJSON(json) {
    var parsed;

    try {
        parsed = JSON.parse(json);
    } catch (e) {
        parsed = JSON.parse(JSON.stringify([{'jsonError_' :{'error': e.toString(), 'data': json}}]));
    }
    return parsed;
}


function makeEvent(place = 'html'){
    //$(place).not('a[href*=mailto]').click(makeRequest);
    place === 'html' ? place = 'a' : '';
    $(place + ':not([href*=mailto])').click(makeRequest);
}

