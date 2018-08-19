<?php

class Output_barpdf
{
	public static function run01($data, $check, $tpl_dir, $tpl_file, $barcodefile, $out_file)
    {
		//**************************************************
		//バーコード生成準備。
		//**************************************************
		require_once( APPPATH .'/vendor/image/Barcode2.php');
		$code = new Image_Barcode2();

		//**************************************************
		//ＰＤＦ生成準備。
		//**************************************************
		// PDF オブジェクト準備
        $pdf = \Pdf\Pdf::forge('tcpdf')->init('P', 'mm', 'A4', true, 'UTF-8', false);

        //PDF付加情報
        $pdf->SetCreator('制作');
        $pdf->SetAuthor('作者');
        $pdf->SetTitle('タイトル');
        $pdf->SetSubject('タイトル2');

        //ヘッダーフッター情報
        $pdf->setHeaderFont(Array('ystegakib', '', 14));
        $pdf->setFooterFont(Array('ystegakib', '', 9));
        $pdf->SetHeaderData('', '','大見出し', 'サブ見出し');

        // マージンを設定する
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER); //ヘッダーの表示
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER); //フッターの表示
		
        // 自動ページ切り替えを設定する
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // カラム幅 180
        $w = array(60, 60, 60);

        // 塗りつぶし色
        $pdf->SetFillColor(224, 235, 255);
        $pdf->SetTextColor(0, 0, 0);

        // フォントセット
        $pdf->SetFont('ystegakib', '', '12');

        // 固定長フォント設定
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // 1ページ目を準備
        $pdf->AddPage();

//        $pdf->Cell($w[0], 7, '項目1', 'LRTB', 0, 'L', 1);
//        $pdf->Cell($w[1], 7, '項目2', 'LRTB', 0, 'L', 1);
//        $pdf->Cell($w[2], 7, '項目3', 'LRTB', 0, 'L', 1);
//        $pdf->Ln();

		//**************************************************
		//バーコードを生成する。
		//**************************************************
		$datacnt = 1;
		$datacnt_page = 1;
		$xcnt = 1;
		$ycnt = 1;
		$pdf->SetLineStyle(array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 4, 'color' => array(0, 0, 0)));
			
		if($check){
			//$check_cnt = 1;
			foreach ($data['koujis'] as $v) {
			    $col = 0;
				foreach ($check as $key => $value){
					if ($value == $v['id']){
						foreach ($v as $v2) {
							if($col==1){
								$x = 20 + ($xcnt -1) * 60;
								$y = 27 + ($ycnt -1) * 26;
								$w = 50;
								$h = 20;
								$img = $code->draw($v2, 'code39', 'png', false); 
								imagepng($img, $tpl_dir . $v2 . $barcodefile);
						        $pdf->Image($tpl_dir . $v2 . $barcodefile, $x, $y, $w, $h, 'png');

								//上罫線を引く								
								if($datacnt_page == 28){
									$pdf->line($x - 5, 23, $x + 55, 23);
								}
								else{
									$pdf->line($x - 5, $y - 4, $x + 55, $y - 4);
								}
	
								//下罫線を引く
								if($datacnt_page != 28){
									$pdf->line($x - 5, $y + 22, $x + 55, $y + 22);
								}	
								
								//左罫線を引く
								if($datacnt_page != 28){
									if($xcnt == 2 && $ycnt == 1){
										//2ページ目移行の1行目の最左罫線を引く
										$pdf->line(15    , $y - 3, 15    , 23 + ($ycnt) * 26);
										$pdf->line($x - 5, $y - 3, $x - 5, 23 + ($ycnt) * 26);
									}
									else{
										$pdf->line($x - 5, $y - 3, $x - 5, 23 + ($ycnt) * 26);
									}
								}

								//右罫線を引く
								if($datacnt_page != 28){
									$pdf->line($x + 55, $y - 3, $x + 55, 23 + ($ycnt) * 26);
								}	
				
								$xcnt++; //出力列加算
									
								if($datacnt %3 == 0){
									$xcnt = 1;
									$ycnt++; //出力行加算
								}
								if($datacnt_page %28 == 0){
									$ycnt = 1;
									$datacnt_page = 1;
								}
				
								$datacnt++; //出力データ件数加算
								$datacnt_page++; //ページ内出力データ件数加算
								
								} //工事番号の時の閉じる
							$col++;
						} //DATAの項目を繰り返すの閉じる
					} //CHECKBOXされたIDと等しい時の閉じる
				} //CHECKBOXされたIDの閉じる
//				if($datacnt %27 == 0){
//					$xcnt = 1;
//					$ycnt = 1;
//				}
			} //DATAの読み込みの閉じる

			//最後の下線を引く
//			$pdf->line(15, $y + 23, $x + 55, $y + 23);
			
		} //CHECKがあるの閉じる
		else{
			foreach ($data['koujis'] as $v) {
			    $col = 0;
				foreach ($v as $v2) {
					if($col==1){
						$x = 20 + ($xcnt -1) * 60;
						$y = 27 + ($ycnt -1) * 26;
						$w = 50;
						$h = 20;
						$img = $code->draw($v2, 'code39', 'png', false); 
						imagepng($img, $tpl_dir . $v2 . $barcodefile);
				        $pdf->Image($tpl_dir . $v2 . $barcodefile, $x, $y, $w, $h, 'png');

						//上罫線を引く								
						if($datacnt_page == 28){
							$pdf->line($x - 5, 23, $x + 55, 23);
						}
						else{
							$pdf->line($x - 5, $y - 4, $x + 55, $y - 4);
						}

						//下罫線を引く
						if($datacnt_page != 28){
							$pdf->line($x - 5, $y + 22, $x + 55, $y + 22);
						}	
								
						//左罫線を引く
						if($datacnt_page != 28){
							if($xcnt == 2 && $ycnt == 1){
								//2ページ目移行の1行目の最左罫線を引く
								$pdf->line(15    , $y - 3, 15    , 23 + ($ycnt) * 26);
								$pdf->line($x - 5, $y - 3, $x - 5, 23 + ($ycnt) * 26);
							}
							else{
								$pdf->line($x - 5, $y - 3, $x - 5, 23 + ($ycnt) * 26);
							}
						}

						//右罫線を引く
						if($datacnt_page != 28){
							$pdf->line($x + 55, $y - 3, $x + 55, 23 + ($ycnt) * 26);
						}	

						$xcnt++; //出力列加算
						
						if($datacnt %3 == 0){
							$xcnt = 1;
							$ycnt++; //出力行加算
						}
						if($datacnt_page %28 == 0){
							$ycnt = 1;
							$datacnt_page = 1;
						}
				
						$datacnt++; //出力データ件数加算
						$datacnt_page++; //ページ内出力データ件数加算
					}
					$col++;
				}
			}
		}

		//画像ファイルの削除
		$fileName = $tpl_dir . "*.png";
		foreach ( glob($fileName) as $val ) {
			unlink($val);
		}
		
        $pdf->Output("output.pdf", "I");
		
	}
}	
