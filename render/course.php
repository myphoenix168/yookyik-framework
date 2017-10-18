<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link href="css/popup.css" rel="stylesheet" type="text/css" />
    <link href="css/radio_button.css" rel="stylesheet" type="text/css" />

    <link href="jqwidgets/styles/jqx.base.css?v=<?php echo time();?>" rel="stylesheet">
    <link href="jqwidgets/styles/jqx.bootstrap.css?v=<?php echo time();?>" rel="stylesheet">


    <link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="jqwidgets/styles/jqx.classic.css?v=<?php echo time();?>" type="text/css" />
    <link rel="stylesheet" href="jqwidgets/styles/blue.css?v=<?php echo time();?>" type="text/css">   
    <link rel="stylesheet" href="jqwidgets/styles/orange.css?v=<?php echo time();?>" type="text/css"> 
    
    <script type="text/javascript" src="jscripts/jquery-1.11.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxcore.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxexpander.js?v=<?php echo time();?>"></script> 
    <script type="text/javascript" src="jqwidgets/jqxvalidator.js?v=<?php echo time();?>"></script> 
    <script type="text/javascript" src="jqwidgets/jqxtabs.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxbuttons.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxcheckbox.js?v=<?php echo time();?>"></script> 
    <script type="text/javascript" src="jqwidgets/globalization/globalize.js?v=<?php echo time();?>"></script> 
    <script type="text/javascript" src="jqwidgets/jqxcalendar.js?v=<?php echo time();?>"></script> 
    <script type="text/javascript" src="jqwidgets/jqxdatetimeinput.js?v=<?php echo time();?>"></script> 
    <script type="text/javascript" src="jqwidgets/jqxmaskedinput.js?v=<?php echo time();?>"></script> 
    <script type="text/javascript" src="jqwidgets/jqxinput.js?v=<?php echo time();?>"></script>    
    <script type="text/javascript" src="jqwidgets/jqxscrollbar.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxmenu.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxcheckbox.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxlistbox.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxdropdownlist.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxdata.js?v=<?php echo time();?>"></script>   
    <script type="text/javascript" src="jqwidgets/jqxgrid.js?v=<?php echo time();?>"></script>  
    <script type="text/javascript" src="jqwidgets/jqxgrid.selection.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.pager.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.columnsresize.js?v=<?php echo time();?>"></script> 
    <script type="text/javascript" src="jqwidgets/jqxgrid.filter.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.sort.js?v=<?php echo time();?>"></script>
    
    <script type="text/javascript" src="jqwidgets/jqxwindow.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxpanel.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="jqwidgets/jqxtooltip.js?v=<?php echo time();?>"></script>  
    <script type="text/javascript" src="jqwidgets/jqxcombobox.js?v=<?php echo time();?>"></script>

<script type="text/javascript">  
$(document).ready(function () {

  function initGridMaster(element){

        var colhilight = function (row, column, value, data){

            if ((row % 2) == 1) {
                return "color2";
            }else{
                return "white";
            }
        }

        var source = {   
              datatype: "json",
              datafields: [
                    { name: 'CourseIdKey', type: 'string'},
                    { name: 'Course_Name', type: 'string'},
                    { name: 'StartDate', type: 'date'},
                    { name: 'Credit', type: 'string'},
                    { name: 'Pass', type: 'string'}
              ],
              url: "?json=course&token=<?php echo Encode::genHashRandom();?>",
              //url: "http://172.2.0.14/fos25/business_data.php?select=fti",
              cache: false,
              async: false,
              pagenum: 0,
              pagesize: 20
            };

        var dataAdapter = new $.jqx.dataAdapter(source);

        $("#"+element).jqxGrid(
        {
            width: '99.90%',
            height: 596,
            source: dataAdapter,
            theme: 'classic',
            rowsheight: 27,
            pagermode:'simple',
            showfilterrow: false,
            filterable: false,
            sortable: true,
            columns: [
                  { text: 'Date', datafield: 'StartDate', width: '20%', cellsalign:'center',align:'center',cellclassname: colhilight, cellsformat: 'dd/MM/yyyy'},
                  { text: 'ID', datafield: 'CourseIdKey', width: '20%', cellsalign:'center',align:'center',cellclassname: colhilight},
                  { text: 'Course Name', datafield: 'Course_Name', width: '60%', cellsalign:'left',align:'center',cellclassname: colhilight}          
              ],
            /*columngroups: [ {text: 'รายละเอียดการสั่งซื้อ', align: 'center', name: 'ProjectPO'}],*/
            pageable: true,
            autoheight: false
        });
    
    }

    initGridMaster('course_active');

});
</script>
<style type="text/css">
  .color1{
      color: #262525\9;
      background-color: #dddddd\9;
      border-color: #879999;
  }
  .color1:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .color1:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
      color: #262525;
      background-color: #dddddd;
      border-color: #879999;
  }
  .color2{
      color: #262525\9;
      background-color: #ccd5d5\9;
      border-color: #879999;
  }
  .color2:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .color2:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
      color: #262525;
      background-color: #ccd5d5;
      border-color: #879999;
  }
  .white{
      color: #262525\9;
      background-color: #EEEEEE\9;
      border-color: #879999;
  }
  .white:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .white:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
      color: #262525;
      background-color: #EEEEEE;
      border-color: #879999;
  }
  #course_active{
    margin:0px;
    padding:0px;
  }
  #course_active .jqx-grid-content  *{
    font-family: DBHelvethaicaX-55Regular;
    font-size: 18px;
  }
  #course_info tr td{
    font-family: DBHelvethaicaX-55Regular;
    font-size: 18px;
  }
