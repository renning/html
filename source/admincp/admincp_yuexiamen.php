<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_portalcategory.php 32945 2013-03-26 05:01:12Z zhangguosheng $
 */

if(!defined('IN_DISCUZ') || !defined('IN_DISCUZ')) {
	exit('Access Denied');
}

require_once libfile('function/portalcp');

$maparea = array('beijing'=>'1',
				'shanghai'=>'2',
				'qingdao'=>'3',
				'jinan'=>'3',
				'dezhou'=>'3',
				);

cpheader();
$area = in_array($operation, array('delete', 'move', 'perm', 'add', 'edit', 'list')) ? $area : $operation;


showsubmenu($area, array(
array('简介', 'yuexiamen&operation=list&area='.$area.'&do=jianjie', $do == 'jianjie'),
array('百科', 'yuexiamen&operation=list&area='.$area.'&do=baike', $do == 'baike'),
array('景区', 'yuexiamen&operation=list&area='.$area.'&do=poi', $do == 'poi'),
array('景点', 'yuexiamen&operation=list&area='.$area.'&do=place', $do == 'place'),
array('餐厅', 'yuexiamen&operation=list&area='.$area.'&do=canting', $do == 'canting'),
array('商场', 'yuexiamen&operation=list&area='.$area.'&do=shangchang', $do == 'shangchang' ),
array('娱乐场所', 'yuexiamen&operation=list&area='.$area.'&do=yulechangsuo', $do == 'yulechangsuo'),
array('飞机场,火车站,客运站', 'yuexiamen&operation=list&area='.$area.'&do=feijichang', $do == 'feijichang'),
array('交通', 'yuexiamen&operation=list&area='.$area.'&do=jiaotong', $do == 'jiaotong' ),
array('住宿', 'yuexiamen&operation=list&area='.$area.'&do=zhusu', $do == 'zhusu'),
array('美食', 'yuexiamen&operation=list&area='.$area.'&do=meishi', $do == 'meishi'),
array('购物', 'yuexiamen&operation=list&area='.$area.'&do=gouwu', $do == 'gouwu'),
array('娱乐', 'yuexiamen&operation=list&area='.$area.'&do=yule', $do == 'yule'),
));

