<?php
defined('_JEXEC') or die;

JHtml::_('bootstrap.framework');

?>


<?php echo $this->table; ?>

<a href="<?php echo JRoute::_('index.php?option=com_polartour&view=tournament&layout=edit&id='.(int) $this->Item['tournament']['id']); ?>">Rediger</a>
