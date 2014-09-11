$(document).ready(function() {
	$(document).on("click", "#PrintinPopup", function() {
	$("#PrintinPopup").click(function() {
	 	alert();
	 	printElem({ printMode: 'popup' });
	});
});
function printElem(options)
{
	$('#toPrint').printElement(options);
}