<?php

class Output_excel
{
    public static function run01($data, $check, $tpl_dir, $tpl_file, $out_file)
    {
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
		//	エクセルファイルに選択されたデータを書き出す。
		//**************************************************
		//2行目のA列から書き出し
		$row = 1;
			
		if($check){
			$check_cnt = 1;
			foreach ($data['koujis'] as $v) {
			    $col = 0;
				foreach ($check as $key => $value){
					if ($value == $v['id']){
						foreach ($v as $v2) {
							$sheet->setCellValue($list_cel[$col].($row+1),$v2);
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
					$sheet->setCellValue($list_cel[$col].($row+1),$v2);
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
		exit(); //exit();がないと作成されたエクセルファイルを開く際に「読み取れない部分がある」とエラーが表示される。

		}
}