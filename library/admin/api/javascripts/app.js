let img = document.querySelector('.l');
let BKK = document.querySelector('#BKK')
let CNX = document.querySelector('#CNX')

BKK.addEventListener('click',()=>{
	img.src='images/BKK.jpg'
})

CNX.addEventListener('click',()=>{
	img.src='images/CNX.jpg'
})

let img2 = document.querySelector('.f');
let D = document.querySelector('#D')
let TH= document.querySelector('#TH')

D.addEventListener('click',()=>{
	img2.src='images/days.jpg'
})

TH.addEventListener('click',()=>{
	img2.src='images/hours.jpg'
})

var lat = "13.69"
var lon = "100.75"
var freq = "daily"
var url = "https://api.nostramap.com/Service/V2/GeoLocation/GetWeather?key=GyygMkPXOlbRlBuxy4pMbC7saWkxnxWiJfXCLooDjLIZf4SyGXh8MYmHZ8P6Xs8pa)GhBZQZrPLL8cAVKQp873m=====2&lat=13.69&lon=100.75&frequency=daily"

$(".input-text-BKK button").click(function(){
	$(".loc").empty();
	$(".loc").append("Bangkok Airport");
	lat =13.69;
	lon =100.75;
	url = "https://api.nostramap.com/Service/V2/GeoLocation/GetWeather?key=GyygMkPXOlbRlBuxy4pMbC7saWkxnxWiJfXCLooDjLIZf4SyGXh8MYmHZ8P6Xs8pa)GhBZQZrPLL8cAVKQp873m=====2&lat="+lat+"&lon="+lon+"&frequency="+freq;
    console.log(url);
	main();
});

$(".input-text-CNX button").click(function(){
	$(".loc").empty();
	$(".loc").append("Chiangmai Airport");
	lat =18.76;
	lon =98.96;
	url = "https://api.nostramap.com/Service/V2/GeoLocation/GetWeather?key=GyygMkPXOlbRlBuxy4pMbC7saWkxnxWiJfXCLooDjLIZf4SyGXh8MYmHZ8P6Xs8pa)GhBZQZrPLL8cAVKQp873m=====2&lat="+lat+"&lon="+lon+"&frequency="+freq;
    console.log(url);
	main();
});

$(".input-freq-daily button").click(function(){
	$(".freq").empty();
	$(".freq").append("Daily");
	freq="daily";
	url = "https://api.nostramap.com/Service/V2/GeoLocation/GetWeather?key=GyygMkPXOlbRlBuxy4pMbC7saWkxnxWiJfXCLooDjLIZf4SyGXh8MYmHZ8P6Xs8pa)GhBZQZrPLL8cAVKQp873m=====2&lat="+lat+"&lon="+lon+"&frequency="+freq;
    console.log(url);
	main();
});

$(".input-freq-3hours button").click(function(){
	$(".freq").empty();
	$(".freq").append("3 Hours");
	freq="3hours";
	url = "https://api.nostramap.com/Service/V2/GeoLocation/GetWeather?key=GyygMkPXOlbRlBuxy4pMbC7saWkxnxWiJfXCLooDjLIZf4SyGXh8MYmHZ8P6Xs8pa)GhBZQZrPLL8cAVKQp873m=====2&lat="+lat+"&lon="+lon+"&frequency="+freq;
    console.log(url);
	main();
});

var main = function () { 
	"use strict";

	var settings = {
		'cache': false,
		'dataType': "jsonp",
		"async": true,
		"crossDomain": true,
		"url": url,
		"method": "GET",
		"headers": {
			"accept": "application/json",
			"Access-Control-Allow-Origin":"*"
		}
	}
	
	$.ajax(settings).done(function (response) {
		// console.log(response.results.weather.length);
		var xValues=[]
		var yValues=[]
		var icons=[]

		if (freq==="3hours"){
			for (let i=0; i<8; i++){
				xValues.push(response.results.weather[i].timeStamp)
				yValues.push(response.results.weather[i].temperature.temp)
				var $img = $("<img>");
				$img.attr("src",response.results.weather[i].icon);
				icons.push($img)
			};
		}
		else{
			for (let i=0; i<response.results.weather.length; i++){
				xValues.push(response.results.weather[i].timeStamp)
				yValues.push(response.results.weather[i].temperature.temp)
				var $img = $("<img>");
				$img.attr("src",response.results.weather[i].icon);
				icons.push($img)
			};
		}
		console.log(icons)

		var barColors = ["red","green","blue","orange","brown","pink","yellow","red","green","blue","orange","brown","pink","yellow","red","green","blue","orange","brown","pink","yellow","red","green","blue","orange","brown","pink","yellow","red","green","blue","orange","brown","pink","yellow","red","green","blue","orange","brown"];	
		new Chart("myChart", {
			type: "bar",
			data: {
				labels: xValues,
				datasets: [{
				backgroundColor: barColors,
				data: yValues
				}]
			},
			options: {
				legend: {display: false},
				title: {
				display: true,
				text: "Weather Report For Your Desired Location & Frequency"
				}
			}
			});

		$('main .icons').empty();
		for (let i=0; i<icons.length; i++){
			var img = icons[i];
			
			img.appendTo('main .icons');
		};
		// icons[4].appendTo('main .icons');
	});
}

$(document).ready(main);


