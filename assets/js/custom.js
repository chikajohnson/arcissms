$(document).ready(function(){
$('#upload_div').hide();
$('#course-div').hide();

$('#course-radio').click(function () {
	 $('#course-div').show();
});

$('#all-courses').click(function () {
	 $('#course-div').hide();
});


//#############################  send message page ###############################
$('#all').show();
$('#custom').hide();


$('#all-radio').click(function () {
	 $('#all').show();
	 $('#custom').hide();
});

$('#some-radio').click(function () {
	 $('#custom').show();
	  $('#all').hide();
});


$('li').click(function()
{
	 this.css({"background-color": "yellow", "font-size": "200%"});
});
	
});