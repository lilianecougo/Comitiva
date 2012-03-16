<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Minhas Inscrições'), array('controller' => 'subscriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Eventos'), array('controller' => 'events', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="payments index">
<h2><?php echo __('Meus Pagamentos');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Página %page% de %pages%, mostrando %current% registros de um total de %count%, começando no registro %start%, terminando em %end%')
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('Payment.date', __('Data'));?></th>
	<th><?php echo __('Evento');?></th>
	<th><?php echo $this->Paginator->sort('Payment.amount', __('Valor'));?></th>
	<th><?php echo $this->Paginator->sort('Payment.confirmed', __('Confirmado?'));?></th>
</tr>
<?php
$i = 0;
foreach ($payments as $payment):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Locale->date($payment['Payment']['date']); ?>
		</td>
		<td>
			<?php echo  $payment['Subscription']['Event']['title'] ?>
		</td>
		<td>
			<?php echo $this->Locale->currency($payment['Payment']['amount']); ?>
		</td>
		<td>
			<?php echo ($payment['Payment']['confirmed']?__('Sim'):__('Não')); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('anterior'), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('próxima').' >>', array(), null, array('class' => 'disabled'));?>
</div>
