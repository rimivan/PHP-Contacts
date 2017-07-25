var name_input;
var age_input;
var number_input;
var email_input;

jQuery(document).ready(function(){
	$.ajax({
            type: 'GET',
            url: 'read.php',
            datatype: 'JSON',
            /*data: {
            	name: name_input,
				age: age_input,
				number: number_input,
				email: email_input
            },*/
            success: function(data) {
            	console.log("Caricamento dati! ");
                data = $.parseJSON(data);
                $.each(data, function(index, obj) {
                	$("#tbody").append("<tr><td>"+obj.name+"</td><td>"+obj.age+"</td><td>"+obj.number+"</td><td>"+obj.email+"</td></tr>");
               	});
            }
    });


	 $("#test").on ('click',function(){ // Inserimento
	 	console.log("inserimento");
	 	name_input = $("#name_input").val();
		age_input = $("#age_input").val();
		number_input = $("#number_input").val();
		email_input = $("#email_input").val();

            $.ajax({
                type: 'POST',
                url: 'insert.php',
                data: {
                	name: name_input,
					age: age_input,
					number: number_input,
					email: email_input
                },
                success: function(data) {
                    data = $.parseJSON(data);
                    $("#tbody").append("<tr><td>"+data.name+"</td><td>"+data.age+"</td><td>"+data.number+"</td><td>"+data.email+"</td></tr>");

                    //$("p").text(data);
                }
            });
   });
});

