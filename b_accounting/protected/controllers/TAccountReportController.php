<?php

class TAccountReportController extends Controller
{
	public $layout='//layouts/column1';

	public function filters()
	{
		return array(
				'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
				array('allow',
						//'users'=>array('@'),
						'users'=>sUser::getAccess('31'),
				),
				array('deny',
						'users'=>array('*'),
				),
		);
	}

	public function actionIndex()
	{
		$model=new fReport;
	
		if(isset($_POST['fReport']))
		{
			$model->attributes=$_POST['fReport'];
			if($model->validate()) {

				$modelReport=tAccountReport::model()->findByPk((int)$model->report_id);

				$pdf=new $modelReport->link('P','mm','A4');
				//$pdf=new profitlost1('P','mm','A4');
				//$pdf=new balanceSheet1('P','mm','A4');
		
				$pdf->AliasNbPages();
				$pdf->AddPage();
				$pdf->SetFont('Arial','',12);
				$pdf->report($model->periode_date,$model->report_id);

			$pdf->Output();
							
			}
		}

		$this->render('index',array('model'=>$model));	
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='t-account-report-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}