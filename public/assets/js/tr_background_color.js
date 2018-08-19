$(function(){
 tr_default(".scrollTable");
 $(".scrollTable tr").click(function(){
  tr_default(".scrollTable");
  tr_click($(this));
 });
});

function tr_default(tblID){
 var vTR = tblID + " tr";
 $(vTR).css("background-color","#ffffff");
 $(vTR).mouseover(function(){
  $(this).css("background-color","#CCFFCC") .css("cursor","pointer")
 });
 $(vTR).mouseout(function(){
  $(this).css("background-color","#ffffff") .css("cursor","normal")
 });
}

function tr_click(trID){
 trID.css("background-color","#e49e61");
 trID.mouseover(function(){
  $(this).css("background-color","#CCFFCC") .css("cursor","pointer")
 });
 trID.mouseout(function(){
  $(this).css("background-color","#e49e61") .css("cursor","normal")
 });
}