</style>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="images/news.jpg" alt="" width="88" height="39" /></td>
        <td><img src="images/food.jpg" alt="" width="87" height="39" /></td>
      </tr>
    </table></td>
    <td width="60%" bgcolor="#E1E0E0"><marquee>Welcome to FOS 2.5 New ERA on Phuket FantaSea</marquee></td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
      <tr>
        <td align="right" bgcolor="#879999" class="headmenu"><img src="images/Test-Html_06.jpg" alt="" width="385" height="39" /></td>
        <td width="40px" align="center"  bgcolor="#A8ACAB" class="headmenu"><a href="#"><img src="images/head-setting.png" width="31" height="40" /></a></td>
        <td width="40px" align="center" bgcolor="#939C9B"class="headmenu"><a href="#"><img src="images/head-logout.png" width="25" height="40" /></a></td>
        <td width="40px" align="center" bgcolor="#FFFFFF"class="headmenu"><a href="#"><img src="images/head-dictionary.png" width="19" height="40" /></a></td>
        <td width="40px" align="center" bgcolor="#DEE7E5"class="headmenu"><a href="#"><img src="images/head-department.png" width="24" height="40" /></a></td>
        <td width="40px" align="center" bgcolor="#879999"class="headmenu"><a href="#"><img src="images/head-phonebook.png" width="24" height="40" /></a></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/space.gif" width="1" height="15" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#dee7e5">
  <tr>
    <td><img src="images/space.gif" width="1" height="7" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" bgcolor="#cccccc"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="10">
          <tr>
            <td bgcolor="#5a7780" class="hvr-sweep-to-right" height="100%"><a href="#"><img src="images/menu_purchase.png" style="width:100%;height:auto;" /></a></td>
            <td><table  border="0" cellspacing="0" cellpadding="0"  style="width:100%; height:100%">
              <tr>
                <td  align="right" bgcolor="#5a7780" class="hvr-sweep-to-right"><a href="#" ><img src="images/menu_fti.png" style="width:100%;height:auto;" /></a></td>
              </tr>
              <tr>
                <td><img src="images/space.gif" width="1" height="10" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#5a7780" class="hvr-sweep-to-right"><a href="#" ><img src="images/menu_stat.png" alt="" style="width:100%;height:auto;" /></a></td>
              </tr>
            </table></td>
            <td bgcolor="#5a7780" class="hvr-sweep-to-right"><a href="#"><img src="images/menu_mail.png" style="width:100%;height:auto;" /></a></td>
            <td><table border="0" cellspacing="0" cellpadding="0" style="width:100%; height:100%">
              <tr>
                <td height="100%" bgcolor="#5a7780" class="hvr-sweep-to-right"><a href="#"><img src="images/menu_schedule.png" style="width:100%;height:auto;" /></a></td>
              </tr>
              <tr>
                <td><img src="images/space.gif" alt="" width="1" height="10" /></td>
              </tr>
              <tr>
                <td height="100%" bgcolor="#5a7780" class="hvr-sweep-to-right"><a href="#"><img src="images/menu_businesstoday.png" alt="" style="width:100%;height:auto;" /></a></td>
              </tr>
            </table></td>
            <td bgcolor="#5a7780" class="hvr-sweep-to-right"><a href="#"><img src="images/menu_hr.png" style="width:100%;height:auto;" /></a></td>
            <td bgcolor="#5a7780" class="hvr-sweep-to-right"><a href="#"><img src="images/menu_fam.png" style="width:100%;height:auto;" /></a></td>
            <td bgcolor="#5a7780" class="hvr-sweep-to-right"><a href="#"><img src="images/menu_maintenance.png" style="width:100%;height:auto;" /></a></td>
          </tr>
        </table></td>
        <td width="26%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="bottom"><img src="images/menu_F.png"   style="width:100%;height:auto;"/></td>
            <td valign="bottom"><img src="images/menu_O.png" alt=""   style="width:100%;height:auto;"/></td>
            <td valign="bottom"><img src="images/menu_S.png"  style="width:100%;height:auto;" /></td>
          </tr>
          <tr>
            <td colspan="3" align="center" valign="middle" style="padding-top:5px"><span class="staffname" style="font-size:0.9em">รัตน์จิราภรณ์ กริตตาธนานิคโมค<br />
              STAFF ศูนย์เทคโนโลยีสารสนเทศ</span>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="images/space.gif" alt="" width="1" height="7" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/space.gif" alt="" width="1" height="15" /></td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="11%" valign="top" bgcolor="#7ea1a1">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" valign="middle" style="padding-top:20px; padding-bottom:20px;"><img src="images/menu_fti.png" width="179" height="72" /></td>
            </tr>
            <tr>
              <td align="center" bgcolor="#666666"><span class="headbareng" style="color:#c6c4bd; font-size:1em"><br />
                APPLICATION <span style="color:#a9cdcd">COURSE</span>
              </span><br />
              <br /></td>
            </tr>
            <tr>
              <td align="right"><br />
                <table width="85%" border="0" align="right" cellpadding="0" cellspacing="0" class="headbareng" style="color:#E0DFD8;">
                  <tr class="border_bottom2px">
                    <td width="45%" height="25"><a href="#" class="grey" style="display:block">APPLICATION&nbsp;<span style="color:#a9cdcd">COURSE</span></a></td>
                  </tr>
                  <tr class="border_bottom2px">
                    <td height="25"><a href="#" class="grey" style="display:block">CREDITS&nbsp;<span style="color:#a9cdcd">SUMMARIES</span></a></td>
                  </tr>
                  <tr class="border_bottom2px">
                    <td height="25"><a href="#" class="grey" style="display:block">COURSE&nbsp;<span style="color:#a9cdcd">TIMELINE</span></a></td>
                  </tr>
                  <tr class="border_bottom2px">
                    <td height="25"><a href="#" class="grey" style="display:block">FTI&nbsp;<span style="color:#a9cdcd">MANAGEMENT</span></a></td>
                  </tr>
                </table></td>
            </tr>
          </table>
          </td>
