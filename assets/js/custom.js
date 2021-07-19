///////////////////////////////
/* IWQTask Custom JS - begin */
///////////////////////////////

//user list datatables init and config
$(document).ready(function(){
	$('#usersList').DataTable(
		{
			"language": {
				"url": "https://lebtom.pl/core/language/pl_PL/dataTables_lang.json"
			},
			"order": [0, 'DESC'],
			responsive: true
		}
	);
});

//remove user trigger - get id and take to modal
$('body').on('click', '.removeUserTrigger', function(){
	let selectedUserID = $(this).attr('data-userID');
	let currentSelectedUser = $('.selectedUserID');

	//get each part of href separately (array)
	let hrefArray = currentSelectedUser.attr('href').split('/');

	//replace last element in href array to selected user
	hrefArray[hrefArray.length - 1] = selectedUserID;

	//create new href by join all array elements
	newHref = hrefArray.join('/');

	//assign new href to modal
	currentSelectedUser.attr('href', newHref);
});

//auto hide notification card after fixed time
$(document).ready(function(){
	var notificationCard = $('.notificationCard');
	var timeoutValue = 4000;

	//if notification card exists auto hide them
	if(notificationCard.length){
		setTimeout(function(){notificationCard.fadeOut(500);}, timeoutValue);
	}
});

///////////////////////////////
/* IWQTask Custom JS - end */
///////////////////////////////