if($operation == 'list' && $do=='poi') {

		$yuexiamen = C::t('yuexiamen_poi')->fetch_all_by_areaid($maparea[$area]);

		echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do=poi" >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do=poi">列表</a> </div>';


		$tdstyle = array('width="25"', 'width="60"', 'width="45"', 'width="55"');
		showformheader('portalcategory');
		showtableheader('', '', 'style="min-width:900px;*width:900px;"');
		showsubtitle(array('id', '名称', '简介',  '管理'), 'header', $tdstyle);
		foreach ($yuexiamen as $key=>$value) {
				echo '<tr class="hover" id="cat4">
						<td>'.$value['id'].'
						<td>
							<div class="parentboard">'.$value['name'].'</div>
						</td>
						<td>
							<div class="parentboard">'.$value['introduction'].'</div>
						</td>
						<td>
							<a href="admin.php?action=yuexiamen2&operation=list&area='.$value['name'].'&do=place&poiid='.$value['id'].'">新增</a>&nbsp;
							<a href="admin.php?action=yuexiamen&operation=edit&area='.$area.'&do=poi&poiid='.$value['id'].'">编辑</a>&nbsp;
							<a href="admin.php?frames=yes&action=yuexiamen&operation=delete&area='.$area.'&do=poi&poiid='.$value['id'].'">删除</a>&nbsp;
						</td>
					</tr>';
		}
		showtablefooter();
		showformfooter();
}elseif($operation == 'list' && ($do=='place' || $do=='canting' || $do=='shangchang' || $do=='yulechangsuo' || $do=='feijichang') ){
	echo $do;
	$yuexiamen = C::t('yuexiamen_place')->fetch_all_by_areaid($maparea[$area], $do);

	echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do='.$do.'">增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do=place">列表</a> </div>';

	$tdstyle = array('width="25"', 'width="60"', 'width="45"', 'width="55"');
	showtableheader('', '', 'style="min-width:900px;*width:900px;"');
	showsubtitle(array('id', '名称', '简介',  '管理'), 'header', $tdstyle);
	foreach ($yuexiamen as $key=>$value) {
		echo '<tr class="hover" id="cat4">
						<td>'.$value['id'].'
						<td>
							<div class="parentboard">'.$value['name'].'</div>
						</td>
						<td>
							<div class="parentboard">'.$value['introduction'].'</div>
						</td>
						<td>
							<a href="admin.php?action=yuexiamen&operation=edit&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">编辑</a>&nbsp;
							<a href="admin.php?frames=yes&action=yuexiamen&operation=delete&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">删除</a>&nbsp;
						</td>
					</tr>';
	}
	showtablefooter();
	showformfooter();
}elseif($operation == 'list' && $do=='gouwu'){
		echo $do;
		$yuexiamen = C::t('yuexiamen_gouwu')->fetch_all_by_areaid($maparea[$area], $do);

		echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do='.$do.'">增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do=place">列表</a> </div>';

		$tdstyle = array('width="25"', 'width="60"', 'width="45"', 'width="55"');
		showtableheader('', '', 'style="min-width:900px;*width:900px;"');
		showsubtitle(array('id', '名称', '简介',  '管理'), 'header', $tdstyle);
		foreach ($yuexiamen as $key=>$value) {
			echo '<tr class="hover" id="cat4">
						<td>'.$value['id'].'
						<td>
							<div class="parentboard">'.$value['name'].'</div>
						</td>
						<td>
							<div class="parentboard">'.$value['introduction'].'</div>
						</td>
						<td>
							<a href="admin.php?action=yuexiamen&operation=edit&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">编辑</a>&nbsp;
							<a href="admin.php?frames=yes&action=yuexiamen&operation=delete&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">删除</a>&nbsp;
						</td>
					</tr>';
		}
		showtablefooter();
		showformfooter();
}elseif($operation == 'list' && $do=='jiaotong'  ){
	$yuexiamen = C::t('yuexiamen_jiaotong')->fetch_all_by_areaid($maparea[$area]);

	echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do='.$do.'">增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';


	$tdstyle = array('width="25"', 'width="60"', 'width="45"', 'width="55"');
	showtableheader('', '', 'style="min-width:900px;*width:900px;"');
	showsubtitle(array('id',  '简介',  '管理'), 'header', $tdstyle);
	foreach ($yuexiamen as $key=>$value) {
		echo '<tr class="hover" id="cat4">
						<td>'.$value['id'].'</td>

						<td>
							<div class="parentboard">'.$value['introduction'].'</div>
						</td>
						<td>
							<a href="admin.php?action=yuexiamen&operation=edit&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">编辑</a>&nbsp;
							<a href="admin.php?frames=yes&action=yuexiamen&operation=delete&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">删除</a>&nbsp;
						</td>
					</tr>';
	}
	showtablefooter();
	showformfooter();

} elseif($operation == 'list' && $do=='meishi'  ){
	$yuexiamen = C::t('yuexiamen_meishi')->fetch_all_by_areaid($maparea[$area]);

	echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do='.$do.'">增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';


	$tdstyle = array('width="25"', 'width="60"', 'width="45"', 'width="55"');
	showtableheader('', '', 'style="min-width:900px;*width:900px;"');
	showsubtitle(array('id',  '简介',  '管理'), 'header', $tdstyle);
	foreach ($yuexiamen as $key=>$value) {
		echo '<tr class="hover" id="cat4">
						<td>'.$value['id'].'</td>

						<td>
							<div class="parentboard">'.$value['introduction'].'</div>
						</td>
						<td>
							<a href="admin.php?action=yuexiamen&operation=edit&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">编辑</a>&nbsp;
							<a href="admin.php?frames=yes&action=yuexiamen&operation=delete&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">删除</a>&nbsp;
						</td>
					</tr>';
	}
	showtablefooter();
	showformfooter();
} elseif($operation == 'list' && $do=='gouwu'  ){
		$yuexiamen = C::t('yuexiamen_gouwu')->fetch_all_by_areaid($maparea[$area]);

		echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do='.$do.'">增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';


		$tdstyle = array('width="25"', 'width="60"', 'width="45"', 'width="55"');
		showtableheader('', '', 'style="min-width:900px;*width:900px;"');
		showsubtitle(array('id',  '简介',  '管理'), 'header', $tdstyle);
		foreach ($yuexiamen as $key=>$value) {
			echo '<tr class="hover" id="cat4">
						<td>'.$value['id'].'</td>

						<td>
							<div class="parentboard">'.$value['introduction'].'</div>
						</td>
						<td>
							<a href="admin.php?action=yuexiamen&operation=edit&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">编辑</a>&nbsp;
							<a href="admin.php?frames=yes&action=yuexiamen&operation=delete&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">删除</a>&nbsp;
						</td>
					</tr>';
		}
		showtablefooter();
		showformfooter();
} elseif($operation == 'list' && $do=='yule'  ){
		$yuexiamen = C::t('yuexiamen_yule')->fetch_all_by_areaid($maparea[$area]);

		echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do='.$do.'">增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';


		$tdstyle = array('width="25"', 'width="60"', 'width="45"', 'width="55"');
		showtableheader('', '', 'style="min-width:900px;*width:900px;"');
		showsubtitle(array('id',  '简介',  '管理'), 'header', $tdstyle);
		foreach ($yuexiamen as $key=>$value) {
			echo '<tr class="hover" id="cat4">
						<td>'.$value['id'].'</td>

						<td>
							<div class="parentboard">'.$value['introduction'].'</div>
						</td>
						<td>
							<a href="admin.php?action=yuexiamen&operation=edit&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">编辑</a>&nbsp;
							<a href="admin.php?frames=yes&action=yuexiamen&operation=delete&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">删除</a>&nbsp;
						</td>
					</tr>';
		}
		showtablefooter();
		showformfooter();

} elseif($operation == 'list' && $do=='zhusu'  ){
		$yuexiamen = C::t('yuexiamen_zhusu')->fetch_all_by_areaid($maparea[$area]);

		echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do='.$do.'">增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';


		$tdstyle = array('width="25"', 'width="60"', 'width="45"', 'width="55"');
		showtableheader('', '', 'style="min-width:900px;*width:900px;"');
		showsubtitle(array('id',  '简介',  '管理'), 'header', $tdstyle);
		foreach ($yuexiamen as $key=>$value) {
			echo '<tr class="hover" id="cat4">
						<td>'.$value['id'].'</td>

						<td>
							<div class="parentboard">'.$value['introduction'].'</div>
						</td>
						<td>
							<a href="admin.php?action=yuexiamen&operation=edit&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">编辑</a>&nbsp;
							<a href="admin.php?frames=yes&action=yuexiamen&operation=delete&area='.$area.'&do='.$do.'&placeid='.$value['id'].'">删除</a>&nbsp;
						</td>
					</tr>';
		}
		showtablefooter();
		showformfooter();
}elseif($operation == 'delete' && $do='poi') {
		C::t('yuexiamen_poi')->delete($poiid);
		$url = 'admin.php?frames=yes&action=yuexiamen&operation=list&area=beijing&do=poi';
		cpmsg('portalcategory_edit_succeed', $url, 'succeed');
		} elseif(($operation == 'edit' || $operation == 'add') && $do=='zhusu') {
			$anchor = in_array($_GET['anchor'], array('basic', 'html')) ? $_GET['anchor'] : 'basic';
			@include_once DISCUZ_ROOT.'./data/cache/cache_domain.php';
			echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do="'.$do.' >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';
			// 	$channeldomain = isset($rootdomain['channel']) && $rootdomain['channel'] ? $rootdomain['channel'] : array();
			if(!submitcheck('detailsubmit')) {
				$url = 'yuexiamen&operation='.$operation.'&do='.$do.'&placeid='.$placeid.'&area='.$area;
				$result = array();
				if($placeid) {
					$cate = C::t('yuexiamen_zhusu')->fetch_all_by_id($jiaotongid, $do)[0];
				}
				showtagheader('div', 'basic', $anchor == 'basic');
				showformheader($url);
				showtableheader();
				$catemsg = '';
				showsetting('所属目的地', 'area', cplang($area), 'text');
				showsetting('简介', 'introduction', $cate['introduction'], 'textarea');
				showsetting('areaid', 'areaid', $maparea[$area], 'text');
				showsubmit('detailsubmit');
				showtablefooter();

				showformfooter();

			} else {
				$editcat = array(
						'area'=>$_GET['area'],
						'introduction' => $_GET['introduction'],
						'areaid' => $_GET['areaid'],
				);

				$editcat['dateline'] = TIMESTAMP;
				$editcat['username'] = $_G['username'];

				if($operation == 'add') {
					$_GET['catid'] = C::t('yuexiamen_zhusu')->insert($editcat, true);
				} elseif($operation == 'edit') {

					$sql = array();
					foreach($editcat as $key => $value) {
						array_push($sql, $key."='".$value."'");

					}

					C::t('yuexiamen_zhusu')->update($placeid);
				}

				$url = 'yuexiamen&operation=list&area='.$area.'&do='.$do;
				cpmsg('portalcategory_edit_succeed', $url, 'succeed');
			}
} elseif(($operation == 'edit' || $operation == 'add') && $do=='meishi') {
    echo <<<SCRIPT

SCRIPT;
	$anchor = in_array($_GET['anchor'], array('basic', 'html')) ? $_GET['anchor'] : 'basic';
	@include_once DISCUZ_ROOT.'./data/cache/cache_domain.php';
	echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do="'.$do.' >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';
// 	$channeldomain = isset($rootdomain['channel']) && $rootdomain['channel'] ? $rootdomain['channel'] : array();
	echo <<<script

<script type="text/javascript">
function previewImage(file)
{
  var MAXWIDTH  = 100;
  var MAXHEIGHT = 100;
  var div = document.getElementById('preview');
  if (file.files && file.files[0])
  {
    div.innerHTML = '<img id=imghead>';
    var img = document.getElementById('imghead');
    img.onload = function(){
      var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
      img.width = rect.width;
      img.height = rect.height;
      img.style.marginLeft = rect.left+'px';
      img.style.marginTop = rect.top+'px';
    }
    var reader = new FileReader();
    reader.onload = function(evt){img.src = evt.target.result;}
    reader.readAsDataURL(file.files[0]);
  }
  else
  {
    var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
    file.select();
    var src = document.selection.createRange().text;
    div.innerHTML = '<img id=imghead>';
    var img = document.getElementById('imghead');
    img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
    var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
    status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
    div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;margin-left:"+rect.left+"px;"+sFilter+src+"\"'></div>";
  }
}
function clacImgZoomParam( maxWidth, maxHeight, width, height ){
    var param = {top:0, left:0, width:width, height:height};
    if( width>maxWidth || height>maxHeight )
    {
        rateWidth = width / maxWidth;
        rateHeight = height / maxHeight;
        if( rateWidth > rateHeight )
        {
            param.width =  maxWidth;
            param.height = Math.round(height / rateWidth);
        }else
        {
            param.width = Math.round(width / rateHeight);
            param.height = maxHeight;
        }
    }
    param.left = Math.round((maxWidth - param.width) / 2);
    param.top = Math.round((maxHeight - param.height) / 2);
    return param;
}

		function insertAfter(newElement, targetElement){
    		var parent = targetElement.parentNode;
    		if (parent.lastChild == targetElement) {
        		// 如果最后的节点是目标元素，则直接添加。因为默认是最后
        		parent.appendChild(newElement);
    		}
    		else {
   		   	  parent.insertBefore(newElement, targetElement.nextSibling);
        		//如果不是，则插入在目标元素的下一个兄弟节点 的前面。也就是目标元素的后面
    		}
		}

		function findid(pre){
			for(var i=0; i<100; i++){
				var str = pre + String(i);
				var name = '';
				console.log(str);
				console.log(document.getElementById(str));
				if (document.getElementById(str) == null){
					name = str;
					break;
				}
			}
			return name;

		}

        function addRow(oid, name1, name2)
        {
        //添加一行
        var ss = document.getElementById(oid);

        var newTr0 = testTbl.insertRow();
		newTr0.setAttribute('class', 'noborder');
		newTr0.setAttribute('onmouseover', "setfaq(this, 'faq2cad')");

        //添加大行
        var newTd0 = newTr0.insertCell();
		newTd0.setAttribute('class', 'vtop rowform');

	    var newTd1 = newTr0.insertCell();
		newTd1.setAttribute('class', 'vtop tips2');
		newTd1.setAttribute('s', '1');

		name = findid(name1)

		newTd1.innerHTML = '<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" onkeydown="textareakey(this, event)" name="' + name + '" id="' + name + '" cols="50" class="tarea"></textarea>';
        newTd0.innerHTML = '<br> 双击输入框可扩大/缩小'
		insertAfter(newTr0, ss.parentNode.parentNode)


        //添加小行
        var newTr1 = testTbl.insertRow();

		var newTd10 = newTr1.insertCell();
		newTd10.setAttribute('colspan', '2');
		newTd10.setAttribute('class', "td27");
		newTd10.setAttribute('s', "1");
		name = findid(name2)


        newTd10.innerHTML = '<input type="text" name="' + name +'" id="' + name + '" value="">'
		insertAfter(newTr1, ss.parentNode.parentNode)

       }
    </script>
script;
	if(!submitcheck('detailsubmit')) {
		$url = 'yuexiamen&operation='.$operation.'&do='.$do.'&placeid='.$placeid.'&area='.$area;
		$result = array();
		if($placeid) {
			$cate = C::t('yuexiamen_meishi')->fetch_all_by_id($placeid, $do)[0];
		}
		$meishi = json_decode($cate['meishi'], true);
		$gonglue = json_decode($cate['gonglue'], true);

		showtagheader('div', 'basic', $anchor == 'basic');
		showformheader($url, $extra='enctype="multipart/form-data" ');
		echo '<table id="testTbl" class="tb tb2 ">';
		$catemsg = '';
		showsetting('所属目的地', 'area', cplang($area), 'text');
		showsetting('所属目的地id', 'areaid', $area, 'text');
		showsetting('简介', 'introduction', $cate['introduction'], 'textarea');
		echo <<<INPUT
			<tr><td><div id="preview">
			</div></td></tr>
    		<br/>
    		<tr><td><input type="file" name='upfile' onchange="previewImage(this)" />
			</td></tr>
			<tr><td colspan="2" class="td27" s="1">新增美食
				<input type="button" id="addmeishi" onclick="addRow(this.id, 'ms;', 'namems;');" value="新增" /></td></tr>;
INPUT;
			$ms = $meishi['ms'];
			$namems = $meishi['namems'];
// 			sort($namems);
// 			print_r($namems);
// 			print_r($ms);
			foreach($namems as $cc=>$dd){
// 				echo $cc; echo $dd; echo $ms[$cc];exit;
				echo '<tr><td colspan="2" class="td27" s="1"><input type="text" name="namems;'.$cc.'" id="namems;'.$cc.'" value="'.$dd.'"></td></tr>	';

				echo '<tr class="noborder" onmouseover="setfaq(this, "faqe05d")">';
				echo '<td class="vtop rowform">';
				echo '<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" onkeydown="textareakey(this, event)" name="ms;'.$cc.'" id="ms;'.$cc.'" cols="50" class="tarea">'.$ms[$cc].'</textarea>';
				echo '</td>';
				echo '<td class="vtop tips2" s="1"><br>双击输 入框可扩大/缩小</td>';
				echo '</tr>';
			}



		echo <<<INPUT
		<tr><td colspan="2" class="td27" s="1">新增攻略
				<input type="button" id="addgl" onclick="addRow(this.id, 'gl;', 'namegl;');" value="新增" /></td></tr>;
INPUT;
		$gl = $gonglue['gl'];
		$namegl = $gonglue['namegl'];

		foreach($namegl as $cc=>$dd){
			echo '<tr><td colspan="2" class="td27" s="1"><input type="text" name="namegl;'.$cc.'" id="namegl;'.$cc.'" value="'.$dd.'"></td></tr>	';
			echo '<tr class="noborder" onmouseover="setfaq(this, "faqe05d")">';
			echo '<td class="vtop rowform">';
			echo '<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" onkeydown="textareakey(this, event)" name="gl;'.$cc.'" id="gl;'.$cc.'" id="gl'.$cc.'" cols="50" class="tarea">'.$gl[$cc].'</textarea>';
			echo '</td>';
			echo '<td class="vtop tips2" s="1"><br>双击输入框可扩大/缩小</td>';
			echo '</tr>';
		}
		showsetting('areaid', 'areaid', $maparea[$area], 'text');
		showsubmit('detailsubmit');
		showtablefooter();
		showformfooter();

	} else {
		$file = $_FILES["upfile"];
		$destination = '/var/www/yiiframework-cms/data/attachment/yuexiamen';
		$filename=$file["tmp_name"];
		$image_size = getimagesize($filename);
		$pinfo=pathinfo($file["name"]);
		$ftype=$pinfo['extension'];
		$destination = $destination_folder.time().".".$ftype;
		
	
		if(!move_uploaded_file($filename, $destination))
		{
			echo "移动文件出错";
			exit;
		}
		
		$area = $_GET['areaid'];

		$editcat = array(
				'area'=>$_GET['area'],
				'introduction' => $_GET['introduction'],
				'areaid' => $_GET['areaid'],
		);
        $ms = array();
        $gl = array();
		$editcat['dateline'] = TIMESTAMP;
		$ms = array();
		$ms['ms'] = array();
		$ms['namems'] = array();
		$gl = array();
		$gl['gl'] = array();
		$gl['namegl'] = array();
		foreach($_POST as $key=>$value){
			$tmp = explode(';', $key);
			if(count($tmp) == 2){
				$ss = $tmp[0];
				$kk = $tmp[1];
				if(strpos($key, 'ms') !== false){
					$ms[$ss][$kk] = $value;
				}elseif(strpos($key, 'gl') !== false){
					$gl[$ss][$kk] = $value;
				}
			}

		}
        $editcat['meishi'] = json_encode($ms);
        $editcat['gonglue'] = json_encode($gl);

		if($operation == 'add') {
			$_GET['catid'] = C::t('yuexiamen_meishi')->insert($editcat, true);
		} elseif($operation == 'edit') {
				$sql = array();

				foreach($editcat as $key => $value) {
						array_push($sql, $key."='".$value."'");

				}
// 				echo $sql;exit;
				C::t('yuexiamen_meishi')->update($sql, $placeid);
		}
// 		echo 2,$area,2;
// 		echo $do;exit;
		$url = 'yuexiamen&operation=list&area='.$area.'&do='.$do;
		cpmsg('portalcategory_edit_succeed', $url, 'succeed');
		}

} elseif(($operation == 'edit' || $operation == 'add') && $do=='gouwu') {
			$anchor = in_array($_GET['anchor'], array('basic', 'html')) ? $_GET['anchor'] : 'basic';
			@include_once DISCUZ_ROOT.'./data/cache/cache_domain.php';
			echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do="'.$do.' >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';
			// 	$channeldomain = isset($rootdomain['channel']) && $rootdomain['channel'] ? $rootdomain['channel'] : array();
			echo <<<script
	  <script>
		function insertAfter(newElement, targetElement){
    		var parent = targetElement.parentNode;
    		if (parent.lastChild == targetElement) {
        		// 如果最后的节点是目标元素，则直接添加。因为默认是最后
        		parent.appendChild(newElement);
    		}
    		else {
   		   	  parent.insertBefore(newElement, targetElement.nextSibling);
        		//如果不是，则插入在目标元素的下一个兄弟节点 的前面。也就是目标元素的后面
    		}
		}

		function findid(pre){
			for(var i=0; i<100; i++){
				var str = pre + String(i);
				var name = '';
				console.log(str);
				console.log(document.getElementById(str));
				if (document.getElementById(str) == null){
					name = str;
					break;
				}
			}
			return name;

		}

        function addRow(oid, name1, name2)
        {
        //添加一行
        var ss = document.getElementById(oid);

        var newTr0 = testTbl.insertRow();
		newTr0.setAttribute('class', 'noborder');
		newTr0.setAttribute('onmouseover', "setfaq(this, 'faq2cad')");

        //添加大行
        var newTd0 = newTr0.insertCell();
		newTd0.setAttribute('class', 'vtop rowform');

	    var newTd1 = newTr0.insertCell();
		newTd1.setAttribute('class', 'vtop tips2');
		newTd1.setAttribute('s', '1');

		name = findid(name1)

		newTd1.innerHTML = '<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" onkeydown="textareakey(this, event)" name="' + name + '" id="' + name + '" cols="50" class="tarea"></textarea>';
        newTd0.innerHTML = '<br> 双击输入框可扩大/缩小'
		insertAfter(newTr0, ss.parentNode.parentNode)


        //添加小行
        var newTr1 = testTbl.insertRow();

		var newTd10 = newTr1.insertCell();
		newTd10.setAttribute('colspan', '2');
		newTd10.setAttribute('class', "td27");
		newTd10.setAttribute('s', "1");
		name = findid(name2)


        newTd10.innerHTML = '<input type="text" name="' + name +'" id="' + name + '" value="">'
		insertAfter(newTr1, ss.parentNode.parentNode)

       }
    </script>
script;
			if(!submitcheck('detailsubmit')) {
				$url = 'yuexiamen&operation='.$operation.'&do='.$do.'&placeid='.$placeid.'&area='.$area;
				$result = array();
				if($placeid) {
					$cate = C::t('yuexiamen_gouwu')->fetch_all_by_id($placeid, $do)[0];
				}
				$gouwu = json_decode($cate['gouwu'], true);

				showtagheader('div', 'basic', $anchor == 'basic');
				showformheader($url);
				echo '<table id="testTbl" class="tb tb2 ">';
				$catemsg = '';
				showsetting('所属目的地', 'area', cplang($area), 'text');
				showsetting('所属目的地id', 'areaid', $area, 'text');
				showsetting('简介', 'introduction', $cate['introduction'], 'textarea');
				echo <<<INPUT
			<tr><td colspan="2" class="td27" s="1">新增购物
				<input type="button" id="addgousu" onclick="addRow(this.id, 'gu;', 'namegu;');" value="新增" /></td></tr>;
INPUT;

				$gu = $gouwu['gu'];
				$namegu = $gouwu['namegu'];
				// 			sort($namems);
				// 			print_r($namems);
				// 			print_r($ms);
				foreach($namegu as $cc=>$dd){
					// 				echo $cc; echo $dd; echo $ms[$cc];exit;
					echo '<tr><td colspan="2" class="td27" s="1"><input type="text" name="namegu;'.$cc.'" id="namegu;'.$cc.'" value="'.$dd.'"></td></tr>	';

					echo '<tr class="noborder" onmouseover="setfaq(this, "faqe05d")">';
					echo '<td class="vtop rowform">';
					echo '<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" onkeydown="textareakey(this, event)" name="gu;'.$cc.'" id="gu;'.$cc.'" cols="50" class="tarea">'.$gu[$cc].'</textarea>';
					echo '</td>';
					echo '<td class="vtop tips2" s="1"><br>双击输 入框可扩大/缩小</td>';
					echo '</tr>';
				}





				showsetting('areaid', 'areaid', $maparea[$area], 'text');
				showsubmit('detailsubmit');
				showtablefooter();
				showformfooter();

			} else {
				echo 2,$area,2;
				$area = $_GET['areaid'];

				$editcat = array(
						'area'=>$_GET['area'],
						'introduction' => $_GET['introduction'],
						'areaid' => $_GET['areaid'],
				);
				$gu = array();
				$editcat['dateline'] = TIMESTAMP;
				$gu = array();
				$gu['gu'] = array();
				$gu['namegu'] = array();
;
				foreach($_POST as $key=>$value){
					$tmp = explode(';', $key);
					if(count($tmp) == 2){
						$ss = $tmp[0];
						$kk = $tmp[1];
						if(strpos($key, 'gu') !== false){
							$gu[$ss][$kk] = $value;
						}
					}

				}
				$editcat['gouwu'] = json_encode($gu);

				if($operation == 'add') {
					$_GET['catid'] = C::t('yuexiamen_gouwu')->insert($editcat, true);
				} elseif($operation == 'edit') {
					$sql = array();

					foreach($editcat as $key => $value) {
						array_push($sql, $key."='".$value."'");

					}
					// 				echo $sql;exit;
					C::t('yuexiamen_gouwu')->update($sql, $placeid);
				}
				// 		echo 2,$area,2;
				// 		echo $do;exit;
				$url = 'yuexiamen&operation=list&area='.$area.'&do='.$do;
				cpmsg('portalcategory_edit_succeed', $url, 'succeed');
			}
} elseif(($operation == 'edit' || $operation == 'add') && $do=='yule') {
			$anchor = in_array($_GET['anchor'], array('basic', 'html')) ? $_GET['anchor'] : 'basic';
			@include_once DISCUZ_ROOT.'./data/cache/cache_domain.php';
			echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do="'.$do.' >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';
			// 	$channeldomain = isset($rootdomain['channel']) && $rootdomain['channel'] ? $rootdomain['channel'] : array();
			echo <<<script
	  <script>
		function insertAfter(newElement, targetElement){
    		var parent = targetElement.parentNode;
    		if (parent.lastChild == targetElement) {
        		// 如果最后的节点是目标元素，则直接添加。因为默认是最后
        		parent.appendChild(newElement);
    		}
    		else {
   		   	  parent.insertBefore(newElement, targetElement.nextSibling);
        		//如果不是，则插入在目标元素的下一个兄弟节点 的前面。也就是目标元素的后面
    		}
		}

		function findid(pre){
			for(var i=0; i<100; i++){
				var str = pre + String(i);
				var name = '';
				console.log(str);
				console.log(document.getElementById(str));
				if (document.getElementById(str) == null){
					name = str;
					break;
				}
			}
			return name;

		}

        function addRow(oid, name1, name2)
        {
        //添加一行
        var ss = document.getElementById(oid);

        var newTr0 = testTbl.insertRow();
		newTr0.setAttribute('class', 'noborder');
		newTr0.setAttribute('onmouseover', "setfaq(this, 'faq2cad')");

        //添加大行
        var newTd0 = newTr0.insertCell();
		newTd0.setAttribute('class', 'vtop rowform');

	    var newTd1 = newTr0.insertCell();
		newTd1.setAttribute('class', 'vtop tips2');
		newTd1.setAttribute('s', '1');

		name = findid(name1)

		newTd1.innerHTML = '<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" onkeydown="textareakey(this, event)" name="' + name + '" id="' + name + '" cols="50" class="tarea"></textarea>';
        newTd0.innerHTML = '<br> 双击输入框可扩大/缩小'
		insertAfter(newTr0, ss.parentNode.parentNode)


        //添加小行
        var newTr1 = testTbl.insertRow();

		var newTd10 = newTr1.insertCell();
		newTd10.setAttribute('colspan', '2');
		newTd10.setAttribute('class', "td27");
		newTd10.setAttribute('s', "1");
		name = findid(name2)


        newTd10.innerHTML = '<input type="text" name="' + name +'" id="' + name + '" value="">'
		insertAfter(newTr1, ss.parentNode.parentNode)

       }
    </script>
script;
			if(!submitcheck('detailsubmit')) {
				$url = 'yuexiamen&operation='.$operation.'&do='.$do.'&placeid='.$placeid.'&area='.$area;
				$result = array();
				if($placeid) {
					$cate = C::t('yuexiamen_yule')->fetch_all_by_id($placeid, $do)[0];
				}
				$yule = json_decode($cate['yule'], true);

				showtagheader('div', 'basic', $anchor == 'basic');
				showformheader($url);
				echo '<table id="testTbl" class="tb tb2 ">';
				$catemsg = '';
				showsetting('所属目的地', 'area', cplang($area), 'text');
				showsetting('所属目的地2', 'area2', $area, 'text');
				showsetting('简介', 'introduction', $cate['introduction'], 'textarea');
				echo <<<INPUT
			<tr><td colspan="2" class="td27" s="1">新增娱乐
				<input type="button" id="addgousu" onclick="addRow(this.id, 'yl;', 'nameyl;');" value="新增" /></td></tr>;
INPUT;

				$yl = $yule['yl'];
				$nameyl = $yule['nameyl'];
				// 			sort($namems);
				// 			print_r($namems);
				// 			print_r($ms);
				foreach($nameyl as $cc=>$dd){
					// 				echo $cc; echo $dd; echo $ms[$cc];exit;
					echo '<tr><td colspan="2" class="td27" s="1"><input type="text" name="nameyl;'.$cc.'" id="nameyl;'.$cc.'" value="'.$dd.'"></td></tr>	';

					echo '<tr class="noborder" onmouseover="setfaq(this, "faqe05d")">';
					echo '<td class="vtop rowform">';
					echo '<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" onkeydown="textareakey(this, event)" name="yl;'.$cc.'" id="yl;'.$cc.'" cols="50" class="tarea">'.$yl[$cc].'</textarea>';
					echo '</td>';
					echo '<td class="vtop tips2" s="1"><br>双击输 入框可扩大/缩小</td>';
					echo '</tr>';
				}





				showsetting('areaid', 'areaid', $maparea[$area], 'text');
				showsubmit('detailsubmit');
				showtablefooter();
				showformfooter();

			} else {
				$area = $_GET['area2'];
				echo 2,$area,2;

				$editcat = array(
						'area'=>$_GET['area'],
						'introduction' => $_GET['introduction'],
						'areaid' => $_GET['areaid'],
				);
				$yl = array();
				$editcat['dateline'] = TIMESTAMP;
				$yl = array();
				$yl['yl'] = array();
				$yl['nameyl'] = array();
;
				foreach($_POST as $key=>$value){
					$tmp = explode(';', $key);
					if(count($tmp) == 2){
						$ss = $tmp[0];
						$kk = $tmp[1];
						if(strpos($key, 'yl') !== false){
							$yl[$ss][$kk] = $value;
						}
					}

				}
				$editcat['yule'] = json_encode($yl);

				if($operation == 'add') {
					$_GET['catid'] = C::t('yuexiamen_yule')->insert($editcat, true);
				} elseif($operation == 'edit') {
					$sql = array();

					foreach($editcat as $key => $value) {
						array_push($sql, $key."='".$value."'");

					}
					// 				echo $sql;exit;
					C::t('yuexiamen_yule')->update($sql, $placeid);
				}
				// 		echo 2,$area,2;
				// 		echo $do;exit;
				$url = 'yuexiamen&operation=list&area='.$area.'&do='.$do;
				cpmsg('portalcategory_edit_succeed', $url, 'succeed');
			}

} elseif(($operation == 'edit' || $operation == 'add') && $do=='jiaotong') {
				$anchor = in_array($_GET['anchor'], array('basic', 'html')) ? $_GET['anchor'] : 'basic';
				@include_once DISCUZ_ROOT.'./data/cache/cache_domain.php';
				echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do="'.$do.' >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';
				// 	$channeldomain = isset($rootdomain['channel']) && $rootdomain['channel'] ? $rootdomain['channel'] : array();
				if(!submitcheck('detailsubmit')) {
					$url = 'yuexiamen&operation='.$operation.'&do='.$do.'&placeid='.$placeid.'&area='.$area;
					$result = array();
					if($placeid) {
						$cate = C::t('yuexiamen_jiaotong')->fetch_all_by_id($jiaotongid, $do)[0];
					}
					showtagheader('div', 'basic', $anchor == 'basic');
					showformheader($url);
					showtableheader();
					$catemsg = '';
					showsetting('所属目的地', 'area', cplang($area), 'text');
					showsetting('简介', 'introduction', $cate['introduction'], 'textarea');
					showsetting('areaid', 'areaid', $maparea[$area], 'text');

					showsetting('飞机', 'feiji', $cate['feiji'], 'textarea');
					showsetting('火车', 'huoche', $cate['huoche'], 'textarea');
					showsetting('汽车', 'qiche', $cate['qiche'], 'textarea');
					showsetting('轮船', 'lunchuan', $cate['lunchuan'], 'textarea');
					showsetting('出租车', 'chuzuche', $cate['chuzuche'], 'textarea');
					showsetting('旅游观光车', 'lvyouguanguangche', $cate['lvyouguanguangche'], 'textarea');
					showsubmit('detailsubmit');
					showtablefooter();

					showformfooter();

				} else {
					$editcat = array(
							'area'=>$_GET['area'],
							'introduction' => $_GET['introduction'],
							'feiji' => $_GET['feiji'],
							'huoche' => $_GET['huoche'],
							'areaid' => $_GET['areaid'],

							'qiche' => $_GET['qiche'],
							'lunchuan' => $_GET['lunchuan'],
							'chuzuche' => $_GET['chuzuche'],
							'lvyouguanguangche' => $_GET['lvyouguanguangche']
					);

					$editcat['dateline'] = TIMESTAMP;
					$editcat['username'] = $_G['username'];

					if($operation == 'add') {
						$_GET['catid'] = C::t('yuexiamen_jiaotong')->insert($editcat, true);
					} elseif($operation == 'edit') {

						$sql = array();
						foreach($editcat as $key => $value) {
							array_push($sql, $key."='".$value."'");

						}
						C::t('yuexiamen_jiaotong')->update($placeid);
					}

					$url = $operation == 'add' ? 'action=yuexiamen#cat'.$_GET['catid'] : 'action=yuexiamen&operation=edit&catid='.$_GET['catid'];
					$url = 'yuexiamen&operation=list&area='.$area.'&do='.$do;
					cpmsg('portalcategory_edit_succeed', $url, 'succeed');
				}
} elseif(($operation == 'edit' || $operation == 'add') && ($do=='place' || $do=='canting' || $do=='shangchang' || $do=='yulechangsuo' || $do=='feijichang')) {
			$anchor = in_array($_GET['anchor'], array('basic', 'html')) ? $_GET['anchor'] : 'basic';
			@include_once DISCUZ_ROOT.'./data/cache/cache_domain.php';
			echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do="'.$do.' >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do='.$do.'">列表</a> </div>';
			// 	$channeldomain = isset($rootdomain['channel']) && $rootdomain['channel'] ? $rootdomain['channel'] : array();
			if(!submitcheck('detailsubmit')) {
				$url = 'yuexiamen&operation='.$operation.'&do='.$do.'&placeid='.$placeid.'&area='.$area;
				$result = array();
				if($placeid) {
					$cate = C::t('yuexiamen_place')->fetch_all_by_id($placeid, $do)[0];
				}
				showtagheader('div', 'basic', $anchor == 'basic');
				showformheader($url);
				showtableheader();
				$catemsg = '';

				showsetting('所属目的地', 'area', cplang($area), 'text');
				showsetting('名称', 'name', $cate['name'], 'text');
				showsetting('areaid', 'areaid', $maparea[$area], 'text');
				showsetting('类型', 'placetype', $do, 'text');
				showsetting('地址', 'address', $cate['address'], 'textarea');
				showsetting('简介', 'introduction', $cate['introduction'], 'textarea');
				showsetting('电话', 'phone', $cate['phone'], 'text');
				showsetting('网址', 'site', $cate['site'], 'text');
				showsetting('价格', 'price', $cate['price'], 'text');
				showsetting('到达交通', 'traffic', $cate['traffic'], 'textarea');
				showsetting('地点分类', '', $cate['businesshours'], 'textarea');
				showsetting('景点主题', 'businesshours', $cate['businesshours'], 'textarea');
				showsetting('适合游玩的季节', 'businesshours', $cate['businesshours'], 'textarea');
				
				
				showsubmit('detailsubmit');
				showtablefooter();
				showformfooter();

			} else {
				$editcat = array(
						'area'=>$_GET['area'],
						'name' => $_GET['name'],
						'areaid' => $_GET['areaid'],
						'placetype' => $_GET['placetype'],
						'address' => $_GET['address'],
						'introduction' => $_GET['introduction'],
						'phone' => $_GET['phone'],
						'site' => $_GET['site'],
						'price' => $_GET['price'],
						'traffic' => $_GET['traffic'],
						'businesshours' => $_GET['businesshours'],
						'areaid' => $_GET['areaid'],

				);

				$editcat['dateline'] = TIMESTAMP;
				$editcat['username'] = $_G['username'];

				if($operation == 'add') {
					$_GET['catid'] = C::t('yuexiamen_place')->insert($editcat, true);
				} elseif($operation == 'edit') {

					$sql = array();
					foreach($editcat as $key => $value) {
						array_push($sql, $key."='".$value."'");

					}
					C::t('yuexiamen_place')->update($sql, $placeid);
				}

				$url = $operation == 'add' ? 'action=yuexiamen#cat'.$_GET['catid'] : 'action=yuexiamen&operation=edit&catid='.$_GET['catid'];
				$url = 'yuexiamen&operation=list&area='.$area.'&do=place';
				cpmsg('portalcategory_edit_succeed', $url, 'succeed');
			}

		}
