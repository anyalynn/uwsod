<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> <?php wp_title(' | ',TRUE,'right'); bloginfo('name'); ?> </title>
        <meta charset="utf-8">
 
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <?php wp_head(); ?>

        <!--[if lt IE 9]>
            <script src="<?php bloginfo("template_directory"); ?>/assets/ie/js/html5shiv.js" type="text/javascript"></script>
            <script src="<?php bloginfo("template_directory"); ?>/assets/ie/js/respond.js" type="text/javascript"></script>
            <link rel='stylesheet' href='<?php bloginfo("template_directory"); ?>/assets/ie/css/ie.css' type='text/css' media='all' />
        <![endif]-->
<script type="text/javascript">
function Mem1(event){
$("#ItemCost1").val("95.00");
$("#userMemType").val("Regular Member");
}
function Mem2(event){
$("#ItemCost1").val("50.00");
$("#userMemType").val("New Member");
}
function Mem3(event){
$("#ItemCost1").val("95.00");
$("#userMemType").val("Associate Member");
}

function Ann(event){
$("#ItemQty2").val(event);
}

function formVal()
{
	$("#ItemDesc1").val($("#userMemType").val() + "-" + $("#userAlumMemName").val() + "-" + $("#userGradYr").val());
	$("#BillEmail").val($("#userEmail").val());
	var bool=true;
	if(document.getElementById("userMemType").value == "")
		{
			inval.style.display = 'block';
			mtypetext.style.fontWeight = 'bold';
			bool=false;
		}
	if(document.getElementById("userAlumMemName").value == "")
		{
			inval.style.display = 'block';
			almemtxt.style.fontWeight = 'bold';
			bool=false;
		}
	if(document.getElementById("userEmail").value == "")
		{
			inval.style.display = 'block';
			emtxt.style.fontWeight = 'bold';
			bool=false;
		}
	if(document.getElementById("userGradYr").value == "")
		{
			inval.style.display = 'block';
			gradyrtxt.style.fontWeight = 'bold';
			bool=false;
		}
	if(document.getElementById("ItemQty2").value == "")
		{
			inval.style.display = 'block';
			annchgtxt.style.fontWeight = 'bold';
			bool=false;
		}
	return bool;
}

</script>
    </head>
    <!--[if lt IE 9]> <body <?php body_class('lt-ie9'); ?>> <![endif]-->
    <!--[if gt IE 8]><!-->
    <body <?php body_class(); ?> >
    <!--<![endif]-->

    <div id="uwsearcharea" aria-hidden="true" class="uw-search-bar-container"></div>

    <a id="main-content" href="#main_content" class='screen-reader-shortcut'>Skip to main content</a>

    <div id="uw-container">

    <div id="uw-container-inner">


    <?php get_template_part('thinstrip'); ?>

    <?php uw_dropdowns(); ?>
