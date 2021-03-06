<?php if (!defined('THINK_PATH')) exit();?><!--top 部分-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>零境考勤系统</title>
    <link href="/ljCheck/Public/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/ljCheck/Public/css/select.css" rel="stylesheet" type="text/css"/>
    <link href="/ljCheck/Public/css/common.css" rel="stylesheet" type="text/css"/>
</head>

<body style="background:url(/ljCheck/Public/images/topbg.gif) repeat-x;">

<div id="top" style="height: 80px;position: relative;">
    <div class="topleft">
        <a href="/ljCheck/index.php/Staff/index" target="_parent">
            <!--<img src="/ljCheck/Public/images/logo.png" title="系统首页"/>-->
        </a>
    </div>
    <div class="topright">
        <ul>
            <li><span><img src="/ljCheck/Public/images/help.png" title="帮助" class="helpimg"/></span>
                <a href="javascript:;" class="help">帮助</a>
            </li>
            <li><a href="javascript:;" class="about">关于</a></li>
            <li><a href="/ljCheck/index.php/Login/loginOut" target="_parent">退出</a></li>
        </ul>
        <div class="user">
            <span><?php echo ($_SESSION['username']); ?></span>
        </div>
    </div>
</div>

<div class="lefttop" style="clear: both;"><span></span></div>
<!--左边导航栏-->

<div id="left" style="width: 15%; position: absolute; overflow: hidden;">
    <dl class="leftmenu">
        <dd>
            <div class="title">
                <span><img src="/ljCheck/Public/images/leftico01.png"/></span>员工信息管理
            </div>
            <ul class="menuson">
                <!--<li class="active"><cite></cite><a href="/ljCheck/index.php/Staff/welcome" target="rightFrame">欢迎页</a><i></i></li>-->
                <li <?php if($c_a == 'Staff_staffList' ): ?>class='active'<?php endif; ?> ><cite></cite><a href="<?php echo U('Staff/staffList');?>" >员工列表</a><i></i></li>

                <li <?php if($c_a == 'Staff_addStaff' ): ?>class='active'<?php endif; ?> ><cite></cite><a href="<?php echo U('Staff/addStaff');?>" >添加员工</a><i></i></li>
            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/ljCheck/Public/images/leftico02.png"/></span>考勤统计
            </div>
            <ul class="menuson">
                <li <?php if($c_a == 'Check_upload' ): ?>class='active'<?php endif; ?> ><cite></cite><a href=" <?php echo U('Check/upload');?>" >上传考勤数据</a><i></i></li>
                <li <?php if($c_a == 'Check_signList' ): ?>class='active'<?php endif; ?> ><cite></cite><a href=" <?php echo U('Check/signList');?>" >打卡数据</a><i></i></li>
                <li <?php if($c_a == 'Check_signDetailList' ): ?>class='active'<?php endif; ?> ><cite></cite><a href=" <?php echo U('Check/signDetailList');?>" >打卡详细</a><i></i></li>
                <li <?php if($c_a == 'Check_repSignList' ): ?>class='active'<?php endif; ?> ><cite></cite><a href=" <?php echo U('Check/repSignList');?>" >补签数据</a><i></i></li>
                <li <?php if($c_a == 'Check_overWorkList' ): ?>class='active'<?php endif; ?> ><cite></cite><a href=" <?php echo U('Check/overWorkList');?>" >加班数据</a><i></i></li>
                <li <?php if($c_a == 'Check_leaveList' ): ?>class='active'<?php endif; ?> ><cite></cite><a href=" <?php echo U('Check/leaveList');?>" >请假数据</a><i></i></li>
                <li <?php if($c_a == 'Check_checkList' ): ?>class='active'<?php endif; ?> ><cite></cite><a href=" <?php echo U('Check/checkList');?>" >考勤列表</a><i></i></li>
                <li <?php if($c_a == 'Check_checkAnalyse' ): ?>class='active'<?php endif; ?> ><cite></cite><a href=" <?php echo U('Check/checkAnalyse');?>" >考勤分析</a><i></i></li>
            </ul>
        </dd>

        <dd>
            <div class="title"><span><img src="/ljCheck/Public/images/leftico03.png"/></span>用户管理</div>
            <ul class="menuson">
                <li <?php if($c_a == 'User_userList' ): ?>class='active'<?php endif; ?> ><cite></cite><a href="<?php echo U('User/userList');?>">用户列表</a><i></i></li>
                <!--<li><cite></cite><a href="<?php echo U('User/addUser');?>">注册用户</a><i></i></li>-->
            </ul>
        </dd>
    </dl>
