<div>
   <label><?php echo elgg_echo("title"); ?></label><br />
   <?php echo elgg_view('input/text',array('name' => 'title')); ?>
</div>
 
<div>
   <label><?php echo elgg_echo("crowdraiser:goal"); ?></label><br />
   <?php echo elgg_view('input/text',array('name' => 'crowdraiser:goal')); ?>
</div>
 
<div>
   <label><?php echo elgg_echo("description"); ?></label><br />
   <?php echo elgg_view('input/longtext',array('name' => 'description')); ?>
</div>
 
<div>
   <?php echo elgg_view('input/submit', array('value' => elgg_echo('save')));?>
</div>
