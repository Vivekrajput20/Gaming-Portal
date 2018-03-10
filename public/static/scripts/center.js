$(document).ready(function() {
	$c = 0;
	if ($c == 0)
	{
		$(".game-img-cont").addClass("game-hide");
		$(".gf"+$c).removeClass("game-hide");
		$(".gf"+$c).addClass("game-appear");
	};
	$(".g-f-c-item-l").click(function(){
		$(this).toggleClass("g-f-active");
	});
});
function upvote(uid , gid){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("game-foot-text" + gid).innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "upvote.php?uid=" + uid + "&gid=" + gid, true);
	xmlhttp.send();
};
function events(uid , gid){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("game-foot-text" + gid).innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "going.php?uid=" + uid + "&gid=" + gid, true);
	xmlhttp.send();
};