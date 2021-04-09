$().ready(function () {
	$("#jsvalidations").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"tieude": {
				required: true
			},
			"noidung":{
				required: true
            },
			"tentheloai":{
				required: true
            }
			
		},

		messages: {
			"tieude": {
				required: "Vui lòng nhập tiêu đề",
			},
			"noidung": {
				required: "Vui lòng nhập nội dung",
			},
			"tentheloai": {
				required: "Vui lòng nhập tên",
			}
		}
	});
});