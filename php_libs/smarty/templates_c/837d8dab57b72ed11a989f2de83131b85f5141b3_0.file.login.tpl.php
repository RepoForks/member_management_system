<?php
/* Smarty version 3.1.30-dev/66, created on 2016-05-08 15:50:26
  from "/Applications/XAMPP/xamppfiles/htdocs/member_management_system/php_libs/smarty/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/66',
  'unifunc' => 'content_572ee1b293c7e0_22174429',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '837d8dab57b72ed11a989f2de83131b85f5141b3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/member_management_system/php_libs/smarty/templates/login.tpl',
      1 => 1462690222,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_572ee1b293c7e0_22174429 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	</head>
	<body>
		<center>
			<hr size="1" noshade>
			<b><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</b>
			<hr size="1" noshade>
			<table width="100%" border="0" cellspacing="5" cellpadding="5">
				<tr>
					<td width="22%">
						<form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
							<table border="0" cellpadding="0" cellspacing="0" summary="login form" width="100">
								<tr>
									<td colspan="2" bgcolor="#eeeeee">
										<b><font size="2">会員ページ：</font></b>
									</td>
								</tr>
								<br>
								<tr>
									<td nowrap>
										<font size="2"><?php echo $_smarty_tpl->tpl_vars['form']->value['username']['label'];?>
:</font>
									</td>
									<td><?php echo $_smarty_tpl->tpl_vars['form']->value['username']['html'];?>
</td>
								</tr>
								<tr>
									<td nowrap>
										<font size="2"><?php echo $_smarty_tpl->tpl_vars['form']->value['password']['label'];?>
:</font>
									</td>
									<td><?php echo $_smarty_tpl->tpl_vars['form']->value['password']['html'];?>
</td>
								</tr>
								<br>
								<tr>
									<td colspan="2">
										<input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
										<div align="center">
											<?php echo $_smarty_tpl->tpl_vars['form']->value['submit']['html'];?>

										</div>
										<font size="2" color="red">
											<?php echo $_smarty_tpl->tpl_vars['auth_error_mess']->value;?>

										</font>
									</td>
								</tr>
							</table>
						</form>
					</td>
					<td width="78%" align="left" valign="top">
						<p>会員の方はログインしてください。</p>
						<p>
							<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=regist&action=form">
								未登録の方はこちらから登録できます。
							</a>
						</p>
					</td>
				</tr>
			</table>
		</center>
		<?php if (($_smarty_tpl->tpl_vars['debug_str']->value)) {?><pre><?php echo $_smarty_tpl->tpl_vars['debug_str']->value;?>
</pre><?php }?>
	</body>
</html>



<?php }
}
