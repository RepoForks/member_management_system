<html>
	<head>
		<title>{$title}</title>
	</head>
	<body>
		<center>
			<hr size="1" noshade>
			<b>{$title}</b>
			<hr size="1" noshade>
			<table width="100%" border="0" cellspacing="5" cellpadding="5">
				<tr>
					<td width="22%" align="left" valign="top">
						[ <a href="{$SCRIPT_NAME">トップページへ</a> ]
						<br><br>
						{$disp_login_state}
					</td>
					<td width="78%" align="left" valign="top">
						<p>
							[ <a href="{$SCRIPT_NAME}?type=regist&action=form{$add_pageID}">新規登録</a> ]
							<br>
							<form {$form.attributes}>
								名前：<input type="text" name="search_key" value="{$search_key}">
								<input type="submit" name="submit" vlaue="検索する">
								<input type="hidden" name="type" value="list">
								<input type="hidden" name="action" value="form">
							</form>
							検索結果は{$count}件です。
							<br><br>
							{$links}
							{if ($data) }
								<table width="100%" border="1" cellspacing="0" cellpadding="8">
									<tbody>
										<tr>
											<th>番号</th><th>氏</th><th>名</th><th>生年月日</th><th>県名</th><th>登録日</th><th> </th><th> </th>
										</tr>
										{foreach item=item from=$data}
											<tr>
												<td align="center">{$item.id}</td>
												<td>{$item.last_name|escape:"html"}</td>
												<td>{$item.first_name|escape:"html"}</td>
												<td align="center">
													{$item.birthday|strtotime|date_format:"%Y年%m月%d日"}
												</td>
												<td align="center">
													{$item.prefecture}
												</td>
												<td align="center">
													{$item.reg_date|date_format:"%Y年%m月%d日"}
												</td>
												<td align="center">
													[ <a href="{$SCRIPT_NAME}?type=modify&action=form&id={$item.id}{add_pageID}">更新</a> ]
												</td>
												<td align="center">
													[ <a href="{$SCRIPT_NAME}?type=delete&action=form&id={$item.id}{add_pageID}">削除</a> ]
												</td>
											</tr>
										{/foreach}
									</tbody>
								</table>
							{/if}
						</p>
					</td>
				</tr>
			</table>
		</center>
		{if ($debug_str)}<pre>{$debug_str}</pre>{/if}
	</body>
</html>

										



