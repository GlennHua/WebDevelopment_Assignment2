 
 var xhr = createRequest();
 
 function bookCab() {
 
	 if(xhr)
	 {
		 var place = document.getElementById('targetDiv');
		var cusname = document.getElementById('cusname').value;
		var phone = document.getElementById('phone').value;
		var unit = document.getElementById('unit').value;
		var streetno = document.getElementById('streetno').value;
		var streetname = document.getElementById('streetname').value;
		var suburb = document.getElementById('suburb').value;
		var destination = document.getElementById('destination').value;
		var pickdate = document.getElementById('pickdate').value;
		var picktime = document.getElementById('picktime').value;
		 var req = "name="+encodeURIComponent(cusname)+"&phone="+encodeURIComponent(phone)+"&unit="+encodeURIComponent(unit)
		 +"&streetno="+encodeURIComponent(streetno)+"&streetname="+encodeURIComponent(streetname)+"&suburb="+encodeURIComponent(suburb)+"&destination="+encodeURIComponent(destination)
		 +"&date="+encodeURIComponent(pickdate)+"&time="+encodeURIComponent(picktime);
		 
		 xhr.open("POST", 'Bprocessing.php', true);
		 
		 xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

		 xhr.onreadystatechange = function() 
		 {
			if (xhr.readyState == 4 && xhr.status == 200) 
				{
					place.innerHTML = xhr.responseText;
				} // end if
		 } // end anonymous call-back function
		 
		 xhr.send(req);
	 } // end if
 
} // end function getData() 