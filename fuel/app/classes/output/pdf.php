<?php

class Output_pdf
{
    public static function run01($data, $check, $tpl_dir, $out_pdffile)
    {
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
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // 自動ページ切り替えを設定する
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // カラム幅 180
        $w = array(50, 80, 50);

        // 塗りつぶし色
        $pdf->SetFillColor(224, 235, 255);
        $pdf->SetTextColor(0, 0, 0);

        // フォントセット
        $pdf->SetFont('ystegakib', '', '12');
        //$pdf->SetFont('c39hrp48dhtt', '', '12');

        // 固定長フォント設定
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // 1ページ目を準備
        $pdf->AddPage();

        $pdf->Cell($w[0], 7, '項目1', 'LRTB', 0, 'L', 1);
        $pdf->Cell($w[1], 7, '項目2', 'LRTB', 0, 'L', 1);
        $pdf->Cell($w[2], 7, '項目3', 'LRTB', 0, 'L', 1);
        $pdf->Ln();

		//**************************************************
		//	ＰＤＦファイルに選択されたデータを書き出す。
		//**************************************************
		$row = 1;
		if($check){
			$check_cnt = 1;
			foreach ($data['koujis'] as $v) {
				foreach ($check as $key => $value){
					if ($value == $v['id']){
						$pdf->Cell($w[0], 6, $v['id'], 'LR', 0, 'L', $row);
						$pdf->Cell($w[1], 6, $v['kouji_cd'], 'LR', 0, 'L', $row);
						$pdf->Cell($w[2], 6, $v['kouji_name'], 'LR', 0, 'L', $row);
						$pdf->Ln();
						$row++;
					}
				}
				$check_cnt++;
			}
		}
		else{
			foreach ($data['koujis'] as $v) {
				$pdf->Cell($w[0], 6, $v['id'], 'LR', 0, 'L', $row);
				$pdf->Cell($w[1], 6, $v['kouji_cd'], 'LR', 0, 'L', $row);
				$pdf->Cell($w[2], 6, $v['kouji_name'], 'LR', 0, 'L', $row);
				$pdf->Ln();
				$row++;
			}
		}
		
        // 区切り
        $pdf->Cell($w[0], 6, '', 'LRB', 0, 'L', $row);
        $pdf->Cell($w[1], 6, '', 'LRB', 0, 'L', $row);
        $pdf->Cell($w[2], 6, '', 'LRB', 0, 'L', $row);
        $pdf->Ln();

        // トータル
        $pdf->Cell($w[0], 6, '', 'LRT', 0, 'L', 1);
        $pdf->Cell($w[1], 6, '単価', 'LRT', 0, 'R', 1);
        $pdf->Cell($w[2], 6, '***円', 'LRT', 0, 'C', 1);
        $pdf->Ln();

        // 数
        $pdf->Cell($w[0], 6, '', 'LR', 0, 'L', 1);
        $pdf->Cell($w[1], 6, '件数', 'LR', 0, 'R', 1);
        $pdf->Cell($w[2], 6, '***件', 'LR', 0, 'C', 1);
        $pdf->Ln();//改行

        // 合計
        $pdf->Cell($w[0], 6, '', 'LR', 0, 'L', 1);
        $pdf->Cell($w[1], 6, '合計', 'LR', 0, 'R', 1);
        $pdf->Cell($w[2], 6, '***円 (税抜)', 'LR', 0, 'C', 1);
        $pdf->Ln();//改行

        // 合計
        $pdf->Cell($w[0], 6, '', 'LRB', 0, 'L', 1);
        $pdf->Cell($w[1], 6, '合計', 'LRB', 0, 'R', 1);
        $pdf->Cell($w[2], 6, '***円 (税込)', 'LRB', 0, 'C', 1);

        // 出力
		//出力先　I:ブラウザ　F:ファイル D:ダウンロード
        $pdf->Output("output.pdf", "I");
        //$pdf->Output($tpl_dir . $out_pdffile, "F");
        //$pdf->Output("output.pdf", "D");

        //return;
    }
}