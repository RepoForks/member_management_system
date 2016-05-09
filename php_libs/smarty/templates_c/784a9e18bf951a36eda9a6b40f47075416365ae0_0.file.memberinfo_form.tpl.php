<?php
/* Smarty version 3.1.30-dev/66, created on 2016-05-08 15:56:11
  from "/Applications/XAMPP/xamppfiles/htdocs/member_management_system/php_libs/smarty/templates/memberinfo_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/66',
  'unifunc' => 'content_572ee30b1d4885_82314913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '784a9e18bf951a36eda9a6b40f47075416365ae0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/member_management_system/php_libs/smarty/templates/memberinfo_form.tpl',
      1 => 1462690569,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_572ee30b1d4885_82314913 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	</head>
	<body bgcolor="#ffffff">
		<center>
			<hr size="1" noshade>
			<b><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</b>
			<hr size="1" noshade>
			<table width="100%" border="0" cellspacing="5" cellpadding="5">
				<tr>
					<td width="22%" align="left" valign="top">
						[ <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
">トップページへ</a> ]
					<?php if (($_smarty_tpl->tpl_vars['is_system']->value)) {?>
						<br><br>
						[ <a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?type=list&action=form<?php echo $_smarty_tpl->tpl_vars['add_pageID']->value;?>
">会員一覧</a> ]
					<?php }?>
						<br><br>
						<?php echo $_smarty_tpl->tpl_vars['disp_login_state']->value;?>

					</td>
					<td width="78%" align="left" valign="top">
						<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

						<form <?php echo $_smarty_tpl->tpl_vars['form']->value['attributes'];?>
>
							<table width="95%" border="0" cellspacing="5" cellpadding="0">
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2"><?php echo $_smarty_tpl->tpl_vars['form']->value['username']['label'];?>
：</font>
									</td>
									<td width="79%">
									<?php if ($_smarty_tpl->tpl_vars['form']->value['username']['error']) {?>
										<font size="2" color="red"><?php echo $_smarty_tpl->tpl_vars['form']->value['username']['error'];?>
</font>
										<br>
									<?php }?>
										<?php echo $_smarty_tpl->tpl_vars['form']->value['username']['html'];?>

									</td>
								</tr>
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2">
											<?php echo $_smarty_tpl->tpl_vars['form']->value['password']['label'];?>
:
										</font>
									</td>
									<td width="79%">
									<?php if ($_smarty_tpl->tpl_vars['form']->value['password']['error']) {?>
										<font size="2" color="red">
											<?php echo $_smarty_tpl->tpl_vars['form']->value['password']['error'];?>

										</font>
										<br>
									<?php }?>
										<?php echo $_smarty_tpl->tpl_vars['form']->value['password']['html'];?>

									</td>
								</tr>
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2">
											<?php echo $_smarty_tpl->tpl_vars['form']->value['last_name']['label'];?>
:
										</font>
									</td>
									<td width="79%">
									<?php if ($_smarty_tpl->tpl_vars['form']->value['last_name']['error']) {?>
										<font size="2" color="red">
											<?php echo $_smarty_tpl->tpl_vars['form']->value['password']['error'];?>

										</font>
										<br>
									<?php }?>
										<?php echo $_smarty_tpl->tpl_vars['form']->value['last_name']['html'];?>

									</td>
								</tr>
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2">
											<?php echo $_smarty_tpl->tpl_vars['form']->value['first_name']['label'];?>
:
										</font>
									</td>
									<td width="79%">
									<?php if ($_smarty_tpl->tpl_vars['form']->value['first_name']['error']) {?>
										<font size="2" color="red">
											<?php echo $_smarty_tpl->tpl_vars['form']->value['first_name']['error'];?>

										</font>
										<br>
									<?php }?>
										<?php echo $_smarty_tpl->tpl_vars['form']->value['first_name']['html'];?>

									</td>
								</tr>
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2">
											<?php echo $_smarty_tpl->tpl_vars['form']->value['birthday']['label'];?>
:
										</font>
									</td>
									<td width="79%">
									<?php if ($_smarty_tpl->tpl_vars['form']->value['birthday']['error']) {?>
										<font size="2" color="red">
											<?php echo $_smarty_tpl->tpl_vars['form']->value['birthday']['error'];?>

										</font>
										<br>
									<?php }?>
										<?php echo $_smarty_tpl->tpl_vars['form']->value['birthday']['html'];?>

									</td>
								</tr>
								<tr valign="top">
									<td nowrap align="right" width="150">
										<font size="2">
											<?php echo $_smarty_tpl->tpl_vars['form']->value['prefecture']['label'];?>
:
										</font>
									</td>
									<td width="79%">
									<?php if ($_smarty_tpl->tpl_vars['form']->value['password']['error']) {?>
										<font size="2" color="red">
											<?php echo $_smarty_tpl->tpl_vars['form']->value['prefecture']['error'];?>

										</font>
										<br>
									<?php }?>
										<?php echo $_smarty_tpl->tpl_vars['form']->value['prefecture']['html'];?>

									</td>
								</tr>
								<tr align="center" valign="top">
									<td>&nbsp;</td>
									<td align="left">
									<?php if (($_smarty_tpl->tpl_vars['form']->value['neg_submit']['value'] != '')) {?>
										<?php echo $_smarty_tpl->tpl_vars['form']->value['neg_submit']['html'];?>

									<?php } else { ?>
										<?php echo $_smarty_tpl->tpl_vars['form']->value['reset']['html'];?>

									<?php }?>
									<?php echo $_smarty_tpl->tpl_vars['form']->value['pos_submit']['html'];?>

										<input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
										<input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
		</center>
		<?php if (($_smarty_tpl->tpl_vars['debug_str']->value)) {?><pre><?php echo $_smarty_tpl->tpl_vars['debug_str']->value;?>
</pre><?php }?>
	</body>
</html><?php }
}
