 
 var xhr = createRequest();
 
 function doSearch() {
 
	 if(xhr)
	 {
		 xhr.open("POST", 'admin.php', true);
		 
		 xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		
		var req = "action=search"
		 xhr.onreadystatechange = function() 
		 {
			if (xhr.readyState == 4 && xhr.status == 200) 
			{
				document.getElementById("bookings").innerHTML = xhr.responseText;
			} // end if
		 } // end anonymous call-back function
		 
		 xhr.send(req);
	 } // end if
 
} // end function getData() 


 var xhr1 = createRequest();
 
 function doAssign() {
 
	 if(xhr1)
	 {
		 var id = document.getElementById('bookingid').value;
		 xhr1.open("POST", 'admin.php', true);
		 
		 xhr1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

		var req = "action=assign&id=" + encodeURIComponent(id)

		 xhr1.onreadystatechange = function() 
		 {
			if (xhr1.readyState == 4 && xhr1.status == 200) 
				{
					document.getElementById("result").innerHTML = xhr1.responseText;
				} // end if
		 } // end anonymous call-back function
		 
		 xhr1.send(req);
	 } // end if
 
} // end function getData() 