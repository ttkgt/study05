<?php
//=============================================================================
// テンプレートPDFを読み込み、その上に日本語を書き込むサンプル。
//      
// tcpdf/config/tcpdf_config.phpで
// define('K_THAI_TOPCHARS', true);
// をfalseに書き換えておくと速度が向上する。
// http://www.tcpdf.org/performances.php
//=============================================================================


ini_set('display_errors', 1);
error_reporting(E_ALL);

$LIB_DIR = './';
require_once($LIB_DIR . 'tcpdf/tcpdf.php');
require_once($LIB_DIR . 'fpdi/fpdi.php');

/**
 * TCPDF＋FPDIを簡単に使えるようにするためのクラス
 */
class MyPDF extends FPDI {
    protected $templates;       // 読み込んだテンプレートのリスト

	/**
	 * 好みの設定を行う
	 */
	function myInit() {
        $this->SetMargins(0, 0, 0);		// 用紙の余白を設定
        $this->SetCellPadding(0);		// セルのパディングを設定
        $this->SetAutoPageBreak(false);	// 自動改ページ
           
		$this->setDisplayMode('default');	// ズーム設定
        $this->setPrintHeader(false);	// ヘッダを使用しない
        $this->setPrintFooter(false);	// フッタを使用しない
	}
        
    /** 
     * テンプレートPDFファイルをロードする。
	 *
	 * @param string	$filepath	PDFファイルのパス
     */
    function myLoadTemplate($filepath) {
        $page_count = $this->setSourceFile($filepath);
        $template_id = array();
        for ($i = 0; $i < $page_count; $i++) {
            $template_id[] = $this->importPage($i + 1);
        }
        $this->templates = array(
            $filepath => array(
                'page_count'    => $page_count,
                'template_id'   => $template_id,
            )
        );
    }   
        
    /** 
     * 指定したPDFファイルの指定したページをテンプレートとして使用する。
     *  
     * @param string    $filepath   PDFファイルのパス
     * @param int       $page       ページ番号（1から）
     */ 
    function myUseTemplate($filepath, $page) {
        if (!isset($this->templates[$filepath])) {
            $this->myLoadTemplate($filepath);
        }

		if (1 <= $page && $page <= $this->templates[$filepath]['page_count']) {
			$this->useTemplate($this->templates[$filepath]['template_id'][$page - 1]);
		}
		else {
			throw new Exception('PDF template not found');
		}
    }

	/**
	 * 日本語ファイル名でダウンロードさせるためのエスケープを行う
	 *
	 * 参考：
	 * http://fgin.seesaa.net/article/30073826.html
	 */
	function escapeFilename($filename) {
		$user_agent = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($user_agent, 'MSIE') !== false) {
            // 生SJIS
            $ret = mb_convert_encoding($filename, 'CP932', 'UTF-8');
        }
		elseif (strpos($user_agent, 'Firefox') !== false) {
            // base64
            $ret = '=?UTF-8?B?' . base64_encode($filename) . '?=';
        }
		elseif (strpos($user_agent, 'Chrome') !== false) {
            // base64
            $ret = '=?UTF-8?B?' . base64_encode($filename) . '?=';
        }
		elseif (strpos($user_agent, 'Safari') !== false) {
            // 生UTF-8
            $ret = $filename;
        }
		elseif (strpos($user_agent, 'Opera') !== false) {
            // 生UTF-8
            $ret = $filename;
        }
		else {
			$ret = urlencode($filename);
		}

		return $ret;
	}

}   



//=============================================================================
//   main
//=============================================================================

/**
 * テスト
 */
function test() {
	// initiate PDF
	$pdf = new MyPDF();
	$pdf->myInit();
	$pdf->setFontSubsetting(true);	// true:フォントを部分埋め込み	false:全埋め込み

	// ページ追加
	$pdf->AddPage();

	// テンプレートの1ページ目を使う
	$template_pdf_path = './template.pdf';
	$pdf->myUseTemplate($template_pdf_path, 1);

	$font_path = './ipag00303/ipag.ttf';
	if (file_exists($font_path)) {
		$font_name = $pdf->addTTFfont($font_path, 'TrueTypeUnicode');
		$pdf->SetFont($font_name, '', 10);
	}

	// mixed Write( float $h, string $txt, [mixed $link = ''], [int $fill = 0], [string $align = ''], [boolean $ln = false], [int $stretch = 0], [boolean $firstline = false], [boolean $firstblock = false], [float $maxh = 0])
	$pdf->Write(0, 'TCPDFはwriteHTMLCell()が一番使いやすい', '', 0, 'L', true, 0, false, false, 0);

	// void writeHTMLCell( float $w, float $h, float $x, float $y, [string $html = ''], [mixed $border = 0], [int $ln = 0], [int $fill = 0], [boolean $reseth = true], [string $align = ''], [boolean $autopadding = true])
	$pdf->writeHTMLCell(100, 25, 20, 20, '<div style="text-align:right">あいうえお<br>999,999,999<span style="font-size:20pt; color:#ff0000;">円</span><br>Hello world!</div>', array('TBLR' => array('width' => 0.1)));

	// 第2引数の説明
	// TCPDF::Output($filename, $desc)
	// I: send the file inline to the browser (default). The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
	// D: send to the browser and force a file download with the name given by name.
	// F: save to a local server file with the name given by name.
	// S: return the document as a string (name is ignored).
	// FI: equivalent to F + I option
	// FD: equivalent to F + D option
	// E: return the document as base64 mime multi-part email attachment (RFC 2045)
	// tcpdf.phpのOutput()は第2引数にFが含まれていないとき、ファイル名から英数字以外の
	// 文字を削除してしまうので、いったんFIかFDでサーバーにも保存してすぐに削除してしまうのがいい。
	$filename = $pdf->escapeFilename('PDFサンプル.pdf');
	$pdf->Output($filename, 'FD');
	unlink($filename);
}

test();
