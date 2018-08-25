<div id="app">
    <gerenciador-tarefas/>
</div>
<?php echo $this->Html->script('vue.js', array('block'=> 'scriptBottom')); ?>
<?php echo $this->Html->script('axios.js', array('block'=> 'scriptBottom')); ?>
<?php echo $this->Html->script('//unpkg.com/babel-polyfill@latest/dist/polyfill.min.js', array('block'=> 'scriptBottom')); ?>
<?php echo $this->Html->script('//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js', array('block'=> 'scriptBottom')); ?>


<?php echo $this->Html->script('tarefa.js', array('block'=> 'scriptBottom')); ?>
<?php echo $this->Html->script('gerenciador-tarefas.js', array('block'=> 'scriptBottom')); ?>
<?php echo $this->Html->script('app.js', array('block'=> 'scriptBottom')); ?>
