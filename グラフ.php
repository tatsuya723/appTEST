	
<?php
// 1円グラフ描画に必要なライブラリ
require_once 'jpgraph-4.2.10/src/jpgraph.php';
require_once 'jpgraph-4.2.10/src/jpgraph_pie.php';

// データ、凡例、描画色を準備
$data = array(
  'data' => array(3125, 2981, 1846, 1124, 1007),
  'legends' => array('駅前店','本通店','胡町点','春日店','元町店'),
  'colors' => array('#0000FF', '#6600FF', '#CC00FF', '#66CC00', '#FFCC00')
);

// 2円グラフを準備
$pie = new PiePlot($data['data']); // データ
$pie->setLegends($data['legends']); // 凡例
$pie->setSize(0.4); // サイズ
$pie->setSliceColors($data['colors']); // 描画色

// 3グラフの描画先
$g = new PieGraph(400,400); // サイズ
$g->title->setFont(FF_MINCHO, FS_NORMAL, 14); // タイトルフォント
$g->legend->setFont(FF_MINCHO, FS_NORMAL, 14); // 凡例フォント
$g->title->set('店舗別売上高'); // タイトル
$g->add($pie); // グラフを追加

// 4グラフを描画
$g->stroke();