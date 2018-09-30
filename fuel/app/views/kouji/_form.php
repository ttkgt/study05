
<!--<?php echo Form::open(array("class"=>"form-horizontal")); ?>-->
<!--
	<fieldset>
		
        <div class="form-group">
			<?php echo Form::label('工事番号', 'kouji_cd', array('class'=>'control-label')); ?>

				<?php echo Form::input('kouji_cd', Input::post('kouji_cd', isset($kouji) ? $kouji->kouji_cd : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Kouji cd')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('工事名称', 'kouji_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('kouji_name', Input::post('kouji_name', isset($kouji) ? $kouji->kouji_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Kouji name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('工事種類', 'kouji_type', array('class'=>'control-label')); ?>
				<?php echo Form::input('kouji_type', Input::post('kouji_type', isset($kouji) ? $kouji->kouji_type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Kouji type')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('工事状態', 'kouji_state', array('class'=>'control-label')); ?>

				<?php echo Form::input('kouji_state', Input::post('kouji_state', isset($kouji) ? $kouji->kouji_state : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Kouji state')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('ＩＰアドレス', 'ip', array('class'=>'control-label')); ?>

				<?php echo Form::input('ip', Input::post('ip', isset($kouji) ? $kouji->ip : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Ip')); ?>

		</div>

        <div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '保存', array('class' => 'btn btn-primary')); ?>
        </div>
	</fieldset>
-->
<?php echo Form::open(array("class"=>"form-inline")); ?>
    <div style="border:thin solid #000000; padding:4px; float:left; margin-bottom:-1px;  margin-right:-1px;">
		<div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::label('工事番号', 'kouji_cd', array('class'=>'control-label')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::input('kouji_cd'   , Input::post('kouji_cd'   , isset($kouji) ? $kouji->kouji_cd    : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Kouji cd')); ?>
				</div>
			</div>
		</div>
		<div>   
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::label('状態　　', 'kouji_state', array('class'=>'control-label')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::input('kouji_state', Input::post('kouji_state', isset($kouji) ? $kouji->kouji_state : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Kouji state')); ?>
				</div>
			</div>
		</div>    
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '保存', array('class' => 'btn btn-primary')); ?>
		</div>
    </div>
    <div style="border:thin solid #000000; float:left; padding:4px;">
		<div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::label('工事番号', 'kouji_cd', array('class'=>'control-label')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::input('kouji_cd'   , Input::post('kouji_cd'   , isset($kouji) ? $kouji->kouji_cd    : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Kouji cd')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::label('工事名称　　', 'kouji_name', array('class'=>'control-label')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::input('kouji_name' , Input::post('kouji_name' , isset($kouji) ? $kouji->kouji_name  : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Kouji name')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::label('工事種類', 'kouji_type', array('class'=>'control-label')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::input('kouji_type' , Input::post('kouji_type' , isset($kouji) ? $kouji->kouji_type  : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Kouji type')); ?>
				</div>
			</div>
		</div>
		<div>   
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::label('状態　　', 'kouji_state', array('class'=>'control-label')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::input('kouji_state', Input::post('kouji_state', isset($kouji) ? $kouji->kouji_state : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Kouji state')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::label('ＩＰアドレス', 'ip', array('class'=>'control-label')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xl-12">
					<?php echo Form::input('ip'         , Input::post('ip'         , isset($kouji) ? $kouji->ip          : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Ip')); ?>
				</div>
			</div>
		</div>    
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '保存', array('class' => 'btn btn-primary')); ?>
		</div>
	</div>
<?php echo Form::close(); ?>
