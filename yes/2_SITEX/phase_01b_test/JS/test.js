function testLoad(request){
    $("article").load("/RES/appelAjax.php?rq=" + request);
}

function testGet(request){
    $.get( "/RES/appelAjax.php?rq=" + request, function( data ) {
        $( "article" ).html( data );
    });
}

function testPost(request){
    $.post( "/RES/appelAjax.php?rq=" + request, function( data ) {
        $( "article" ).html( data );
    });
}

function testGetJSON(request)
{
    /*
   Avec tableau en param => renvoi un object d'object
   Avec aucun param => undefined
   Avec GPC => Rien ?
    */

    $.getJSON("/RES/appelAjax.php?rq="+request,function(data) {
        var newHTML = '';
        console.log(data);
        $.each(data,function(livreId,livreInfos) {
            newHTML += '<dl>';
            newHTML += '<dt>Id: '+livreId+'</dt>';
            newHTML += '<dd>Auteur: '+livreInfos.auteur+'</dd>';
            newHTML += '<dd>Titre: '+livreInfos.titre+'</dd>';
            newHTML += '<dd>Prix: '+livreInfos.prix+'</dd>';
            newHTML += '</dl>';
        })
        $("article").html(newHTML);
    });
}


function testPostJson(request) {
    $.post("/RES/appelAjax.php?rq=" + request, function(data) {
        var newHTML = '';
        console.log(data);
        $.each(data, function(livreId, livreInfos) {
            newHTML += '<dl>';
            newHTML += '<dt>Id: ' + livreId + '</dt>';
            newHTML += '<dd>Auteur: ' + livreInfos.auteur + '</dd>';
            newHTML += '<dd>Titre: ' + livreInfos.titre + '</dd>';
            newHTML += '<dd>Prix: ' + livreInfos.prix + '</dd>';
            newHTML += '</dl>';
        })
        $("article").html(newHTML);
    }, 'json');
}


function testPostJSON(request) {
    $.postJSON = function() {
        $.post("/RES/appelAjax.php?rq=" + request, function(data) {
            var newHTML = '';
            console.log(data);
            $.each(data, function(livreId, livreInfos) {
                newHTML += '<dl>';
                newHTML += '<dt>Id: ' + livreId + '</dt>';
                newHTML += '<dd>Auteur: ' + livreInfos.auteur + '</dd>';
                newHTML += '<dd>Titre: ' + livreInfos.titre + '</dd>';
                newHTML += '<dd>Prix: ' + livreInfos.prix + '</dd>';
                newHTML += '</dl>';
            })
            $("article").html(newHTML);
        }, 'json');
    }
}

function testPostAjaxJSON(request){
    var postJson = require("post-json");
    $.postJson("/RES/appelAjax.php?rq=" + request, {my: "test", data: "fun"}, function(err, result) {
        var newHTML = '';
        console.log(data);
        $.each(data, function(livreId, livreInfos) {
            newHTML += '<dl>';
            newHTML += '<dt>Id: ' + livreId + '</dt>';
            newHTML += '<dd>Auteur: ' + livreInfos.auteur + '</dd>';
            newHTML += '<dd>Titre: ' + livreInfos.titre + '</dd>';
            newHTML += '<dd>Prix: ' + livreInfos.prix + '</dd>';
            newHTML += '</dl>';
        })
    })
}

function testParseJson(json){
    var parsed;
    try {
        parsed = JSON.parse(json);
    } catch (e) {
        parsed = {"jsonError_" : {"data" : json, "error" : e}};

    }
    return parsed;
}

function testPostTestJSON(request) {
    $.post("/RES/appelAjax.php?rq="+request,function(data) {
        var newHTML = data;
        $("article").html(newHTML);
    }, callbackTestJSON());
}

function callbackTestJSON(newHTML){
    var retour = testParseJson(newHTML);

}

function sortAssociativeArray(data) {
    var sortedKeys = Object.keys(data).sort();
    var newArray = {};
    for (var key of sortedKeys) {
        newArray[key] = data[key];
    }
    return newArray;
}

function makeTable_v1(data) {
    if($.isEmptyObject(data)){
        console.log('%c --- NO DATA --- in makeTable_v1()','color:darkred');
        return '';
    }
    else{
        var sortData = sortAssociativeArray(data);
        var newHTML = '<table>';
        var thead = "<thead><tr><th>id</th>";
        for(var e of Object.keys(sortData[Object.keys(sortData)[0]])){
            thead += "<th>" + e + "</th>";
        }
        thead += "</tr></thead>";
        newHTML += thead;
        var tbody = "<tbody>";
        $.each(sortData,function(id,infos) {
            tbody += "<tr><td>" + id + "</td>";
            for (var key in sortData[id]) {
                tbody += "<td>" + sortData[id][key] + "</td>";
            }
            tbody += "</tr>";
        })
        tbody += "</tbody>";
        newHTML += tbody + "</table>";
        console.log(newHTML);
        $("article").html(newHTML);
    }
}

