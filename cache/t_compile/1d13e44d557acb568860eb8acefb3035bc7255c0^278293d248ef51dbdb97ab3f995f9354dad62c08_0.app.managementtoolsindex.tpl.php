<?php
/* Smarty version 4.3.1, created on 2024-10-30 05:52:33
  from 'app:managementtoolsindex.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6721c9a1694d26_46671482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '278293d248ef51dbdb97ab3f995f9354dad62c08' => 
    array (
      0 => 'app:managementtoolsindex.tpl',
      1 => 1724439626,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6721c9a1694d26_46671482 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14162749886721c9a16916c0_22480925', "page");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_14162749886721c9a16916c0_22480925 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_14162749886721c9a16916c0_22480925',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<h1 class="app__pageHeading">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"navigation.tools"),$_smarty_tpl ) );?>

	</h1>

	<?php echo '<script'; ?>
 type="text/javascript">
		// Attach the JS file tab handler.
		$(function() {
			$('#managementTabs').pkpHandler('$.pkp.controllers.TabHandler');
		});
	<?php echo '</script'; ?>
>
	<div id="managementTabs" class="pkp_controllers_tab">
		<ul>
			<li><a name="importexport" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('op'=>"importexport"),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"navigation.tools.importExport"),$_smarty_tpl ) );?>
</a></li>
			<li><a name="permissions" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('op'=>"permissions"),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"settings.libraryFiles.category.permissions"),$_smarty_tpl ) );?>
</a></li>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Templates::Management::Settings::tools"),$_smarty_tpl ) );?>

		</ul>
	</div>
<?php
}
}
/* {/block "page"} */
}
