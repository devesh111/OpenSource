/*Migration of code
var uid,site_id,booking,view,price;
if(!ref_uid){ref_uid = uid;}
if(!ref_site){ref_site = site_id;}
if(!ref_booking){ref_booking = booking;}
if(!ref_price){ref_price = price;}
if(!ref_view){ref_view = view;}
End migration of code*/

var ref_uid,ref_site,ref_width,ref_height,ref_view,ref_booking,ref_price,ref_framecss,ref_btntxt,ref_status,ref_btncolor,ref_btnbgcolor;
function ref_hide(){
	if(screen.width<700){
		if(document.getElementById('ref_close_img').getAttribute('src') == 'http://ref-v3.etlabs.in/hide.png'){
			document.getElementById('ref_frame').style.display = 'none';
			document.getElementById('ref_close_btn').style.bottom = '0px';
			document.getElementById('ref_close_img').src = 'http://ref-v3.etlabs.in/show.png';
		}
		else{
			document.getElementById('ref_frame').style.display = 'inherit';
			document.getElementById('ref_close_btn').style.bottom = ref_height;
			document.getElementById('ref_close_img').src = 'http://ref-v3.etlabs.in/hide.png';
		}
	}
	else{
		if(document.getElementById('ref_close_img').getAttribute('src') == 'http://ref-v3.etlabs.in/hide-pc.png'){
			document.getElementById('ref_frame').style.display = 'none';
			document.getElementById('ref_close_btn').style.right = '0px';
			document.getElementById('ref_close_img').src = 'http://ref-v3.etlabs.in/show-pc.png';
		}
		else{
			document.getElementById('ref_frame').style.display = 'inherit';
			document.getElementById('ref_close_btn').style.right = ref_width;
			document.getElementById('ref_close_img').src = 'http://ref-v3.etlabs.in/hide-pc.png';
		}
	}
}

window.onload = function(){
	if(ref_status != 'inactive'){
		ref_width			= (screen.width<700 ? screen.width : ref_width);
		ref_framecss 		= "margin:0px;padding:0px;border:0px;z-index:99999;overflow:hidden;width:100%;max-width:" + ref_width + " !important;height:" + ref_height + ";" + (ref_view == "thankyou" ? "position:inherit;" : (ref_width<700 ? "position:fixed;right:0px;bottom:0px;" : "position:fixed;top:20%;right:0px;"));
		if(ref_view!='thankyou'){
			var referaly 		= document.createElement('div');
			referaly.id			= "referaly";
			document.body.appendChild(referaly);
		}
		var iframe 			= document.createElement('iframe');
		iframe.frameBorder	= "0", iframe.style = ref_framecss, iframe.id = "ref_frame", iframe.scrolling = "no", iframe.src = "http://ref-v3.etlabs.in/index.php?action=plugin&cid=" + ref_uid + "&did=" + ref_site + "&view=" + ref_view + "&price=" + ref_price + "&booking=" + ref_booking  + "&url=" + encodeURIComponent(window.location.href);
		iframe.setAttribute("style",ref_framecss);	
		/*Case Gomosafer*/
		if(ref_uid == 2){
			document.getelemetById('referaly').style.display = 'none';
		}
		/*End Case*/
		if(ref_uid==4 && ref_view!='thankyou'){
			document.body.onmouseleave = function(){		
				if(ref_view!='thankyou'){
					document.getElementById('referaly').innerHTML = ((screen.width<700) ? ('<p id="ref_close_btn" style="position:fixed;bottom:'+ ref_height +';z-index:99999;opacity:0.9;filter:alpha(opacity=9);right:0px;margin:0px;padding:0px;text-align:right;"><a href="#" id="ref_close_anc" style="background:#50ac51;display:inline-block;width:100px;height:40px;text-align:right;box-sizing: border-box;color: #fff;border-radius: 10px 10px 0 0;line-height: 35px;padding: 4px 16px;text-transform: uppercase;text-overflow: ellipsis;white-space: nowrap;cursor:pointer;" onclick="ref_hide()"><img src="http://ref-v3.etlabs.in/hide.png" id="ref_close_img" alt="X" style="display:none;" />10 % OFF</a></p>') : ('<p id="ref_close_btn" style="background:'+(ref_btnbgcolor ? ref_btnbgcolor : '#50ac51')+';display:inline-block;height:40px;margin-top: -40px;box-sizing: border-box;color: '+(ref_btnbgcolor ? ref_btnbgcolor : '#fff')+';-webkit-transform: rotate(-90deg);transform: rotate(-90deg);-ms-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-webkit-transform-origin: bottom right;-moz-transform-origin: bottom right;transform-origin: bottom right;-ms-transform-origin: bottom right;border-radius: 10px 10px 0 0;line-height: 35px;padding: 4px 10px;font-size:90%;top:20%;right:'+ref_width+';cursor:pointer;" onclick="ref_hide()"><img src="http://ref-v3.etlabs.in/hide-pc.png" id="ref_close_img" alt="X" style="display:none;"/>'+(ref_btntxt ? ref_btntxt : 'Unlock Surprise!')+'</p>'));
				}
				document.getElementById("referaly").appendChild(iframe);
			}
		}
		else{
			if(ref_view!='thankyou'){
				document.getElementById('referaly').innerHTML = ((screen.width<700) ? ('<p id="ref_close_btn" style="position:fixed;bottom:'+ ref_height +';z-index:99999;opacity:0.9;filter:alpha(opacity=9);right:0px;margin:0px;padding:0px;text-align:right;"><a href="#" id="ref_close_anc" style="background:#50ac51;display:inline-block;width:100px;height:40px;text-align:right;box-sizing: border-box;color: #fff;border-radius: 10px 10px 0 0;line-height: 35px;padding: 4px 16px;text-transform: uppercase;text-overflow: ellipsis;white-space: nowrap;cursor:pointer;" onclick="ref_hide()"><img src="http://ref-v3.etlabs.in/hide.png" id="ref_close_img" alt="X" style="display:none;" />10 % OFF</a></p>') : ('<p id="ref_close_btn" style="z-index:999;background:'+(ref_btnbgcolor ? ref_btnbgcolor : '#50ac51')+';display:inline-block;height:40px;margin-top: -40px;box-sizing: border-box;color: '+(ref_btncolor ? ref_btncolor : '#fff')+';-webkit-transform: rotate(-90deg);transform: rotate(-90deg);-ms-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-webkit-transform-origin: bottom right;-moz-transform-origin: bottom right;transform-origin: bottom right;-ms-transform-origin: bottom right;border-radius: 10px 10px 0 0;line-height: 35px;padding: 4px 10px;font-size:90%;position:fixed;top:20%;right:'+ref_width+';cursor:pointer;" onclick="ref_hide()"><img src="http://ref-v3.etlabs.in/hide-pc.png" id="ref_close_img" alt="X" style="display:none;"/>'+(ref_btntxt ? ref_btntxt : 'Unlock Surprise!')+'</p>'));
			}
			document.getElementById("referaly").appendChild(iframe);
		}
	}
}