elseif(($operation == 'edit' || $operation == 'add') && $do=='poi') {
		$anchor = in_array($_GET['anchor'], array('basic', 'html')) ? $_GET['anchor'] : 'basic';

		@include_once DISCUZ_ROOT.'./data/cache/cache_domain.php';
		echo '<div style="height:30px;line-height:30px;"><a href="admin.php?action=yuexiamen&operation=add&area='.$area.'&do=poi" >增加</a> |
				<a href="admin.php?action=yuexiamen&operation=list&area='.$area.'&do=poi">列表</a> </div>';
// 		$channeldomain = isset($rootdomain['channel']) && $rootdomain['channel'] ? $rootdomain['channel'] : array();
		// 	print_r($channeldomain);exit;
		// 	var_dump(submitcheck('detailsubmit'));exit;
		// 	var_dump($_GET['formhash']) ;exit;
		if(!submitcheck('detailsubmit')) {

			$url = 'yuexiamen&operation='.$operation.'&do='.$do.'&poiid='.$poiid.'&area='.$area;
			$result = array();
			if($poiid) {
				$result = C::t('yuexiamen_poi')->fetch_all_by_id($poiid)[0];
			}
			showtagheader('div', 'basic', $anchor == 'basic');
			showformheader($url, $extra='enctype="multipart/form-data" ');
			showtableheader();
			$catemsg = '';
			echo <<<INPUT
			<script type="text/javascript">
function previewImage(file)
{
  var MAXWIDTH  = 100;
  var MAXHEIGHT = 100;
  var div = document.getElementById('preview');
  if (file.files && file.files[0])
  {
    div.innerHTML = '<img id=imghead>';
    var img = document.getElementById('imghead');
    img.onload = function(){
      var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
      img.width = rect.width;
      img.height = rect.height;
      img.style.marginLeft = rect.left+'px';
      img.style.marginTop = rect.top+'px';
    }
    var reader = new FileReader();
    reader.onload = function(evt){img.src = evt.target.result;}
    reader.readAsDataURL(file.files[0]);
  }
  else
  {
    var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
    file.select();
    var src = document.selection.createRange().text;
    div.innerHTML = '<img id=imghead>';
    var img = document.getElementById('imghead');
    img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
    var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
    status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
    div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;margin-left:"+rect.left+"px;"+sFilter+src+"\"'></div>";
  }
}
function clacImgZoomParam( maxWidth, maxHeight, width, height ){
    var param = {top:0, left:0, width:width, height:height};
    if( width>maxWidth || height>maxHeight )
    {
        rateWidth = width / maxWidth;
        rateHeight = height / maxHeight;
        if( rateWidth > rateHeight )
        {
            param.width =  maxWidth;
            param.height = Math.round(height / rateWidth);
        }else
        {
            param.width = Math.round(width / rateHeight);
            param.height = maxHeight;
        }
    }
    param.left = Math.round((maxWidth - param.width) / 2);
    param.top = Math.round((maxHeight - param.height) / 2);
    return param;
}
					</script>
			<tr><td><div id="preview">
			</div></td></tr>
    		<br/>
    		<tr><td><input type="file" name='upfile' onchange="previewImage(this)" />
			</td></tr>
INPUT;
			showsetting('所属目的地', 'area', cplang($area), 'text');
			showsetting('名称', 'name', $result['name'], 'text');
			showsetting('area', 'areaid', $maparea[$area], 'text');
			showsetting('简介', 'introduction', $result['introduction'], 'textarea');
			showsetting('级别划分', 'level', $result['level'], 'text');

			showsubmit('detailsubmit');
			showtablefooter();
			showformfooter();

		} else {
			$file = $_FILES["upfile"];
			$destination = '/var/www/yiiframework-cms/data/attachment/yuexiamen';
			$filename=$file["tmp_name"];
			$image_size = getimagesize($filename);
			$pinfo=pathinfo($file["name"]);
			$ftype=$pinfo['extension'];
			$destination = $destination_folder.time().".".$ftype;
			
			
			move_uploaded_file($filename, $destination);

			

			$editcat = array(
			'area'=>$_GET['area'],
			'introduction' => $_GET['introduction'],
			'name' => $_GET['name'],
			'areaid' => $_GET['areaid'],
			'level' => $_GET['level'],
			'pic' => $destination,
			);

			$editcat['dateline'] = TIMESTAMP;
			$editcat['username'] = $_G['username'];

			if($operation == 'add') {
				$_GET['catid'] = C::t('yuexiamen_poi')->insert($editcat, true);
			} elseif($operation == 'edit') {

				$sql = array();
				foreach($editcat as $key => $value) {
						array_push($sql, $key."='".$value."'");

				}
				C::t('yuexiamen_poi')->update($sql, $poiid);
			}

			$url = $operation == 'add' ? 'action=yuexiamen#cat'.$_GET['catid'] : 'action=yuexiamen&operation=edit&catid='.$_GET['catid'];
			$url = 'yuexiamen&operation=list&area='.$area.'&do=poi';
			cpmsg('portalcategory_edit_succeed', $url, 'succeed');
		}
}

