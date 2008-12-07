<?php /* SVN FILE: $Id: todo.ctp 707 2008-11-19 12:18:03Z AD7six $ */ ?>
<div class="nodes view">
<div class="summary">
<?php
$i18n = I18n::getInstance();
if (file_exists(APP . 'locale' . DS . $i18n->l10n->locale . DS . 'LC_MESSAGES' . DS . 'default.po')) {
	echo '<p class="note">' . sprintf(__('Want to check or update the <a href="%s">po file</a> for %s?', true),
		'http://thechaw.com/cakebook/browser/locale/' . $i18n->l10n->locale . '/LC_MESSAGES/default.po', $i18n->l10n->language) . '</p>';
} else {
	echo '<p class="warning">' . sprintf(__('These is no <a href="%s">po file</a> for %s', true),
		'http://thechaw.com/cakebook/browser/locale/eng/LC_MESSAGES/default.po', $i18n->l10n->language) . '</p>';
}
echo __('These sections either do not have a translation, or the English text has changed since it was translated') . '</p>';
?>
</div>
<?php
foreach ($data as $id => $row) {
	extract ($row);
	$sequence = $Node['sequence'];
	$sequence = $sequence?$sequence:'#';
	echo "<h2 id=\"{$Revision['slug']}-{$Node['id']}\">" .
		$html->link($sequence, array('action' => 'view', $Node['id'], $Revision['slug'])) . ' ' . htmlspecialchars($Revision['title']) . "</h2>";

	echo '<div class="options">';
		echo $this->element('node_options', array('data' => $row));
	echo '</div>';
}
?>
</div>
<?php echo $this->element('paging');