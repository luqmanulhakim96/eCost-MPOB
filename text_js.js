// JavaScript Document
	function number_only(obj) {
		var alphaExp = /^[a-zA-Z]+$/;
		if(obj.value.match(alphaExp)) {
			alert("Masukkan nombor sahaja!");
			$(obj).attr("value","0");
			$(obj).focus();
			return false;
		}
		else {
			$(obj).removeClass("field_active");
			$(obj).addClass("field_edited");
			return true;
		}
	}
	
/*	function simpan_dan_pergi() {
		ok = confirm("Adakah anda pasti untuk menyimpan data ini?");
		if(ok == true)
			alert("Data berjaya disimpan!");
		
		return ok;
	}
	
	function simpan() {
		ok = confirm("Adakah anda pasti untuk menyimpan data ini?");
		if(ok == true)
			alert("Data berjaya disimpan!");
		else
			alert("Operasi dibatalkan.");
		
		return false;
	}*/
	
	function bulatkan(num) {
		num = Math.round(num*100)/100;
		return num;
	}
	
	function simpan_blum_matang() {
		ok = confirm("Anda pasti untuk simpan dan keluar?");
		if(ok == true) {
			alert("Data disimpan!");
			window.href.location = "home.php?id=home";
			return false;
		}
		return false;
	}