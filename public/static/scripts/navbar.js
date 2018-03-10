var i=0;
function menu()
{
 if (i ==0 )
 {               
  document.getElementById('men').style.display = "flex";
  setTimeout(function(){document.getElementById('men').style.opacity = 1; } , 50) ;
  i=1;
}
else{
  document.getElementById('men').style.opacity = 0;
  setTimeout(function(){ document.getElementById('men').style.display = "none" ; },1000);
  i=0;
}
}
