<?php
/* Smarty version 4.3.1, created on 2024-10-30 05:53:46
  from 'app:frontendcomponentsnavigationMenusdashboardMenuItem.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6721c9eae85d19_78782920',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9be0ecfd9cc66bba6b2c896d74703d29644ffc5' => 
    array (
      0 => 'app:frontendcomponentsnavigationMenusdashboardMenuItem.tpl',
      1 => 1724439626,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6721c9eae85d19_78782920 (Smarty_Internal_Template $_smarty_tpl) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['navigationMenuItem']->value->getLocalizedTitle() ));?>

<span class="task_count">
	<?php echo $_smarty_tpl->tpl_vars['unreadNotificationCount']->value;?>

</span>
<?php }
}
