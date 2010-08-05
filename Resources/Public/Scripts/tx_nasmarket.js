function setCat1(cat1){
    $.ajax({
	type: "GET",
	url: '',
	data: 'tx_nasmarket_pi1[controller]=Ad&tx_nasmarket_pi1[action]=ajaxNewSelectedCat&tx_nasmarket_pi1[cat]='+cat1,
	success: function(data){
            $("#selected_cats").html(data);
	},
	error: function(data){
	    alert(data);
	}
    });
    $.ajax({
	type: "GET",
	url: '',
	data: 'tx_nasmarket_pi1[controller]=Ad&tx_nasmarket_pi1[action]=ajaxNewCat2&tx_nasmarket_pi1[parentCat]='+cat1,
	success: function(data){
            $("#secondcat").html(data);
            $("#thirdcat").html('');
	}
    });
    $("#category").val(cat1);
};

function setCat2(cat2){
    $.ajax({
	type: "GET",
	url: '',
	data: 'tx_nasmarket_pi1[controller]=Ad&tx_nasmarket_pi1[action]=ajaxNewSelectedCat&tx_nasmarket_pi1[cat]='+cat2,
	success: function(data){
            $("#selected_cats").html(data);
	},
	error: function(data){
	    alert(data);
	}
    });
    $.ajax({
	type: "GET",
	url: '',
	data: 'tx_nasmarket_pi1[controller]=Ad&tx_nasmarket_pi1[action]=ajaxNewCat3&tx_nasmarket_pi1[parentCat]='+cat2,
	success: function(data){
            $("#thirdcat").html(data);
	}
    });
    $("#category").val(cat2);
};

function setCat3(cat3){
    $.ajax({
	type: "GET",
	url: '',
	data: 'tx_nasmarket_pi1[controller]=Ad&tx_nasmarket_pi1[action]=ajaxNewSelectedCat&tx_nasmarket_pi1[cat]='+cat3,
	success: function(data){
            $("#selected_cats").html(data);
	},
	error: function(data){
	    alert(data);
	}
    });
    $("#category").val(cat3);
};