function testGetJSON_v2(request)
{
    $.getJSON("/RES/appelAjax.php?rq="+request,function(data) {
        //$("article").html(makeTable_v1(data));
        $("article").html(makeTable_v2(data));
    });
}

function makeTable_v2(data,index = false) {
    if($.isEmptyObject(data)){
        console.log('%c--- NO DATA --- in makeTable_v1()','color:darkred');
        return '';
    }
    else{
        var sortData = sortAssociativeArray(data);
        var newHTML = '<table>';
        var thead = "<thead><tr>";
        if(index){
            thead += "<th>id</th>";
        }
        for(var e of Object.keys(sortData[Object.keys(sortData)[0]])){
            thead += "<th>" + e + "</th>";
        }
        thead += "</tr></thead>";
        newHTML += thead;
        var tbody = "<tbody><tr>";
        $.each(sortData,function(id,infos) {
            if(index) {
                tbody += "<td>" + id + "</td>";
            }
            for (var key in sortData[id]) {
                tbody += "<td>" + sortData[id][key] + "</td>";
            }
            tbody += "</tr>";
        })
        tbody += "</tbody>";
        newHTML += tbody + "</table>";

        $("article").html(newHTML);
    }
}

function makeSelect_v1(data,text,value = '') {
    if($.isEmptyObject(data)){
        console.log('%c--- NO DATA --- in makeTable_v1()','color:darkred');
        return '';
    }
    if(!text){ //Test si le 2eme parametre a bien ete entre
        console.log('%c--- param text needed " '+text+' " --- in makeSelect_v1()','color:darkred');
        return '';
    }
    var tableauTitresColonnes = Object.keys(data[Object.keys(data)[0]]); //Contient les titres de colonne
    if(tableauTitresColonnes.indexOf(text) == -1){ //Test si le 2eme parametre est dans les titres de colonne possibles
        console.log('%c--- column text non exist " '+text+' " --- in makeSelect_v1()','color:darkred');
        return '';
    }
    if(value != '' && value != null && tableauTitresColonnes.indexOf(value) == -1){ //Test si le 3eme parametre est dans les valeurs possibles
        console.log('%c--- column value non exist " '+value+' " --- in makeSelect_v1()','color:darkred');
        return '';
    }
    else{
        var sortData = sortAssociativeArray(data);
        var options = '<select>';
        $.each(sortData,function(id,infos) {
            if(value == ''){
                options += "<option value=\"" + sortData[id][text] + "\">" + sortData[id][text] + "</option>";
            }
            else if(value == null){
                options += "<option value=\"" + text + "\">" + sortData[id][text] + "</option>";
            }
            else{
                options += "<option value=\"" + value + "\">" + sortData[id][text] + "</option>";
            }
        })
        options += "</select>";
        $("article").html(options);
    }
}

function testGetJSON_v3(request,text,value)
{
    $.getJSON("/RES/appelAjax.php?rq="+request,function(data) {
        $("article").html(makeSelect_v1(data,text,value));
    });
}



/*

alert("yo");


function testLoad(request){
    $("#article").load("/RES/appelAjax.php?rq="+request);
}


function testGet(request) {
    //var x = document.getElementsByTagName('article');
    $.get('/RES/appelAjax.php?rq='+request, function (data) {
        $("#article")[0].innerHTML = data;
    });
}

function testPost(request) {
    $.post('/RES/appelAjax.php?rq='+request, function (data) {
        $("#article")[0].innerHTML = data;
    });
}


function testGet($request){
    $("#article").get("/RES/appelAjax.php?rq=$request",
        function (data) {
            $("#article")[0].innerHTML = data;
        }
    );
}

$(document).ready(function(){
    $("p").click(function(){
        $(this).hide();
    });
});

$(document).ready(function(){
    $("a").click(function(event){
        makeRequest(event);
    });
});

function yolo(){console.log("yolo");}

    request.substring(51, request.indexOf('.'));
    request.split('\\').pop().split('/').pop();
    request.replace(/^.*(\\|\/|\:)/, '');

    request.toString();
    request.split('\\');
    request.pop();
    request.split('/');
    request.pop();




$(document).ready(function(){
    $("a").click(function(event){
        makeRequest(event);
    });
});
function makeRequest(event){
    event.preventDefault();
    //event.stopImmediatePropagation();
    //console.log(event.type, event.target);
    var request = event.target.href;
    request = request.substring(51, request.lastIndexOf('.'))
    console.log(request);
    //testGet(request);
    var data2send = {'request':request};
    //console.log(data2send);
    $.post('/RES/appelAjax.php?rq=' + request,data2send, function(data){playActions(data)});
}

function playActions(data) {
    //alert('yi');
    console.log(data);
}
*/