</div>


<!--main部分-->
<div id="staffList" style="width: 85%;float: left;padding-left: 15%";>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="<?php echo U('Staff/staffList');?>">员工信息管理</a></li>
            <li><a href="<?php echo U('Staff/staffList');?>">员工列表</a></li>
        </ul>
    </div>

    <div class="formbody">
        <ul class="seachform">
            <li><label>姓名</label><input id="name" type="text" class="scinput" value="<?php echo ($name); ?>"/></li>
            <li><label>部门</label>
                <div class="vocation">
                    <select class="select3" id="department">
                        <option><?php echo ($department); ?></option>
                        <option>全部</option>
                        <option>零境</option>
                        <option>思炫</option>
                        <option>合推</option>
                        <option>灵域</option>
                    </select>
                </div>
            </li>

            <li><label>&nbsp;</label><input id="staffList_btn_search" type="button" class="scbtn" value="查询"/></li>

        </ul>

        <table class="tablelist">
            <thead>
            <tr>
                <th>工号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>部门</th>
                <th>年假</th>
                <th>积分</th>
                <th>入职日期</th>
                <th>联系电话</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["staff_id"]); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td>
                        <?php if($vo["gender"] == 0 ): ?><span>女</span><?php endif; ?>
                        <?php if($vo["gender"] == 1 ): ?><span>男</span><?php endif; ?>
                    </td>
                    <td><?php echo ($vo["department"]); ?></td>
                    <td><?php echo ($vo["annul_holidays"]); ?></td>
                    <td><?php echo ($vo["points"]); ?></td>
                    <td><?php echo ($vo["entry_date"]); ?></td>
                    <td><?php echo ($vo["telephone"]); ?></td>
                    <td><?php echo ($vo["update_time"]); ?></td>
                    <td><a href="/ljCheck/index.php/Staff/updateStaff?id=<?php echo ($vo["id"]); ?>&page=<?php echo ($page); ?>" class="tablelink">修改</a>
                        <a href="/ljCheck/index.php/Staff/deleteStaff?id=<?php echo ($vo["id"]); ?>" class="tablelink"> 删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <input id="staffList_pageNum" style="display: none" value="<?php echo ($pageNum); ?>"/>
        <div class="pagination" id="page_staffList"></div>
     </div>
    </div>
    <!--页脚-->
    <div class="loginbm">版权所有  2009-2016  上海零境网络科技有限公司</div>
</body>
<script src="/ljCheck/Public/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/ljCheck/Public/js/select-ui.min.js"></script>
<script type="text/javascript" src="/ljCheck/Public/plugins/My97/WdatePicker.js"></script>
<script src="/ljCheck/Public/plugins/layer/layer.js" type="text/javascript"></script>
<script src="/ljCheck/Public/plugins/laypage/laypage.js" type="text/javascript"></script>
<!--<script src="/ljCheck/Public/plugins/laydate/laydate.js" type="text/javascript"></script>-->
<script src="/ljCheck/Public/plugins/echarts.min.js" type="text/javascript"></script>
<!--<script src="/ljCheck/Public/plugins/jqueryValidate/jquery.validate.min.js" type="text/javascript"></script>-->
<!--<script src="/ljCheck/Public/plugins/jqueryValidate/messages_zh.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="/ljCheck/Public/js/common.js"></script>
</html>
    <script>
        laypage({
            cont: 'page_staffList',
            pages: $('#staffList_pageNum').val(), //可以叫服务端把总页数放在某一个隐藏域，再获取。假设我们获取到的是18
            curr: function () { //通过url获取当前页，也可以同上（pages）方式获取
                var page = location.search.match(/page=(\d+)/);
                return page ? page[1] : 1;
            }(),
            jump: function (e, first) { //触发分页后的回调
                var name = $('#name').val();
                var department = $('#department').val();
                if (!first) { //一定要加此判断，否则初始时会无限刷新
                    location.href = 'staffList?page=' + e.curr + '&name=' + name + '&department=' + department;
                }
            }
        });
    </script>