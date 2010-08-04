function setCat1(cat1, cattitle){
    $("#selected_cats").html(cattitle);
    $.ajax({
	type: "GET",
	url: '',
	data: 'tx_nasmarket_pi1[controller]=Ad&tx_nasmarket_pi1[action]=cat2&tx_nasmarket_pi1[parentCat]='+cat1,
	success: function(data){
            $("#secondcat").html(data);
            $("#thirdcat").html('');
	}
    });
};

function setCat2(cat2,cattitle){
    $("#selected_cats").html(cattitle);
    $.ajax({
	type: "GET",
	url: '',
	data: 'tx_nasmarket_pi1[controller]=Ad&tx_nasmarket_pi1[action]=cat3&tx_nasmarket_pi1[parentCat]='+cat2,
	success: function(data){
            $("#thirdcat").html(data);
	}
    });
};

function setCat3(cattitle){
    $("#selected_cats").html(cattitle);
};