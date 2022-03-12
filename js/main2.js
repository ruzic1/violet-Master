/*$('#logButton').on('click',function(){
    console.log(1);
})*/
$(document).ready(function(){
    $(document).on('click', '#logButton', function()
    {
        console.log(1);
        var ime=$('#firstName');
        var prezime=$('#lastName');
        var datumRodjenja=$('#birthdayDate');
        var pol= $("input[name=inlineRadioOptions]:checked");
        var mejl=$("#emailAddress");
        var lozinka=$('#password');
        var status=$('#status :selected');
        var abc="@"
        console.log(abc);

        regexIme=/^[A-Z][a-z]{2,14}$/;
        regexPrezime=/^([A-z][a-z]{2,18})+$/;
        regexDatumRodjenja=/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
        regexMail=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
        regexLozinka=/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

        //testiranje unosa korisnika
        var greske=0;
        if(!regexIme.test($(ime).val()))
        {
            greske++;
            document.getElementById('firstName').style='border:1px solid red';
            $('.errorReportFName').show();
        }
        else
        {
            document.getElementById('firstName').style='border:1px solid green';
            $('.errorReportFName').hide();
        }
        console.log(ime,mejl);
        if(!regexPrezime.test($(prezime).val()))
        {
            greske++;
            document.getElementById('lastName').style='border:1px solid red';
            $('.errorReportLName').show();
        }
        else
        {
            document.getElementById('lastName').style='border:1px solid green';
            $('.errorReportLName').hide();
        }
        if(!regexDatumRodjenja.test($(datumRodjenja).val()))
        {
            greske++;
            document.getElementById('birthdayDate').style='border:1px solid red';
            $('.errorReportDate').show();
        }
        else
        {
            document.getElementById('birthdayDate').style='border:1px solid green';
            $('.errorReportDate').hide();
        }
        if(!regexMail.test($(mejl).val()))
        {
            greske++;
            document.getElementById('emailAddress').style='border:1px solid red';
            $('.errorReportMail').show();
        }
        else
        {
            document.getElementById('emailAddress').style='border:1px solid green';
            $('.errorReportMail').hide();
        }
        if(!regexLozinka.test($(lozinka).val()))
        {
            greske++;
            document.getElementById('password').style='border:1px solid red';
            $('.errorReportPassword').show();
        }
        else
        {
            document.getElementById('password').style='border:1px solid green';
            $('.errorReportPassword').hide();
        }
        if(greske==0)
        {
            console.log("nema gresaka u unosu");
            //alert('Uspesno ste se registrovali');
            var podaciSlanje={
                "imeX": $(ime).val(),
                "prezimeX":$(prezime).val(),
                "datumRodjenjaX":$(datumRodjenja).val(),
                "polX":$(pol).val(),
                "mejlX":$(mejl).val(),
                "lozinkaX":$(lozinka).val(),
                "statusX":$(status).val(),
                "logButton":true
            };

            $.ajax({
                url:"logic/registracija.php",
                method:"post",
                dataType:"json",
                data:podaciSlanje,
                success:function(result)
                {
                    alert('Uspesno ste se registrovali');
                    //window.location="login.php";
                    $("#odgovor").html(`<p class="alert alert-success">${result.poruka}</p>`)
                },
                error:function(err)
                {

                    //console.error(err);
                    if(err.status == 422){
                        $("#odgovor").html(`<p class="alert alert-warning">Vec postoje uneseni parametri.</p>`)
                    }
                }
            })
        }
        else
        {
            console.log("probajte ponovo");
        }
})});

//logovanje
$(document).on('click', '#logButton2', function(){
    var email=$('#emailAddress');
    var lozinka=$('#password');

    //regularni izrazi- klijentska strana
    var regexMail=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var regexLozinka=/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

    //testiranje login unosa korisnika
    var greske=0;
    if(!regexMail.test($(email).val())||$(email).val()=="")
    {
        greske++;
        document.getElementById('emailAddress').style='border:1px solid red';
        //$(email).addClass('frameReg');
        $('.errorReportMail').show();
        
    }
    else
    {
        //$(email).removeClass('frameReg');
        document.getElementById('emailAddress').style='border:1px solid green';
        $('.errorReportMail').hide();
    }
    if(!regexLozinka.test($(lozinka).val())||$(lozinka).val()=="")
    {
        greske++;
        document.getElementById('password').style='border:1px solid red';
        $('.errorReportPassword').show();
        
    }
    else
    {
        document.getElementById('password').style='border:1px solid green';
        $('.errorReportPassword').hide();
    }
    if(greske==0)
    {
        console.log(1);
        var podaciSlanje1={
            "emailX":$(email).val(),
            "passwordX":$(lozinka).val(),
            'logButton2':true,
        };

        try{
        $.ajax({
            url:"logic/logovanje.php",
            method:"post",
            dataType:"json",
            data:podaciSlanje1,
            success: function(result){
                //$("#odgovor").html(`<p class="alert alert-success">${result.poruka}</p>`)
                alert("ispravan unos");
            },
            /*error: function(xhr){
                alert("pogresan unos");
            }*/
        });
        }
        catch(error)
        {
            console.error(error);
        }
    }
    /*else
    {
        window.location.href="../index.php";
    }*/
})
/*$(document).ready(function(){
    $(document).on('click', '#filterResult', function()
    {
        console.log(12);
})});*/