<?php
$menu = 1;
switch ($menu) {
  case '1':

?>
          <td width="37%" valign="top" bgcolor="#dddddd">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%" height="50" align="center" bgcolor="#666666" >
                  <a href="#" class="hvr-overline-from-center" style="color:#ccd2d3">APPLICATION COURSE</a>
                </td>
                <td align="center" bgcolor="#879999">
                  <a href="#" class="hvr-overline-from-center" style="color:#ccd2d3">ARCHIVE COURSE</a>
                </td>   
              </tr>
            </table>
            <div id="course_active" ></div>
          </td>
          <td width="35%" align="center" valign="top" bgcolor="#879999">
            <table width="100%" border="0" cellspacing="0" cellpadding="10">
              <tr>
                <td height="60" align="center" bgcolor="#FFFFFF">
                  <div class="headbareng" style="padding-top:10px !important;font-size:0.8em">INFORMATION TECHNOLOGY CENTER DEPT.</div>ศูนย์เทคโนโลยีสารสนเทศ
                </td>
                <td align="center" bgcolor="#E7540E"> <!--#879999 salmon-->
                  <a href="#" class="hvr-overline-from-center" style="color:#ccd2d3">APPLY COURSE</a> <!--#ccd2d3 ดดด-->
                </td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="3" id="course_info">
                <tr>
                  <td bgcolor="#a9cdcd" align="center">
                    <table width="90%" border="0" cellspacing="3" cellpadding="0" class="headbareng" style="padding:20px 0 20px 0;color:#666;font-size:0.5454em">
                      <tr>
                        <td align="left" width="150" style="color:#526b6b">Course Name:</td> 
                        <td align="left" colspan="3">ระดมความคิดฝ่ายรายจ่าย - วิธีสร้างสุขในการทำงาน</td>
                      </tr>
                      <tr>
                        <td align="left"  style="color:#526b6b">Instructor:</td>
                        <td align="left">ฝ่ายรายจ่าย</td>
                        <td align="left" width="150" style="color:#7ea1a1"></td>
                        <td align="left"></td>
                      </tr>
                      <tr>
                        <td align="left"  style="color:#526b6b">Course Date:</td>
                        <td align="left">24/09/2017</td>
                        <td align="left"  style="color:#526b6b">TO</td>
                        <td align="left">24/09/2017</td>
                      </tr>
                      <tr>
                        <td align="left"  style="color:#526b6b">Course Time:</td>
                        <td align="left">10:30</td>
                        <td align="left"  style="color:#526b6b">TO</td>
                        <td align="left">12:00</td>
                      </tr>
                      <tr>
                        <td align="left"  style="color:#526b6b">Students Quota:</td>
                        <td align="left">30</td>
                        <td align="left"  style="color:#526b6b">College:</td>
                        <td align="left" valign="top">G</td>
                      </tr>
                      <tr>
                        <td align="left"  style="color:#526b6b">Credit:</td>
                        <td align="left">4</td>
                        <td align="left" colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"  style="color:#526b6b">Location:</td>
                        <td align="left">ห้องอบรม C</td>
                        <td align="left" colspan="2">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="10">
              <tr>
                <td height="20" align="center" bgcolor="#FFFFFF">
                  <div class="headbareng" style="padding-top:0px !important;font-size:0.8em">DESCRIPTION</div>
                </td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td bgcolor="#879999" align="center">
                    <table width="90%" border="0" cellspacing="3" cellpadding="0" class="headbareng" style="padding:20px 0 20px 0;color:#666;font-size:0.5454em">
                      <tr>
                        <td align="left" height="100" style="color:#7ea1a1"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="10">
              <tr>
                <td height="20" align="center" bgcolor="#FFFFFF">
                  <div class="headbareng" style="padding-top:0px !important;font-size:0.8em">TARGET STUDENT</div>
                </td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td bgcolor="#879999" align="center">
                    <table width="90%" border="0" cellspacing="3" cellpadding="0" class="headbareng" style="padding:20px 0 20px 0;color:#666;font-size:0.5454em">
                      <tr>
                        <td align="left" style="color:#7ea1a1"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
            </table>
          </td>
<?php
    break;
  case '2': 
?>
          <td width="37%" valign="top" bgcolor="#dddddd">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%" height="50" align="center" bgcolor="#666666" >
                  <a href="#" class="hvr-overline-from-center" style="color:#ccd2d3">CREDITS</a>
                </td>  
              </tr>
            </table>
            <div id="course_active" ></div>
          </td>
          <td width="35%" align="center" valign="top" bgcolor="#879999">
            <table width="100%" border="0" cellspacing="0" cellpadding="10">
              <tr>
                <td height="60" align="center" bgcolor="#FFFFFF">
                  <div class="headbareng" style="padding-top:10px !important;font-size:0.8em">INFORMATION TECHNOLOGY CENTER DEPT.</div>ศูนย์เทคโนโลยีสารสนเทศ
                </td>
                <td align="center" bgcolor="#E7540E"> <!--#879999 salmon-->
                  <a href="#" class="hvr-overline-from-center" style="color:#ccd2d3">APPLY COURSE</a> <!--#ccd2d3 ดดด-->
                </td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td bgcolor="#a9cdcd" align="center">
                    <table width="90%" border="0" cellspacing="3" cellpadding="0" class="headbareng" style="padding:20px 0 20px 0;color:#666;font-size:0.5454em">
                      <tr>
                        <td align="left" width="150" style="color:#526b6b">Course Name:</td> 
                        <td align="left" colspan="3">ระดมความคิดฝ่ายรายจ่าย - วิธีสร้างสุขในการทำงาน</td>
                      </tr>
                      <tr>
                        <td align="left"  style="color:#526b6b">Instructor:</td>
                        <td align="left">ฝ่ายรายจ่าย</td>
                        <td align="left" width="150" style="color:#7ea1a1"></td>
                        <td align="left"></td>
                      </tr>
                      <tr>
                        <td align="left"  style="color:#526b6b">Course Date:</td>
                        <td align="left">24/09/2017</td>
                        <td align="left"  style="color:#526b6b">TO</td>
                        <td align="left">24/09/2017</td>
                      </tr>
                      <tr>
                        <td align="left"  style="color:#526b6b">Course Time:</td>
                        <td align="left">10:30</td>
                        <td align="left"  style="color:#526b6b">TO</td>
                        <td align="left">12:00</td>
                      </tr>
                      <tr>
                        <td align="left"  style="color:#526b6b">Students Quota:</td>
                        <td align="left">30</td>
                        <td align="left"  style="color:#526b6b">College:</td>
                        <td align="left" valign="top">G</td>
                      </tr>
                      <tr>
                        <td align="left"  style="color:#526b6b">Credit:</td>
                        <td align="left">4</td>
                        <td align="left" colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"  style="color:#526b6b">Location:</td>
                        <td align="left">ห้องอบรม C</td>
                        <td align="left" colspan="2">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="10">
              <tr>
                <td height="20" align="center" bgcolor="#FFFFFF">
                  <div class="headbareng" style="padding-top:0px !important;font-size:0.8em">DESCRIPTION</div>
                </td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td bgcolor="#879999" align="center">
                    <table width="90%" border="0" cellspacing="3" cellpadding="0" class="headbareng" style="padding:20px 0 20px 0;color:#666;font-size:0.5454em">
                      <tr>
                        <td align="left" height="100" style="color:#7ea1a1"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="10">
              <tr>
                <td height="20" align="center" bgcolor="#FFFFFF">
                  <div class="headbareng" style="padding-top:0px !important;font-size:0.8em">TARGET STUDENT</div>
                </td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td bgcolor="#879999" align="center">
                    <table width="90%" border="0" cellspacing="3" cellpadding="0" class="headbareng" style="padding:20px 0 20px 0;color:#666;font-size:0.5454em">
                      <tr>
                        <td align="left" style="color:#7ea1a1"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
            </table>
          </td>
<?php
    break;
  default:
    # code...
    break;
}
?>

   <!--        <td width="20%" align="center" valign="top" bgcolor="#7ea1a1">
           
            <table width="100%" border="0" cellspacing="0" cellpadding="10">
              <tr>
                <td height="60" align="center" bgcolor="#666666">
                  <div class="headbareng" style="padding-top:10px !important;font-size:0.8em;color: #c6c4bd;">STUDENT</div>
                </td>
              </tr>
            </table>

            <table width="100%" border="0" cellspacing="0" cellpadding="5">
          
              <tr class="border_bottom2px" id="elementgrey">
                <td align="center"><img src="images/picstaff-small.png" width="60" height="59" /></td>
                <td class="headbareng" style="color:#dddddd; font-size:0.5em">NIRUT RATTANABUREE <br />
                  <span class="headbarthai" style="font-size:1.75em; color: #DBDCC2;">นิรุตต์&nbsp;&nbsp;รัตนบุรี</span><br />
                  STAFF F3404</td>
              </tr>
              <tr class="border_bottom2px" id="elementgrey">
                <td align="center"><img src="images/picstaff-small.png" alt="" width="60" height="59" /></td>
                <td class="headbareng" style="color:#dddddd; font-size:0.5em">NIRUT RATTANABUREE <br />
                  <span class="headbarthai" style="font-size:1.75em; color: #DBDCC2;">นิรุตต์&nbsp;&nbsp;รัตนบุรี</span><br />
                  STAFF F3404</td>
              </tr>
              <tr class="border_bottom2px" id="elementgrey">
                <td align="center"><img src="images/picstaff-small.png" width="60" height="59" /></td>
                <td class="headbareng" style="color:#dddddd; font-size:0.5em">NIRUT RATTANABUREE <br />
                  <span class="headbarthai" style="font-size:1.75em; color: #DBDCC2;">นิรุตต์&nbsp;&nbsp;รัตนบุรี</span><br />
                  STAFF F3404</td>
              </tr>
              <tr class="border_bottom2px" id="elementgrey">
                <td align="center"><img src="images/picstaff-small.png" width="60" height="59" /></td>
                <td class="headbareng" style="color:#dddddd; font-size:0.5em">NIRUT RATTANABUREE <br />
                  <span class="headbarthai" style="font-size:1.75em; color: #DBDCC2;">นิรุตต์&nbsp;&nbsp;รัตนบุรี</span><br />
                  STAFF F3404</td>
              </tr>
              <tr class="border_bottom2px" id="elementgrey">
                <td align="center"><img src="images/picstaff-small.png" width="60" height="59" /></td>
                <td class="headbareng" style="color:#dddddd; font-size:0.5em">NIRUT RATTANABUREE <br />
                  <span class="headbarthai" style="font-size:1.75em; color: #DBDCC2;">นิรุตต์&nbsp;&nbsp;รัตนบุรี</span><br />
                  STAFF F3404</td>
              </tr>
              <tr id="elementgrey">
                <td align="center"><img src="images/picstaff-small.png" width="60" height="59" /></td>
                <td class="headbareng" style="color:#dddddd; font-size:0.5em">NIRUT RATTANABUREE <br />
                  <span class="headbarthai" style="font-size:1.75em; color: #DBDCC2;">นิรุตต์&nbsp;&nbsp;รัตนบุรี</span><br />
                  STAFF F3404</td>
              </tr>
            </table>
            


          </td>-->
        </tr>
      </table><br /><div id="popup1" class="overlay">
  <div class="popup">
    <a class="close" href="#">&times;</a>
    <div class="content">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top:30px;">
        <tr>
          <td width="40%" align="center" valign="top" bgcolor="#dddddd"><table width="100%" border="0" cellspacing="0" cellpadding="10">
            <tr>
              <td align="center" bgcolor="#e6ebea"><span class="headbareng" style="color:#879999; font-size:0.9em">&#10094;&nbsp;&nbsp;&nbsp;DECEMBER 2016&nbsp;&nbsp;&nbsp;&#10095;</span>
                <table width="90%" border="0" cellspacing="2" cellpadding="3" class="headbareng" style="font-size:0.6em; color:#666666" >
                  <tr>
                    <td height="40" align="center" valign="bottom">MON</td>
                    <td height="40" align="center" valign="bottom">TUE</td>
                    <td height="40" align="center" valign="bottom">WED</td>
                    <td height="40" align="center" valign="bottom">THU</td>
                    <td height="40" align="center" valign="bottom">FRI</td>
                    <td height="40" align="center" valign="bottom">SAT</td>
                    <td height="40" align="center" valign="bottom">SUN</td>
                    </tr>
                  <tr>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd" style="color:#aaaaaa">29</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd" style="color:#aaaaaa">30</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd" style="color:#aaaaaa">31</td>
                    <td height="40" align="left" valign="top" bgcolor="#879999" style="color:#fff">1</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">2</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">3</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">4</td>
                    </tr>
                  <tr>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">5</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">6</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">7</td>
                    <td height="40" align="left" valign="top" bgcolor="#879999" style="color:#fff">8</td>
                    <td height="40" align="left" valign="top" bgcolor="#F3D5B8">9</td>
                    <td height="40" align="left" valign="top" bgcolor="#F3D5B8">10</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">11</td>
                    </tr>
                  <tr>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">12</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">13</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">14</td>
                    <td height="40" align="left" valign="top" bgcolor="#879999" style="color:#fff">15</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">16</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">17</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">18</td>
                    </tr>
                  <tr>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">19</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">20</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">21</td>
                    <td height="40" align="left" valign="top" bgcolor="#879999" style="color:#fff">22</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">23</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">24</td>
                    <td height="40" align="left" valign="top" bgcolor="#dddddd">25</td>
                    </tr>
                  <tr>
                    <td height="50" align="left" valign="top" bgcolor="#dddddd">26</td>
                    <td height="50" align="left" valign="top" bgcolor="#dddddd">27</td>
                    <td height="50" align="left" valign="top" bgcolor="#dddddd">28</td>
                    <td height="50" align="left" valign="top" bgcolor="#879999" style="color:#fff">29</td>
                    <td height="50" align="left" valign="top" bgcolor="#dddddd">30</td>
                    <td height="50" align="left" valign="top" bgcolor="#dddddd">&nbsp;</td>
                    <td height="50" align="left" valign="top" bgcolor="#dddddd">&nbsp;</td>
                    </tr>
                  </table>
                <br /></td>
              <td width="35%" align="center" valign="top" bgcolor="#b5c9c9"><br />
               <div class="radio-item">
                    <input type="radio" id="ritema" name="ritem" value="ropt1" />
                    <label for="ritema"><span class="headbareng" style="color:#666; font-size:0.8em">HALF DAY</span></label>
                    </div>
                    <div class="radio-item">
                    <input type="radio" id="ritemB" name="ritem" value="ropt2" />
                    <label for="ritemB"><span class="headbareng" style="color:#666; font-size:0.8em">FULL DAY</span></label>
                    </div>
                    <br />
