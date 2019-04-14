<div class="container">
    <div class="row center-viewport">
        <div class="col align-self-center">
          <div class="row justify-content-center">
				<div class="panel">
					<h3 align="center">Login</h3>
					<?= $this->Form->create(); ?>
					    <?= $this->Form->input('email'); ?>
					    <?= $this->Form->input('password',array('type' => 'password')); ?>
					    <?= $this->Form->submit('Login',array('class'=>'button')); ?>
					<?= $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>			

