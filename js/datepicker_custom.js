$(document).foundation();


window.prettyPrint && prettyPrint();

// implementation of disabled form fields
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);              
                
var checkin = $('#dpd1').fdatepicker({
                    language: 'fr',
                    format:'dd/mm/yyyy',
	onRender: function (date) {
		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	}
}).on('changeDate', function (ev) {
	if (ev.date.valueOf() > checkout.date.valueOf()) {
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate() + 1);
		checkout.update(newDate);
	}
	checkin.hide();
	$('#dpd2')[0].focus();
}).fdatepicker({language: 'fr',format:'dd/mm/yyyy'}).fdatepicker("setDate",now).data('datepicker');
var checkout = $('#dpd2').fdatepicker({
                    language: 'fr',
                    format:'dd/mm/yyyy',
                    onRender: function (date) {
                        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                    }
}).on('changeDate', function (ev) {
	checkout.hide();
}).fdatepicker("setDate",new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate()+1, 0, 0, 0, 0)).data('datepicker');
                        
// Pour calculer la nombre de jours
$('#dpd2').fdatepicker().on('changeDate',function (ev) {
//alert("je suis ici");
var days = (checkout.date.valueOf()-checkin.date.valueOf())/(1000 * 60 * 60 * 24);
    console.log(days);
    $("#dpd3").val(days);
});