<br />
                <table width="75%" border="0" cellspacing="8" cellpadding="0" class="headbareng" style="color:#666666; font-size:0.6em">
                  <tr>
                    <td width="10%" bgcolor="#64a9ec">&nbsp;</td>
                    <td>PAID</td>
                  </tr>
                  <tr>
                    <td width="10%" bgcolor="#fc9241">&nbsp;</td>
                    <td>SICK</td>
                  </tr>
                  <tr>
                    <td width="10%" bgcolor="#f3d5b8">&nbsp;</td>
                    <td>ACCURED</td>
                  </tr>
                  <tr>
                    <td width="10%" bgcolor="#a789bf">&nbsp;</td>
                    <td>LEAVE WITHOUT PAY</td>
                  </tr>
                  <tr>
                    <td width="10%" bgcolor="#c0d247">&nbsp;</td>
                    <td>VACATION</td>
                  </tr>
                </table>
                <br />
                <br /></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="38%" align="center" valign="top"><br />
                  <table width="95%" border="0" cellspacing="3" cellpadding="3" class="headbareng" style="color:#666666; font-size:0.5454em">
                    <tr>
                      <td width="20%" align="right" valign="top">DOC. NO.:</td>
                      <td bgcolor="#c8caca">&nbsp;</td>
                      </tr>
                    <tr>
                      <td width="20%" align="right" valign="top">REF NO:</td>
                      <td bgcolor="#c8caca">&nbsp;</td>
                      </tr>
                    <tr>
                      <td width="20%" align="right" valign="top">ADDRESS:</td>
                      <td bgcolor="#c8caca"><br />
                        <br />
                        <br />
                        <br /></td>
                      </tr>
                    <tr>
                      <td width="20%" align="right" valign="top">TEL:</td>
                      <td bgcolor="#c8caca">&nbsp;</td>
                      </tr>
                    </table>
                  <br /></td>
                <td width="37%" align="center" valign="top"><br />
                  <table width="95%" border="0" cellspacing="3" cellpadding="3" class="headbareng" style="color:#666666; font-size:0.5454em">
                    <tr>
                      <td width="20%" align="right" valign="top">DOC. DATE:</td>
                      <td bgcolor="#c8caca">&nbsp;</td>
                      </tr>
                    <tr>
                      <td width="20%" align="right" valign="top">REMARK:</td>
                      <td bgcolor="#c8caca"><br />
                        <br />
                        <br /></td>
                      </tr>
                    <tr>
                      <td width="20%" align="right" valign="top">SUBSTITUE:</td>
                      <td bgcolor="#c8caca">&nbsp;</td>
                      </tr>
                    <tr>
                      <td align="right" valign="top">&nbsp;</td>
                      <td>&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
              </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" bgcolor="#FFFFFF"><table width="30%" border="0" cellspacing="15" cellpadding="0">
                  <tr>
                    <td width="50%" align="center" valign="middle" bgcolor="#7EA1A1"><a href="#popup1" style="display:block; background-color:" class="grey"><span class="headbareng" style="font-size:0.8em; line-height:1.8em; color:#dddddd;"> save</span></a></td>
                    <td width="50%" align="center" valign="middle" bgcolor="#7EA1A1"><a href="#popup1" style="display:block; background-color:" class="grey"><span class="headbareng" style="font-size:0.8em; line-height:1.8em; color:#dddddd;"> cancel</span></a></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
          </tr>
        </table>
      </div>
    </div>
</div>    </td>
  </tr>
</table>
</body>
</html>
