<?php

class Output_qr
{
    public static function run01($data, $check, $tpl_dir, $tpl_file, $qrfile, $out_file)
    {
		//**************************************************
		//エクセル出力の準備
		//**************************************************
		//バーコードで必要ない手続き
		require_once( APPPATH .'/vendor/image/Barcode2.php');
		$code = new Image_Barcode2();
		
		//列名をエクセル上での名前とマッピングさせる配列を作っておく
		$list_cel = array();
		$list_alpha = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
		foreach ($list_alpha as $k => $v) {
		    foreach ($list_alpha as $k2 => $v2) {
		        $list_cel[] = $k == 0 ? $v2 : $list_alpha[$k-1].$v2;
		    }
		}
			
		//エクセルを作る
		//パッケージを読み込む
		Package::load('excel');

		//テンプレートを読み込む
		$phpexcel = \PHPExcel_IOFactory::load($tpl_dir . $tpl_file);
		
		//カレントシート選択
		$sheet = $phpexcel->getSheetByName('Sheet1');

		//シート名設定
		$sheet->setTitle('sheet name');

		//フォント設定
		$sheet->getDefaultStyle()->getFont()->setName('ＭＳ Ｐゴシック')->setSize(11);
			
		//**************************************************
		//ＱＲコード生成準備。
		//**************************************************
		// load the package
		\Package::load('qrcode');
			
		//**************************************************
		//ＱＲを生成する。
		//**************************************************
		//1行目のA列から書き出し
		$row = 0;
			
		if($check){
			$check_cnt = 1;
			foreach ($data['koujis'] as $v) {
			    $col = 0;
				foreach ($check as $key => $value){
					if ($value == $v['id']){
						foreach ($v as $v2) {
							if($col==1){
								QRcode::png($v2, $tpl_dir . $v2 . $qrfile);
								$draw = new PHPExcel_Worksheet_Drawing();
								$draw->setPath($tpl_dir . $v2 . $qrfile);
								$draw->setResizeProportional(false);
								$draw->setHeight(100);
								$draw->setwidth(100);
								$draw->setWorksheet($sheet);
								$draw->setCoordinates($list_cel[$col].($row+1));
							}
							$col++;
						}
						$row++;
					}
				}
				$check_cnt++;
			}
		}
		else{
			foreach ($data['koujis'] as $v) {
			    $col = 0;
				foreach ($v as $v2) {
					if($col==1){
						QRcode::png($v2, $tpl_dir . $v2 . $qrfile);
						$draw = new PHPExcel_Worksheet_Drawing();
						$draw->setPath($tpl_dir . $v2 . $qrfile);
						$draw->setResizeProportional(false);
						$draw->setHeight(100);
						$draw->setwidth(100);
						$draw->setWorksheet($sheet);
						$draw->setCoordinates($list_cel[$col].($row+1));
					}
					$col++;
				}
				$row++;
			}
		}
			
		//**************************************************
		//	エクセルファイルをファイル保存
		//**************************************************
		//2007形式のファイル保存
		//$writer = \PHPExcel_IOFactory::createWriter($phpexcel,'Excel2007');
		//2003形式のファイル保存
		//$writer = PHPExcel_IOFactory::createWriter($phpexcel, "Excel5");
		//EXCELファイルの作成
		//$writer->save($tpl_dir . $out_file);

		//画像ファイルの削除
		//$fileName = $tpl_dir . "*.png";
		//foreach ( glob($fileName) as $val ) {
		//	unlink($val);
		//}			

		//return;
		
		//**************************************************
		//	エクセルファイルをダウンロード
		//**************************************************
		//EXCELファイルをダウンロード
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment;filename=' . $out_file);
		header('Cache-Control: max-age=0');
		//2007形式のファイル保存
		$writer = \PHPExcel_IOFactory::createWriter($phpexcel,'Excel2007');
		//2003形式のファイル保存
		//$writer = PHPExcel_IOFactory::createWriter($phpexcel, "Excel5");
		$writer->save('php://output');		

		//画像ファイルの削除
		$fileName = $tpl_dir . "*.png";
		foreach ( glob($fileName) as $val ) {
			unlink($val);
		}			
		//
		exit(); //exit();がないと作成されたエクセルファイルを開く際に「読み取れない部分がある」とエラーが表示される。
			
    }
}