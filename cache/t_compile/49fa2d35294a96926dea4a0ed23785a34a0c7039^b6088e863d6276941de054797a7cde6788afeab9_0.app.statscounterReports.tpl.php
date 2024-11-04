<?php
/* Smarty version 4.3.1, created on 2024-10-30 05:53:08
  from 'app:statscounterReports.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6721c9c47c9615_27602497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6088e863d6276941de054797a7cde6788afeab9' => 
    array (
      0 => 'app:statscounterReports.tpl',
      1 => 1724439626,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6721c9c47c9615_27602497 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16743365666721c9c47c6078_42990617', "page");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_16743365666721c9c47c6078_42990617 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_16743365666721c9c47c6078_42990617',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<h1 class="app__pageHeading">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.statistics.counterR5Reports"),$_smarty_tpl ) );?>

	</h1>
	<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.statistics.counterR5Reports.description"),$_smarty_tpl ) );?>
</p>
	<?php if (!$_smarty_tpl->tpl_vars['usagePossible']->value) {?>
		<notification class="pkpNotification--backendPage__header" type="warning"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.statistics.counterR5Reports.usageNotPossible"),$_smarty_tpl ) );?>
</notification>
	<?php }?>
	<panel>
		<panel-section>
			<counter-reports-list-panel
				v-bind="components.counterReportsListPanel"
				@set="set"
			/>
		</panel-section>
	</panel>
<?php
}
}
/* {/block "page"} */
}