$(document).ready(function(){
	cat();
	brand();
	product();
	//cat() is a funtion fetching category record from database whenever page is load
	function cat(){
		$.ajax({
			url	:	"models/fetch_data.php",
			method:	"POST",
			data	:	{category:true},
			success	:	function(data){
				$("#get_category").html(data);
				
			}
		})
	}
	//brand() is a funtion fetching brand record from database whenever page is load
	function brand(){
		$.ajax({
			url	:	"models/fetch_data.php",
			method:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
			}
		})
	}
	//product() is a funtion fetching product record from database whenever page is load
		function product(){
		$.ajax({
			url	:	"models/fetch_data.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	}
    $("body").delegate(".category","click",function(event){
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"models/fetch_data.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,idCategory:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})
    $("body").delegate(".selectBrand","click",function(event){
        event.preventDefault();
        $("#get_product").html("<h3>Loading...</h3>");
        var bid = $(this).attr('bid');
        
            $.ajax({
            url		:	"models/fetch_data.php",
            method	:	"POST",
            data	:	{selectBrand:1,brendID:bid},
            success	:	function(data){
                $("#get_product").html(data);
                if($("body").width() < 480){
                    $("body").scrollTop(683);
                }
            }
        })
    
    })
})
//add to cart-->funkcionalnost

/*$(document).ready(function(){
    $(document).on('click', '.btn-primary', function()
    {
        var prImage=
    })
})*/

$("body").delegate("#product","click",function(event){
    var pid = $(this).attr("pid");
    event.preventDefault();
    $(".overlay").show();
    $.ajax({
        url : "logic/cart.php",
        method : "POST",
        data : {addToCart:1,proId:pid},
        success : function(data){
            count_item();
            getCartItem();
            $('#product_msg').html(data);
            $('.overlay').hide();
        }
    })
})
//Add Product into Cart End Here
//Count user cart items funtion
count_item();
function count_item(){
    $.ajax({
        url : "logic/cart.php",
        method : "POST",
        data : {count_item:1},
        success : function(data){
            $(".badge").html(data);
        }
    })
}
//Count user cart items funtion end

//Fetch Cart item from Database to dropdown menu
getCartItem();
function getCartItem(){
    $.ajax({
        url : "logic/cart.php",
        method : "POST",
        data : {Common:1,getCartItem:1},
        success : function(data){
            $("#cart_product").html(data);
        }
    })
}

/*$(document).ready(function(){
    filterSearch();
    function filterSearch(){
    //console.log(12);
    $('.searchResult').html('<div id="loading">Loading .....</div>');
    var action='fetch_data';
    var brand=getFilter('brand');
    var categories=getFilter('categories');
    $.ajax({
        url:'models/fetch_data.php',
        method:"post",
        dataType:'json',
        data:{
            'actionX':action,
            'brandX':brand,
            'categoriesX':categories
        },

        success:function(data)
        {
            $('searchResults').html(data);
        }
    })
}
});

function getFilter(class_name)
{
    var filter=[];
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());
    });
    return filter;
}
$('.common_selector').click(function(){
    filterSearch();
})*/

/*$("body").delegate(".category","click",function(event){
    $("#get_product").html("<h3>Loading...</h3>");
    event.preventDefault();
    var cid = $(this).attr('cid');
    
        $.ajax({
        url		:	"action.php",
        method	:	"POST",
        data	:	{get_seleted_Category:1,cat_id:cid},
        success	:	function(data){
            $("#get_product").html(data);
            if($("body").width() < 480){
                $("body").scrollTop(683);
            }
        }
    })

})


$("body").delegate(".selectBrand","click",function(event){
    event.preventDefault();
    $("#get_product").html("<h3>Loading...</h3>");
    var bid = $(this).attr('bid');
    
        $.ajax({
        url		:	"action.php",
        method	:	"POST",
        data	:	{selectBrand:1,brand_id:bid},
        success	:	function(data){
            $("#get_product").html(data);
            if($("body").width() < 480){
                $("body").scrollTop(683);
            }
        }
    })

})*/