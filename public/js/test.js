$(function() {
	var ctx = $("#linechart").get(0).getContext("2d");
	var options = {
		scaleStartValue: 0,
		scaleLabel : "<%=value%>%",
	};

	new Chart(ctx).Line(data, options);
});