function showcategoryrow($key, $level = 0, $last = '') {
	global $_G;

	loadcache('yuexiamen');
	$value = $_G['cache']['yuexiamen'][$key];
	$return = '';

// 	include_once libfile('function/portalcp');
	$value['articles'] = category_get_num('portal', $key);
	$publish = '';
	if(empty($_G['cache']['portalcategory'][$key]['disallowpublish'])) {
		$publish = '&nbsp;<a href="portal.php?mod=portalcp&ac=article&catid='.$key.'" target="_blank">'.cplang('portalcategory_publish').'</a>';
	}
	if($level == 2) {
		$class = $last ? 'lastchildboard' : 'childboard';
		$return = '<tr class="hover" id="cat'.$value['catid'].'"><td>&nbsp;</td><td class="td25"><input type="text" class="txt" name="neworder['.$value['catid'].']" value="'.$value['displayorder'].'" /></td><td><div class="'.$class.'">'.
		'<input type="text" class="txt" name="name['.$value['catid'].']" value="'.$value['catname'].'" />'.
		'</div>'.
		'</td><td>'.$value['articles'].'</td>'.
		'<td>'.(empty($value['disallowpublish']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(!empty($value['allowcomment']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(empty($value['closed']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td><input class="radio" type="radio" name="newsetindex" value="'.$value['catid'].'" '.($value['caturl'] == $_G['setting']['defaultindex'] ? 'checked="checked"':'').' /></td>'.
		'<td><a href="'.$value['caturl'].'" target="_blank">'.cplang('view').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=edit&catid='.$value['catid'].'">'.cplang('edit').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=move&catid='.$value['catid'].'">'.cplang('portalcategory_move').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=delete&catid='.$value['catid'].'">'.cplang('delete').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=diytemplate&operation=perm&targettplname=portal/list_'.$value['catid'].'&tpldirectory='.getdiydirectory($value['primaltplname']).'">'.cplang('portalcategory_blockperm').'</a></td>
		<td><a href="'.ADMINSCRIPT.'?action=article&operation=list&&catid='.$value['catid'].'">'.cplang('portalcategory_articlemanagement').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=perm&catid='.$value['catid'].'">'.cplang('portalcategory_articleperm').'</a>'.$publish.'</td></tr>';
	} elseif($level == 1) {
		$return = '<tr class="hover" id="cat'.$value['catid'].'"><td>&nbsp;</td><td class="td25"><input type="text" class="txt" name="neworder['.$value['catid'].']" value="'.$value['displayorder'].'" /></td><td><div class="board">'.
		'<input type="text" class="txt" name="name['.$value['catid'].']" value="'.$value['catname'].'" />'.
		'<a class="addchildboard" href="'.ADMINSCRIPT.'?action=portalcategory&operation=add&upid='.$value['catid'].'">'.cplang('portalcategory_addthirdcategory').'</a></div>'.
		'</td><td>'.$value['articles'].'</td>'.
		'<td>'.(empty($value['disallowpublish']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(!empty($value['allowcomment']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(empty($value['closed']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td><input class="radio" type="radio" name="newsetindex" value="'.$value['catid'].'" '.($value['caturl'] == $_G['setting']['defaultindex'] ? 'checked="checked"':'').' /></td>'.
		'<td><a href="'.$value['caturl'].'" target="_blank">'.cplang('view').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=edit&catid='.$value['catid'].'">'.cplang('edit').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=move&catid='.$value['catid'].'">'.cplang('portalcategory_move').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=delete&catid='.$value['catid'].'">'.cplang('delete').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=diytemplate&operation=perm&targettplname=portal/list_'.$value['catid'].'&tpldirectory='.getdiydirectory($value['primaltplname']).'">'.cplang('portalcategory_blockperm').'</a></td>
		<td><a href="'.ADMINSCRIPT.'?action=article&operation=list&&catid='.$value['catid'].'">'.cplang('portalcategory_articlemanagement').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=perm&catid='.$value['catid'].'">'.cplang('portalcategory_articleperm').'</a>'.$publish.'</td></tr>';
		for($i=0,$L=count($value['children']); $i<$L; $i++) {
			$return .= showcategoryrow($value['children'][$i], 2, $i==$L-1);
		}
	} else {
		$childrennum = count($_G['cache']['portalcategory'][$key]['children']);
		$toggle = $childrennum > 25 ? ' style="display:none"' : '';
		$return = '<tbody><tr class="hover" id="cat'.$value['catid'].'"><td onclick="toggle_group(\'group_'.$value['catid'].'\')"><a id="a_group_'.$value['catid'].'" href="javascript:;">'.($toggle ? '[+]' : '[-]').'</a></td>'
		.'<td class="td25"><input type="text" class="txt" name="neworder['.$value['catid'].']" value="'.$value['displayorder'].'" /></td><td><div class="parentboard">'.
		'<input type="text" class="txt" name="name['.$value['catid'].']" value="'.$value['catname'].'" />'.
		'</div>'.
		'</td><td>'.$value['articles'].'</td>'.
		'<td>'.(empty($value['disallowpublish']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(!empty($value['allowcomment']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td>'.(empty($value['closed']) ? cplang('yes') : cplang('no')).'</td>'.
		'<td><input class="radio" type="radio" name="newsetindex" value="'.$value['catid'].'" '.($value['caturl'] == $_G['setting']['defaultindex'] ? 'checked="checked"':'').' /></td>'.
		'<td><a href="'.$value['caturl'].'" target="_blank">'.cplang('view').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=edit&catid='.$value['catid'].'">'.cplang('edit').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=move&catid='.$value['catid'].'">'.cplang('portalcategory_move').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=delete&catid='.$value['catid'].'">'.cplang('delete').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=diytemplate&operation=perm&targettplname=portal/list_'.$value['catid'].'&tpldirectory='.getdiydirectory($value['primaltplname']).'">'.cplang('portalcategory_blockperm').'</a></td>
		<td><a href="'.ADMINSCRIPT.'?action=article&operation=list&&catid='.$value['catid'].'">'.cplang('portalcategory_articlemanagement').'</a>&nbsp;
		<a href="'.ADMINSCRIPT.'?action=portalcategory&operation=perm&catid='.$value['catid'].'">'.cplang('portalcategory_articleperm').'</a>'.$publish.'</td></tr></tbody>
		<tbody id="group_'.$value['catid'].'"'.$toggle.'>';
		for($i=0,$L=count($value['children']); $i<$L; $i++) {
			$return .= showcategoryrow($value['children'][$i], 1, '');
		}
		$return .= '</tdoby><tr><td>&nbsp;</td><td colspan="9"><div class="lastboard"><a class="addtr" href="'.ADMINSCRIPT.'?action=portalcategory&operation=add&upid='.$value['catid'].'">'.cplang('portalcategory_addsubcategory').'</a></td></div>';
	}
	return $return;
}

function deleteportalcategory($ids) {
	global $_G;

	if(empty($ids)) return false;
	if(!is_array($ids) && $_G['cache']['portalcategory'][$ids]['upid'] == 0) {
		@require_once libfile('function/delete');
		deletedomain(intval($ids), 'channel');
	}
	if(!is_array($ids)) $ids = array($ids);

	require_once libfile('class/blockpermission');
	require_once libfile('class/portalcategory');
	$tplpermission = & template_permission::instance();
	$templates = array();
	foreach($ids as $id) {
		$templates[] = 'portal/list_'.$id;
		$templates[] = 'portal/view_'.$id;
	}
	$tplpermission->delete_allperm_by_tplname($templates);
	$categorypermission = & portal_category::instance();
	$categorypermission->delete_allperm_by_catid($ids);

	C::t('portal_category')->delete($ids);
	C::t('common_nav')->delete_by_type_identifier(4, $ids);

	$tpls = $defaultindex = array();
	foreach($ids as $id) {
		$defaultindex[] = $_G['cache']['portalcategory'][$id]['caturl'];
		$tpls[] = 'portal/list_'.$id;
		$tpls[] = 'portal/view_'.$id;
	}
	if(in_array($_G['setting']['defaultindex'], $defaultindex)) {
		C::t('common_setting')->update('defaultindex', '');
	}
	C::t('common_diy_data')->delete($tpls, NULL);
	C::t('common_template_block')->delete_by_targettplname($tpls);

}


function makecategoryfile($dir, $catid, $domain) {
	dmkdir(DISCUZ_ROOT.'./'.$dir, 0777, FALSE);
	$portalcategory = getglobal('cache/portalcategory');
	$prepath = str_repeat('../', $portalcategory[$catid]['level']+1);
	if($portalcategory[$catid]['level']) {
		$upid = $portalcategory[$catid]['upid'];
		while($portalcategory[$upid]['upid']) {
			$upid = $portalcategory[$upid]['upid'];
		}
		$domain = $portalcategory[$upid]['domain'];
	}

	$sub_dir = $dir;
	if($sub_dir) {
		$sub_dir = substr($sub_dir, -1, 1) == '/' ? '/'.$sub_dir : '/'.$sub_dir.'/';
	}
	$code = "<?php
chdir('$prepath');
define('SUB_DIR', '$sub_dir');
\$_GET['mod'] = 'list';
\$_GET['catid'] = '$catid';
require_once './portal.php';
?>";
	$r = file_put_contents($dir.'/index.php', $code);
	return $r;
}
function getportalcategoryfulldir($catid) {
	if(empty($catid)) return '';
	$portalcategory = getglobal('cache/portalcategory');
	$curdir = $portalcategory[$catid]['foldername'];
	$curdir = $curdir ? $curdir : '';
	if($catid && empty($curdir)) return FALSE;
	$upid = $portalcategory[$catid]['upid'];
	while($upid) {
		$updir = $portalcategory[$upid]['foldername'];
		if(!empty($updir)) {
			$curdir = $updir.'/'.$curdir;
		} else {
			return FALSE;
		}
		$upid = $portalcategory[$upid]['upid'];
	}
	return $curdir ? $curdir.'/' : '';
}

function delportalcategoryfolder($catid) {
	if(empty($catid)) return FALSE;
	$updatearr = array();
	$portalcategory = getglobal('cache/portalcategory');
	$children = $portalcategory[$catid]['children'];
	if($children) {
		foreach($children as $subcatid) {
			if($portalcategory[$subcatid]['foldername']) {
				$arr = delportalcategorysubfolder($subcatid);
				$updatearr = array_merge($updatearr, $arr);
			}
		}
	}

	$dir = getportalcategoryfulldir($catid);
	if(!empty($dir)) {
		unlink(DISCUZ_ROOT.$dir.'index.html');
		unlink(DISCUZ_ROOT.$dir.'index.php');
		rmdir(DISCUZ_ROOT.$dir);
		$updatearr[] = $catid;
	}
	if(dimplode($updatearr)) {
		C::t('portal_category')->update($updatearr, array('foldername'=>''));
	}
}

function delportalcategorysubfolder($catid) {
	if(empty($catid)) return FALSE;
	$updatearr = array();
	$portalcategory = getglobal('cache/portalcategory');
	$children = $portalcategory[$catid]['children'];
	if($children) {
		foreach($children as $subcatid) {
			if($portalcategory[$subcatid]['foldername']) {
				$arr = delportalcategorysubfolder($subcatid);
				$updatearr = array_merge($updatearr, $arr);
			}
		}
	}

	$dir = getportalcategoryfulldir($catid);
	if(!empty($dir)) {
		unlink(DISCUZ_ROOT.$dir.'index.html');
		unlink(DISCUZ_ROOT.$dir.'index.php');
		rmdir(DISCUZ_ROOT.$dir);
		$updatearr[] = $catid;
	}
	return $updatearr;
}

function remakecategoryfile($categorys) {
	if(is_array($categorys)) {
		$portalcategory = getglobal('cache/portalcategory');
		foreach($categorys as $subcatid) {
			$dir = getportalcategoryfulldir($subcatid);
			makecategoryfile($dir, $subcatid, $portalcategory[$subcatid]['domain']);
			if($portalcategory[$subcatid]['children']) {
				remakecategoryfile($portalcategory[$subcatid]['children']);
			}
		}
	}
}

function showportalprimaltemplate($pritplname, $type) {
	include_once libfile('function/portalcp');
	$tpls = array('./template/default:portal/'.$type=>getprimaltplname('portal/'.$type.'.htm'));
	foreach($alltemplate = C::t('common_template')->range() as $template) {
		if(($dir = dir(DISCUZ_ROOT.$template['directory'].'/portal/'))) {
			while(false !== ($file = $dir->read())) {
				$file = strtolower($file);
				if (fileext($file) == 'htm' && substr($file, 0, strlen($type)+1) == $type.'_') {
					$key = $template['directory'].':portal/'.str_replace('.htm','',$file);
					$tpls[$key] = getprimaltplname($template['directory'].':portal/'.$file);
				}
			}
		}
	}

	foreach($tpls as $key => $value) {
		echo "<input name=signs[$type][".dsign($key)."] value='1' type='hidden' />";
	}

	$pritplvalue = '';
	if(empty($pritplname)) {
		$pritplhide = '';
		$pritplvalue = ' style="display:none;"';
	} else {
		$pritplhide = ' style="display:none;"';
	}
	$catetplselect = '<span'.$pritplhide.'><select id="'.$type.'select" name="'.$type.'primaltplname">';
	$selectedvalue = '';
	if($type == 'view') {
		$catetplselect .= '<option value="">'.cplang('portalcategory_inheritupsetting').'</option>';
	}
	foreach($tpls as $k => $v){
		if($pritplname === $k) {
			$selectedvalue = $k;
			$selected = ' selected';
		} else {
			$selected = '';
		}
		$catetplselect .= '<option value="'.$k.'"'.$selected.'>'.$v.'</option>';
	}
	$pritplophide = !empty($pritplname) ? '' : ' style="display:none;"';
	$catetplselect .= '</select> <a href="javascript:;"'.$pritplophide.' onclick="$(\''.$type.'select\').value=\''.$selectedvalue.'\';$(\''.$type.'select\').parentNode.style.display=\'none\';$(\''.$type.'value\').style.display=\'\';">'.cplang('cancel').'</a></span>';

	if(empty($pritplname)) {
		showsetting('portalcategory_'.$type.'primaltplname', '', '', $catetplselect);
	} else {
		$tplname = getprimaltplname($pritplname.'.htm');
		$html = '<span id="'.$type.'value" '.$pritplvalue.'> '.$tplname.'<a href="javascript:;" onclick="$(\''.$type.'select\').parentNode.style.display=\'\';$(\''.$type.'value\').style.display=\'none\';"> '.cplang('modify').'</a></span>';
		showsetting('portalcategory_'.$type.'primaltplname', '', '', $catetplselect.$html);
	}
}

function remakediytemplate($primaltplname, $targettplname, $diytplname, $olddirectory){
	global $_G;
	if(empty($targettplname)) return false;
	$tpldirectory = '';
	if(strpos($primaltplname, ':') !== false) {
		list($tpldirectory, $primaltplname) = explode(':', $primaltplname);
	}
	$tpldirectory = ($tpldirectory ? $tpldirectory : $_G['cache']['style_default']['tpldir']);
	$newdiydata = C::t('common_diy_data')->fetch($targettplname, $tpldirectory);
	if($newdiydata) {
		return false;
	}
	$diydata = C::t('common_diy_data')->fetch($targettplname, $olddirectory);
	$diycontent = empty($diydata['diycontent']) ? '' : $diydata['diycontent'];
	if($diydata) {
		C::t('common_diy_data')->update($targettplname, $olddirectory, array('primaltplname'=>$primaltplname, 'tpldirectory'=>$tpldirectory));
	} else {
		$diycontent = '';
		if(in_array($primaltplname, array('portal/list', 'portal/view'))) {
			$diydata = C::t('common_diy_data')->fetch($targettplname, $olddirectory);
			$diycontent = empty($diydata['diycontent']) ? '' : $diydata['diycontent'];
		}
		$diyarr = array(
			'targettplname' => $targettplname,
			'tpldirectory' => $tpldirectory,
			'primaltplname' => $primaltplname,
			'diycontent' => $diycontent,
			'name' => $diytplname,
			'uid' => $_G['uid'],
			'username' => $_G['username'],
			'dateline' => TIMESTAMP,
			);
		C::t('common_diy_data')->insert($diyarr);
	}
	if(empty($diycontent)) {
		$file = $tpldirectory.'/'.$primaltplname.'.htm';
		if (!file_exists($file)) {
			$file = './template/default/'.$primaltplname.'.htm';
		}
		$content = @file_get_contents(DISCUZ_ROOT.$file);
		if(!$content) $content = '';
		$content = preg_replace("/\<\!\-\-\[name\](.+?)\[\/name\]\-\-\>/i", '', $content);
		file_put_contents(DISCUZ_ROOT.'./data/diy/'.$tpldirectory.'/'.$targettplname.'.htm', $content);
	} else {
		updatediytemplate($targettplname, $tpldirectory);
	}
	return true;
}

function getparentviewprimaltplname($catid) {
	global $_G;
	$tpl = 'view';
	if(empty($catid)) {
		return $tpl;
	}
	$cat = $_G['cache']['portalcategroy'][$catid];
	if(!empty($cat['upid']['articleprimaltplname'])) {
		$tpl = $cat['upid']['articleprimaltplname'];
	} else {
		$cat = $_G['cache']['portalcategroy'][$cat['upid']];
		if($cat && $cat['articleprimaltplname']) {
			$tpl = $cat['articleprimaltplname'];
		}
	}
	return $tpl;
}
?>
