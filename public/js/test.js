$(function() {
	var ctx = $("#linechart").get(0).getContext("2d");

	var options = {
		scaleStartValue: 0,
		scaleLabel: "<%=value%>%"
	};

	$("#linechart").attr('width', $("#linechart").parent().width());
	new Chart(ctx).Line(data, options);
});