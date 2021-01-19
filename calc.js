tanambaru 	= total_ha; 
tanbaru 	= total_tan;

// Dalaman > Pemunggahan BTS > Platform
a_1 		= document.getElementById("a_1").value;
a_1 		= a_1.replace(/,/g,"");

hektar_a_1	= Number(a_1)/Number(tanambaru);
$("#hektar_a_1").html(hektar_a_1);
$("#hektar_a_1").format({format:"#,###.00", locale:"us"});

tan_a_1 	= Number(a_1)/Number(tanbaru);
$("#tan_a_1").html(tan_a_1);
$("#tan_a_1").format({format:"#,###.00", locale:"us"});

// Dalaman > Pemunggahan BTS > Ramp
a_2 		= document.getElementById("a_2").value;
a_2 		= a_2.replace(/,/g,"");

hektar_a_2	= Number(a_2)/Number(tanambaru);
$("#hektar_a_2").html(hektar_a_2);
$("#hektar_a_2").format({format:"#,###.00", locale:"us"});

tan_a_2 	= Number(a_2)/Number(tanbaru);
$("#tan_a_2").html(tan_a_2);
$("#tan_a_2").format({format:"#,###.00", locale:"us"});

// Dalaman > Penjagaan Ramp
a_3 		= document.getElementById("a_3").value;
a_3			= a_3.replace(/,/g,"");

hektar_a_3	= Number(a_3)/Number(tanambaru);
$("#hektar_a_3").html(hektar_a_3);
$("#hektar_a_3").format({format:"#,###.00", locale:"us"});

tan_a_3 	= Number(a_3)/Number(tanbaru);
$("#tan_a_3").html(tan_a_3);
$("#tan_a_3").format({format:"#,###.00", locale:"us"});

// Pemunggahan BTS
total_a = Number(a_1)+Number(a_b)+Number(a_c);
document.getElementById("total_a").value=abc;
$("#total_a").format({format:"#,###.00", locale:"us"}); 
